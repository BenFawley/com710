<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Response Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/4323ba3d16.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="index.php"><img id="logo" src="logo.png" width="120" height="40"></a>

            <!--Collapsible Button-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Navbar Links-->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="gyms.php"><i class="fas fa-map-marker"></i> Gyms </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="training.php"><i class="fas fa-clipboard"></i> Training Plans </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="price.php"><i class="fas fa-address-card"></i> Membership </a>
                    </li>
                    <?php
                    if (isset($_SESSION["uid"])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php"><i class="fas fa-user"></i> My Profile </a>
                        </li>

                    <?php
                    };
                    ?>
                </ul>
                <!--Sign Up/Login Navbar-->
                <div id="loginOrOut" class=ml-auto>
                    <button id='logoutButton' class='btn btn-primary' type='submit' name='logout' <?php
                                                                                                    if (!isset($_SESSION["uid"])) echo "style = 'display: none;'"
                                                                                                    ?>>Logout</button>
                    <ul class="nav navbar-nav" <?php
                                                if (isset($_SESSION["uid"])) echo "style = 'display: none;'"
                                                ?>>
                        <li class="nav-item active">
                            <a href="join.php" class="nav-link"><span class="fas fa-user-plus"></span> Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="modal" id="modalOpenButton" class="nav-link"><span class="fas fa-sign-in-alt"></span> Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--Creating a log in Modal-->
        <div id="logInModal" class="modal">

            <!--Modal Content-->
            <form id="loginForm" class="modal-content animate" action="login.php" method="post">
                <div class="imageContainer">
                    <i id="loginImage" class="fas fa-users fa-2x"></i>
                    <h4>Member Login</h2>
                </div>

                <div class="container">
                    <div class="input-icons">
                        <i id="i1" class="fas fa-user icons"></i>
                        <input type="text" placeholder="Username" name="uName" required>
                    </div>

                    <div class="input-icons">
                        <i id="i2" class="fas fa-lock icons"></i>
                        <input type="password" placeholder="Password" name="pass" required>
                    </div>

                    <div id="buttonContainer">
                        <button id="loginButton" class="btn btn-primary" type="submit" name="login_submit">Login</button> <br>
                    </div>

                    <input id="rememberMe" type="checkbox" checked="checked" name="remember"> Remember

                    <span id="closeButton" class="modal-close">X</span>

                </div>
            </form>
        </div>


        <!--Header Image-->
        <div class="row">
            <img id="headerImage" class="col-12" src="gymheader2.jpg" alt="Personal Trainer">
        </div>
        <div class="row call-to-action bg-dark">

        </div>
    </header>

    <section>
        <div id = "formWrap" class="container">
            <form class = "col-6" id="sign_up_form">
                <div class="register">
                    <h1>Register</h1>
                    <p>Please fill in this form to create an account</p>
                    <hr>
                </div>

                <div class="formInput">
                    <input type="text" placeholder="Username" id="username" name="username">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="formInput">
                    <input type="password" placeholder="Password" id="pswd" name="pswd">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="formInput">
                    <input type="text" placeholder="First name" id="fName" name="fName">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="formInput">
                    <input type="text" placeholder="Last name" id="lName" name="lName">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="formInput">
                    <input type="text" placeholder="Email" id="email" name="email">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="formInput">
                    <input type="text" placeholder="Age" id="age" name="age">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="formInput">
                    <input type="text" placeholder="Gender" id="gender" name="gender">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="formInput">
                    <input type="text" placeholder="Street Address" id="streetAddress" name="streetAddress">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="formInput">
                    <input type="text" placeholder="City" id="city" name="city">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="formInput">
                    <input type="text" placeholder="Postcode" id="postcode" name="postcode">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="formInput">
                    <input type="text" placeholder="County" id="county" name="county">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error Message</small>
                </div>

                <div class="buttonWrapper">
                    <button type="submit" id="registerBtn" class="registerBtn btn btn-primary">Sign Up</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>