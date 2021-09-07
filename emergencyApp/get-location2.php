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
        <style>

          /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
       #map {
        height: 400px;
        width: 100%;
      }
      
      /* Optional: Makes the sample page fill the window. */

      
      #floating-panel {
        display:none;
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
      }

        </style>
    </head>

    <body>
        <div class="wrapper">
            <!-- Header Start -->
           
            <!-- Header End -->


                   
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
              url:"admin-dash.php",
              method: "post",
              data: userLotLat,
              success: function(res){
                console.log(res);
              }
            })

            window.location.replace("admin-dash.php");
          }
         
        </script>

         

<!-- Footer Start -->



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