<?php 
      
    session_start();

    if (isset($_SESSION["user_id"])) {

        header("Location: home.php");
    
        exit();   
      }

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
                                            if (isset($_SESSION["user_id"])) {
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
                    
                    <?php
                    
                    
                          if (isset($_GET['register'])) {
                            if ($_GET['register'] = 'success'){ ?>
                              
                             
                              <div class="alert alert-success" alert-dismissible fade show" role="alert">
                                 <strong>User Registration Successful! Please Login.
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        
                            <?php }
                          }
                    ?>
                    <?php
                    
                    
                    if (isset($_GET['error'])) {
                      if ($_GET['error'] = 'nouser'){ ?>
                        
                       
                        <div class="alert alert-danger" alert-dismissible fade show" role="alert">
                           <strong>User does not exist!
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  
                      <?php }
                    }
              ?>
                    
                    

                    <div class="hero row align-items-center">
                        <div class="col-md-7">
                            <h2>Rapid & Reliable</h2>
                            <h2><span>Emergency</span> Service</h2>
                            <p>Sign up and take your first step to keeping your self safe</p>
                            <a class="btn" href="Register.php">Register</a>
                        </div>
                        <div class="col-md-5">
                            <div class="form">
                                <h3>Log in</h3>
                                <form action="includes/login.inc.php" method="POST">
                                    <input class="form-control" name="email" type="email" placeholder="Your Email" required>
                                    <input class="form-control" name="password" type="password" placeholder="Your Password" required>
                                    <button type="submit" name="submit" class="btn btn-block">Login</button>
                                </form>
                                <p>Login as a responder<a href="admin.php"> here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
