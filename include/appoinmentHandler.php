<?php
require_once('database.php');
require_once('session.php');
if(isLogin())
{
    if(isset($_POST['operation']))
    {
        if($_POST['operation']=="addRequest")
        {
            $id = $_POST['id'];
            $query = "update appointment set isApproved = 1 where id = $id";
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
        if($_POST['operation']=="removeRequest")
        {
            $id = $_POST['id'];
            $query = "delete from appointment where id = $id";
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
else
{
    echo "not logged in";
}
?>