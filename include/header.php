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
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="index.php" class="brand-logo">E-Servant</a>
            <ul class="right hide-on-med-and-down">
                <!-- Modal Trigger -->
                <li><a class="waves-effect waves-light btn modal-trigger" href="#signin">Sign In</a></li>

                <li><a class="waves-effect waves-light btn modal-trigger" href="#signup">Sign Up</a></li>
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li><a class="waves-effect waves-light btn modal-trigger" href="#signin">Sign In</a></li>
                <li><a class="waves-effect waves-light btn modal-trigger" href="#signup">Sign Up</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <script>
        $(document).ready(function () {
            $('.modal-trigger').leanModal();
        });
    </script>


    <!-- Sign In Model Structure -->
    <div id="signin" class="modal black-text">
        <div class="modal-content">
            <h4>Sign In</h4>
            <form method="post" action="include/signin.php" class="">
                <div class="input-field">
                    <input id="username" name="username" type="text" class="validate" required>
                    <label class="left" for="username">User Name</label>
                </div>
                <div class="input-field col l6 m6 s12">
                    <input id="password" name="password" type="password" class="validate" required>
                    <label class="left" for="password">Password</label>
                </div>
                <input value="Sign In" type="submit" class="btn right waves-effect waves-light" />
            </form>
            <br />
            <br />

        </div>
    </div>

    <!-- signup model is starting from here -->

    <div id="signup" class="modal black-text">
        <div class="modal-content">
            <h4>Sign Up</h4>
            <form enctype="multipart/form-data" method="post" class="" action="include/register.php">
                <div class="input-field">
                    <input id="username" name="username" type="text" class="validate" required>
                    <label class="left" for="username">username</label>
                </div>
                
                <div class="input-field">
                    <input id="email" name="email" type="email" class="validate" required>
                    <label class="left" for="email">email</label>
                </div>

                <div class="input-field">
                    <input id="name" name="name" type="text" class="validate" required>
                    <label class="left" for="id">Name</label>
                </div>

                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input name="file" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>


                <div class="input-field">
                    <input id="address" name="address" type="text" class="validate" required>
                    <label class="left" for="id">Address</label>
                </div>

                <div class="input-field">
                    <input id="city" name="city" type="text" class="validate" required>
                    <label class="left" for="id">City</label>
                </div>

                <div class="input-field col l6 m6 s12">
                    <input id="password" name="password" type="password" class="validate" required>
                    <label class="left" for="password">Password</label>
                </div>
                <input value="Sign Up" type="submit" class="btn right waves-effect waves-light" />
            </form>
            <br />
            <br />

        </div>
    </div>