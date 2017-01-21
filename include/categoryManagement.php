<?php
include_once('session.php');
include_once('database.php');
if(isLogin() && isset($_GET['operation']))
{
  if($_GET['operation']=="get")
  {
    $user = $_SESSION["username"];
    $query = "select * from subcat_user where username = '$user'";
    $result = $db->fetch($query);
    if($result)
    {
      echo json_encode($result);
    }
  }
  else if($_GET['operation']=="add")
  {
    $user = $_SESSION['username'];
    $subcategory = $_GET['subCategorySelect'];
    $persona = $_GET['persona'];
    $query = "insert into subcat_user values('$user','$subcategory','$persona')";
    $result = $db->store($query);
    if($result)
    {
      header("Location:../manageServices.php");
    }
  }
  else if($_GET['operation']=="remove")
  {
    $user = $_SESSION['username'];
    $subcategory = $_GET['subCategorySelect'];
    $persona = $_GET['persona'];
    $query = "delete from subcat_user where username = '$user' and sname = '$subcategory' and persona = '$persona'";
    $result = $db->store($query);
    if($result>0)
    {
      echo "success";
    }
    else{
      echo "false";
    }
  }
  else if($_GET['operation']=="edit")
  {
    $user = $_SESSION['username'];
    $subcategory = $_GET['subCategorySelect'];
    $persona = $_GET['persona'];
    $query = "update subcat_user set persona = '$persona' where username = '$user' and sname = '$subcategory'";
    $result = $db->store($query);
    if($result>0)
    {
      echo "success";
    }
    else{
      echo "failed";
    }
  }

}

/*else{
  $query = "select * from category";
  $result = $db->fetch($query);
  $subcat = array();
  $category = array();
  if($result)
  {
    $temp=$result[0]["cname"];
    for($i = 0; $i < count($result); $i++)
    {
      while(($i < count($result)) && ($result[$i]["cname"]==$temp) )
      {
        array_push($subcat,$result[$i]['sname']);

        $i++;
      }

      $category[$temp] = $subcat;
      $subcat = null;
      $subcat = array();
      if(isset($result[$i]["cname"]))
      {
        $temp=$result[$i]["cname"];
        $i--;
      }
    }
  }
  echo json_encode($category);
}*/
?>
