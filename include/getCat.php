<?php
include_once('database.php');

if(isset($_GET['operation']))
{
    if($_GET['operation']=='getCategories')
    {
        $query = "select cname,icon from category";
        $result = $db->fetch($query);
        if($result)
        {
            echo json_encode($result);
        }
    }
    else if($_GET['operation']=='getSubCategories')
    {
        $cat = $_GET["category"];
        $query = "select sname from subcat where cname = '$cat'";
        $result = $db->fetch($query);
        if($result)
        {
            echo json_encode($result);
        }
    }
    else if($_GET['operation']=='getPersons')
    {
        $subCat = $_GET['subcategory'];
        $query = "select * from object join subcat_user using (username) where sname = '$subCat'";
        $result = $db->fetch($query);
        if($result)
        {
            echo json_encode($result);
        }
    }
    else if($_GET['operation']=='getProfile')
    {
        $username = $_GET['person'];
        $subcat = $_GET['subcategory'];
        $query1 = "select * from object join subcat_user using(username) join subcat using(sname) join
        category using(cname) where username = '$username' and sname = '$subcat';";
        $query2 = "select id,day,timeFrom,timeto from object join availability using(username) where username = '$username';";
        $query3 = "select time,date,clientId from object join appointment using(username) where username = '$username';";
        $result1 = $db->fetch($query1);
        $result2 = $db->fetch($query2);
        $result3 = $db->fetch($query3);
        if($result1)
        {
            $finalResult = array();
            array_push($finalResult,$result1);
            if($result2)
            {
                 array_push($finalResult,$result2);
            }
            else{
                array_push($finalResult,"");
            }
            if($result3)
            {
                 array_push($finalResult,$result3);
            }
            else{
                array_push($finalResult,$query3);
            }
            echo json_encode($finalResult);
        }
        
    }
}

?>