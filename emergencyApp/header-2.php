<?php 
    
    session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Emergency Button</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Cleaning Company Website Template" name="keywords">
        <meta content="Cleaning Company Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Header Start -->
            <div class="header home">
                <div class="container-fluid">
                <div class="header-top row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand">
                                <a href="index.php">
                                <strong>Emergency Button</strong>

                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">

                            <div class="navbar navbar-expand-lg bg-light navbar-light">
                                <!-- <a href="index.com" class="navbar-brand">MENU</a> -->
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav ml-auto">
                                        <a href="index.php" class="nav-item nav-link active">Home</a>
                                        <a href="about.php" class="nav-item nav-link">About</a>
                                        <!-- <a href="team.php" class="nav-item nav-link">Team</a>
                                        <a href="contact.php" class="nav-item nav-link">Contact</a> -->
                                        <?php
                                            if (isset($_SESSION["operator_id"]) || isset($_SESSION["officer_id"])) {
                                                echo '
                                                <form action="includes/logout.inc.php" method="post">
                                                    <button type="submit" name="submit">LOGOUT</button>
                                                </form>';      
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero row align-items-center">
                        <div class="col-md-7">
                          <h2><span>Register</span> An Account</h2>
                          <p>And take your first step to keeping your self safe with us</p>
                        </div>
                        <div class="col-md-5">
                            <div class="form">
                                <h3>Register</h3>
                                <form action="includes/register.inc.php" method="POST">
                                    <input class="form-control" type="text" name="firstname" placeholder="First name">
                                    <input class="form-control" type="text" name="lastname" placeholder="Last name">
                                    <input class="form-control" type="text" name="phone" placeholder="phone">
                                    <input class="form-control" type="number" name="studentnumber" placeholder="Student number">
                                    <input class="form-control" type="email" name = "email" email placeholder="email">
                                    <textarea placeholder="Enter Residental Address Here.." name="address" rows="3" class="form-control"></textarea>
                                    <input class="form-control" type="password" name="password" placeholder="password">
                                    <input class="form-control" type="password" name="password_check" placeholder="Confirm password">
                                    <button class="btn btn-block" type="submit" name="reg-submit">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
