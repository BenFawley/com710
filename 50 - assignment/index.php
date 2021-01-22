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
        <div class="hero-image">
            <nav class="navbar navbar-expand-md navbar-dark fixed-top">
                <a class="navbar-brand" href="index.php"><img id="logo" src="logo.png" width="120" height="40"></a>

                <!--Collapsible Button-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--Navbar Links-->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
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
            <div class="hero-text">
                <!-- <h2>Stand out on the Gym floor</h2> -->
                <h3>Start your Journey Today!</h3>
                <p>Welcome to Solent Fitness. We are a fitness center based in Southampton that aims to help you become the best version of yourself!</p>
                <a class="btn btn-primary" id="joinLink" href="join.php">Join now</a>
            </div>
            <!--Header Image-->
            <!-- <div class="row">
            <img id="headerImage" class="col-12" src="headImage.png" alt="Personal Trainer">
        </div>
        <div class="row call-to-action bg-dark" <?php
                                                if (isset($_SESSION["uid"])) echo "style = 'display: none;'"
                                                ?>>
            <h5>Start your Journey Now!</h5>
            <a class = "btn btn-primary" id="joinLink" href="join.php">Join now</a> -->
        </div>
    </header>
    <main>
        <!--Section 1: Why work with us-->
        <section class="container" id="section1">
            <h3 id="sectionTitle">Why Work With Us?</h3>
            <hr id="sectionLine">
            <div id="whywork" class="row">
                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                    <i class="fas fa-user-md fa-4x icon"></i>
                    <h3>Experienced Coaches</h3>
                    <p>Our personal trainers have experience in a variety of areas such as strength & conditioning </p>
                </div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                    <i class="fas fa-address-book fa-4x icon"></i>
                    <h3>Tailored Programs</h3>
                    <p>Our personal trainers work to create tailored training programs that are specific to your goals!</p>
                </div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                    <i class="fas fa-dumbbell fa-4x icon"></i>
                    <h3>Excellent Facilities</h3>
                    <p>Our gym offers a wide range of facilities such as free weights, treadmills and cross-trainers,</p>
                </div>
            </div>
        </section>

        <section id="slides">
            <div class="container">
                <hr id="sectionLine2">
                <div id="gymCarousel" class="carousel slide col-12" data-ride="carousel">
                    <!-- Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#gymCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#gymCarousel" data-slide-to="1"></li>
                        <li data-target="#gymCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Carousel slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid w-100" src="gym1.jpg" alt="gym equipment">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="gym2.jpg" alt="gym equipment">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="gym3.jpg" alt="gym equipment">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#gymCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#gymCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

        </section>

        <section id="section3">
            <div id="map-container" class="container">
                <div>
                    <h3 id="sectionTitle">Where Can You Find Us?</h3>
                    <hr id="sectionLine">
                </div>
                <div id="map-wrapper">
                    <div id="map"></div>
                </div>
            </div>
        </section>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAktrwJhpTVoVDZ13YXfG5kMOg2SZYFRo&callback=initMap">
    </script>

</body>

</html>