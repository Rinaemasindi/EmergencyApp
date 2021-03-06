<?php 
    
    session_start(); 
    // if ( !isset($_SESSION["user_id"])) {

    //     header("Location: index.php");
    
    //     exit();   
    //   }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>EmergencyApp</title>
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
        <style>

          /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
       #map {
        height: 400px;
        width: 100%;
      }
      
      /* Optional: Makes the sample page fill the window. */

      
    

        </style>
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
       E                         <strong>EmergencyApp</strong>

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
                                           if (isset($_SESSION["user_id"])) {
                                             ?>   
                                                <a href="profile.php" class="nav-item nav-link">Profile</a>

                                            <?php     
                                            }
                                        ?>

                                        <a href="about.php" class="nav-item nav-link">About</a>
                                        <!-- <a href="team.php" class="nav-item nav-link">Team</a>
                                        <a href="contact.php" class="nav-item nav-link">Contact</a> -->
                                        <?php
                                            if (isset($_SESSION["user_id"])) {
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

 <!-- Page Header Start -->
 <br><br>
          <center>  <h1>About Us</h1></center>
<!-- Page Header End -->


 <div class="about">
 <div class="container">
   <div class="row">
       <div class="col-lg-5 col-md-6">
           <div class="about-img">
               <img src="img/about.jpg" alt="Image">
           </div>
       </div>
       <div class="col-lg-7 col-md-6">
           <div class="about-text">
               <h2>EmergencyApp</h2>
               <p>

                   This app provides emergency buttons for students for situations ranging
                   from violence to health-related emergencies. The security emergency button
                   inter-connected to the security communication system sends students details including
                    names, residence name and room number then notifies the security of the incident that
                   needs urgent attention based on the student???s location.
               </p>

               <p>
                  The health emergency button communicates with the campus clinic and ambulance systems to alert
                   nurses and emergency medical care team of the student???s need for medical attention. Once the EMS team has been notified, the
                   student can then track how far and the approximate time the ambulance will take to reach his/her location in real time.
               </p>

           </div>
       </div>
   </div>
 </div>
 </div>


<?php

  include 'footer.php';

 ?>
