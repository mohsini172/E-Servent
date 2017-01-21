<?php
require_once('database.php');
$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);

$query = "select * from users join object using(username)  where username = '$username'";
$result = $db->fetch($query);
if($result)
{
    if($result[0]['password']==$password)
    {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['image'] = $result[0]['photo'];
        header('Location: '."../index.php");
    }
    else
    {
    //    header('Location: '."../index.php");
        echo "<script>alert('Incorrect Password');</script>";
        echo "<a href='../index.php'>Return to home page</a>";
    }
}
else
{
  //header('Location: '."../index.php");
  echo "<script>alert('Incorrect Password');</script>";
    echo "<a href='../index.php'>Return to home page</a>";

}
?>