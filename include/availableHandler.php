<?php
require_once('session.php');
require_once('database.php');
if(isLogin())
{
	if(isset($_POST['type']))
	{
		if($_POST['type']=="delete")
		{
			$id = $_POST["id"];
			$query = "delete from availability where id = $id";
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
		else if($_POST['type']=="add")
		{
			$day =  $_POST['day'];
			$from = $_POST['timeFrom'];
			$to = $_POST['timeto'];
			$user = $_SESSION['username'];
			$query = "insert into availability (`day`,`timeFrom`,`timeto`,`username`) values ('$day','$from','$to','$user')";
			echo $query;
			$result = $db->store($query);
			if($result>0)
			{
				header("Location:../available.php");
			}
			else
			{
				echo "Error insertion";
			}
		}
	}
}
?>