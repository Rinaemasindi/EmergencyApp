<?php 
    
    session_start(); 
    if ( !isset($_SESSION["user_id"])) {

        header("Location: index.php");
    
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
           
            <!-- Header End -->
             <?php
                    
                    
                          if (isset($_GET['nameUpdate'])) {
                            if ($_GET['nameUpdate'] = 'success'){ ?>
                              
                             
                              <div class="alert alert-success" alert-dismissible fade show" role="alert">
                                 <strong>Your Name Is Successfully Updated.
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        
                            <?php }
                          }elseif(isset($_GET['passUpdate'])){
                            if ($_GET['passUpdate'] = 'success'){ ?>
                            
                            <div class="alert alert-success" alert-dismissible fade show" role="alert">
                                 <strong>Your Password Is Successfully Updated.
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                              
                        <?php } 
                        
                          }elseif(isset($_GET['emailUpdate'])){
                            if ($_GET['emailUpdate'] = 'success'){ ?>
                            
                            <div class="alert alert-success" alert-dismissible fade show" role="alert">
                                 <strong>Your Email Is Successfully Updated.
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                              
                        <?php } 
                        
                          }elseif(isset($_GET['phoneUpdate'])){
                            if ($_GET['phoneUpdate'] = 'success'){ ?>
                            
                            <div class="alert alert-success" alert-dismissible fade show" role="alert">
                                 <strong>Your Contact number Is Successfully Updated.
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                              
                        <?php } 
                        
                          }elseif(isset($_GET['addressUpdate'])){
                            if ($_GET['addressUpdate'] = 'success'){ ?>
                            
                            <div class="alert alert-success" alert-dismissible fade show" role="alert">
                                 <strong>Your Address Is Successfully Updated.
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                              
                        <?php } 
                        
                          }
                    ?>


                   
      <center>
        
        <div class="contact">
          <div class="container">
            <div class="section-header">
              <h2>Allow us to access your location</h2>
              <button class="btn btn-warning" onclick="getLocation()">Allow</button>
            </div>
          </div>
        </div>

        <p id="demo"> </p>
        
        
        
        </center>
        <script>

          var x = document.getElementById("demo");

          function getLocation() {

            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
              x.innerHTML = "Geolocation is not supported by this browser.";
            }
          }

          function showPosition(position) {
            var userLotLat = {};

            userLotLat.latitude = position.coords.latitude;
            userLotLat.longitude = position.coords.longitude;

            $.ajax({
              url:"home.php",
              method: "post",
              data: userLotLat,
              success: function(res){
                console.log(res);
              }
            })

            window.location.replace("home.php");
          }
         
        </script>

         


    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>


<!-- Template Javascript -->


<script src="js/map.js"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEyjGjpVF9gc0n-SC09SdmIjSYmHx93NQ&callback=initMap&libraries=&v=weekly"
    async></script>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
</body>
<?php

?>
</html>