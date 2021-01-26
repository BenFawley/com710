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
    <header>
        <div class="header-image">
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
                        <li class="nav-item active">
                            <a class="nav-link" href="price.php"><i class="fas fa-address-card"></i> Membership </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php" <?php
                                                                    if (!isset($_SESSION["uid"])) echo "style = 'display: none;'"
                                                                    ?>><i class="fas fa-user"></i> My Profile </a>
                        </li>
                    </ul>
                    <!--Sign Up/Login Navbar-->
                    <div id="loginOrOut" class=ml-auto>
                        <button id='logoutButton' class='btn btn-primary' type='submit' name='logout' <?php
                                                                                                        if (!isset($_SESSION["uid"])) echo "style = 'display: none;'"
                                                                                                        ?>>Logout</button>
                        <ul class="nav navbar-nav" <?php
                                                    if (isset($_SESSION["uid"])) echo "style = 'display: none;'"
                                                    ?>>
                            <li class="nav-item">
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
            <!-- <div class="row">
            <img id="headerImage" class="col-12" src="gymheader2.jpg" alt="Personal Trainer">
        </div> -->
        </div>
        <div class="row call-to-action bg-dark" <?php
                                                if (isset($_SESSION["uid"])) echo "style = 'display: none;'"
                                                ?>>
            <h5>Start your Journey Now!</h5>
            <a class="btn btn-primary btn-margin" id="joinLink" href="join.php">Join now</a>
        </div>
    </header>
    <main id="priceContent" class="row">

        <div class="columns col-12 col-sm-12 col-md-4 col-lg-4">
            <ul class="price">
                <li class="header">Basic</li>
                <li class="grey">£9.99 / month</li>
                <li>Access limited to off-peak hours</li>
                <li>Access classes 7 days in advance</li>
            </ul>
        </div>

        <div class="columns col-12 col-sm-12 col-md-4 col-lg-4">
            <ul class="price">
                <li class="header" style="background-color:#337ab7">Pro</li>
                <li class="grey">£19.99 / month</li>
                <li>Unrestricted 24/7 access</li>
                <li>Access classess 7 days in advance</li>
                <li>Multiple gym access from £2</li>
            </ul>
        </div>

        <div class="columns col-12 col-sm-12 col-md-4 col-lg-4">
            <ul class="price">
                <li class="header">Premium</li>
                <li class="grey">£29.99 / month</li>
                <li>Unrestricted 24/7 access</li>
                <li>Access classes 14 days in advance</li>
                <li>Include multiple gym access</li>
                <li>Bring a guest 5 times a month</li>
            </ul>
        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>