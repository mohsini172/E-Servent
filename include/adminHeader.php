<?php
include_once 'include/session.php';
if(!isLogin())
{
  header("Location:index.php");

}
$user = $_SESSION['username'];
$image = $_SESSION['image'];
?>

<html>

<head>
    <link href="css/materialize.min.css" rel="stylesheet" />
    <link href="css/googleIcon.css" rel="stylesheet">

    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/app.js"></script>
    <style>
        header,
        main,
        footer {
            padding-left: 240px;
        }

        @media only screen and (max-width: 992px) {
            header,
            main,
            footer {
                padding-left: 0;
            }
        }

        .pad {
            padding: 10px;
        }

        .pad-left-right {
            padding-left: 10px;
            padding-right: 10px;
        }
        .margin-left-right
        {
            margin-left:10px;
            margin-right:10px;
        }
    </style>
</head>

<body ng-app="myApp" class="grey lighten-4">
    <header>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper">
              <div id="menuText" href="" class="brand-logo center">Schedule</div>
              <ul class="right hide-on-med-and-down">
                  <li><a href="index.php">Home</a></li>
                  <li>
                      <a style="height:64px;padding-top:7px;" class="dropdown-button" data-constrainwidth="false" data-beloworigin="true" href="#" data-activates="menu">
                        <?php
                          echo "<img style='height:50px;' src='$image' class='responsive-img circle' />";
                        ?>
                      </a>
                  </li>
              </ul>
                <ul id="nav-mobile" class="side-nav fixed">
                    <li><a id="logo-container" href="#" class="">E-Servant</a></li>
                    <li><a href="admin.php">Schedule</a></li>
                    <li><a href="requests.php">Requests</a></li>
                    <li><a href="pending.php">Pending</a></li>
                    <li><a href="available.php">My Timings</a></li>
                    <li><a href="manageServices.php" >Manage Services</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <ul id="menu" class="dropdown-content">
            <li><a href="requests.php">Requests</a></li>
            <li><a href="Pending.php">Pending Requests</a></li>
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
