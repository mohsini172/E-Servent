<?php
$user;
$image;
function isLogin()
{
    session_start();
    $has_session = isset($_SESSION['username']);
    if($has_session)
    {
        $user = $_SESSION['username'];
        $image = $_SESSION['image'];
        return true;
    }
    else
    {
        return false;
    }
}



?>
