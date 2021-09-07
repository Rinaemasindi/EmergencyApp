<?php 
    
    session_start();
    // if (!isset($_SESSION["user_id"])) {

    //     header("Location: index.php");
    
    //     exit();   
    //   }
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
        <style>
        
            .intxt{
                color: white;
            };
        
        </style>
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
    <div class="wrapper">
            <!-- Header Start -->
            <div class="header ">
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
                                
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav ml-auto">
                                        <a href="index.php" class="nav-item nav-link active">Home</a>

                                        <?php
                                            if (isset($_SESSION["operator_id"]) || isset($_SESSION["officer_id"])) {
                                             ?>   
                                                <a href="profile.php" class="nav-item nav-link">Profile</a>

                                            <?php     
                                            }
                                        ?>

                                        <a href="about.php" class="nav-item nav-link">About</a>
                                        <!-- <a href="team.php" class="nav-item nav-link">Team</a>
                                        <a href="contact.php" class="nav-item nav-link">Contact</a> -->
                                        <?php
                                           if (isset($_SESSION["operator_id"]) || isset($_SESSION["officer_id"])) {
                                                echo '
                                                <form action="includes/logout.inc.php" method="post">
                                                    <button class="btn" type="submit" name="submit">LOGOUT</button>
                                                </form>';      
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Header End -->
