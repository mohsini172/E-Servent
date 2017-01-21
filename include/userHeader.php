<?php
$user = $_SESSION['username'];
$image = $_SESSION['image'];
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>E-Servant</title>

    <!-- CSS  -->
    <link href="css/googleIcon.css" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <script src="js/jquery-1.12.3.min.js"></script>

</head>

<body class="blue-grey lighten-5">
    <nav class="light-blue">
        <div class="nav-wrapper container">
            <a href="index.php" class="brand-logo">E-Servant</a>
            <ul class="right hide-on-med-and-down">
                <li><a><?php echo $_SESSION['username'];?></a></li>
                <li><a href="admin.php">Admin Panel</a></li>
                <li>
                    <a style="height:64px;padding-top:7px;" class="dropdown-button" data-constrainwidth="false" data-beloworigin="true" href="#" data-activates="menu">
                        <?php
                        echo "<img style='height:50px;' src='$image' class='responsive-img circle' />";
                        ?>
                    </a>
                </li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a class="waves-effect waves-light btn modal-trigger" href="#signin">Sign In</a></li>
                <li><a class="waves-effect waves-light btn modal-trigger" href="#signup">Sign Up</a></li>
            </ul>
        </div>
    </nav>


    <ul id="menu" class="dropdown-content">
        <li><a href="requests.php">Requests</a></li>
        <li><a href="pending.php">Pending Request</a></li>
        <li class="divider"></li>
        <li><a id = "signout" href="#">Sign Out</a></li>
    </ul>
<script>
$(document).ready(function(){
  $("#signout").click(function(){
      $.post("include/signout.php",
      function(data, status){
          if(data=="true")
          {
            window.location.assign("index.php");
          }
          else {
            console.log("Error Sign out");
          }
      });
  });
});
</script>
