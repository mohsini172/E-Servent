<?php
require_once('database.php');
require_once('session.php');
if(isLogin())
{
    if(isset($_POST['operation']))
    {
        if($_POST['operation']=='add'){
            $date = $_POST['date'];
            $time = $_POST['time'];
            $user = $_POST['person'];
            $subcat = $_POST['subcategory'];
            $client = $_SESSION['username'];
            
            $query = "insert into appointment(`time`,`date`,`clientId`,`username`,`isApproved`,`sname`) values('$time','$date','$client','$user','0','$subcat')";
            //echo $query;
            $result = $db->store($query);
            if($result>0)
            {
                echo "success";
            }
            else
            {
                echo "failed";
            }
        }
    }
}
?>