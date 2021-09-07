<?php 
  error_reporting(0);
  session_start();

  require_once "includes/dbh.inc.php";

  // if (!isset($_SESSION["operator_id"]) && !isset($_SESSION["officer_id"])) {

  //   header("Location: admin-dash.php");

   

  //   exit();   
  // }   

  
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Dashbord</title>
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
              <a href="admin.php">
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
             
                  <?php
                    if (isset($_SESSION["officer_id"]) || isset($_SESSION["operator_id"])) {?>
                         <a href="admin-dash.php" class="nav-item nav-link">home</a>
                         <a href="profile2.php" class="nav-item nav-link">Profile</a>
                        <form action="includes/admin-logout.inc.php" method="post">
                            <button class="btn" type="submit" name="submit">LOGOUT</button>
                        </form>      

                    <?php } ?>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Header End -->

    <?php


      if (isset($_SESSION["operator_id"])){


        $userLotLat = $_POST;
        $userId = $_SESSION["operator_id"];
        $latitude = $userLotLat['latitude'];
        $longitude = $userLotLat['longitude'];
        
        $query = "SELECT * FROM user_location WHERE user_id = $userId";
        $result = mysqli_query($conn,$query);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
             $sql = "UPDATE user_location SET latitude = $latitude, longitude = $longitude WHERE user_id = $userId;";
             mysqli_query($conn,$sql);  

        }else {
            $sql = "insert into user_location(user_id,latitude,longitude) VALUES($userId,$latitude,$longitude);";
             mysqli_query($conn,$sql);
        }



        }else {
          
          $userLotLat = $_POST;
          $userId = $_SESSION["officer_id"];
          $latitude = $userLotLat['latitude'];
          $longitude = $userLotLat['longitude'];
          
          $query = "SELECT * FROM user_location WHERE user_id = $userId";
          $result = mysqli_query($conn,$query);
          $resultCheck = mysqli_num_rows($result);
  
          if ($resultCheck > 0) {
               $sql = "UPDATE user_location SET latitude = $latitude, longitude = $longitude WHERE user_id = $userId;";
               mysqli_query($conn,$sql);  
  
          }else {
              $sql = "insert into user_location(user_id,latitude,longitude) VALUES($userId,$latitude,$longitude);";
               mysqli_query($conn,$sql);
          }

        }
        
        

        
    
    ?>






    <br>


    <center>
      <h1>Dashbord</h1>
    </center>

    <br><br>

    <?php
      
      if (isset($_SESSION["operator_id"])) {

        $query = "SELECT user.user_id,user.first_name,user.last_name,user.email,user.address,
        request.request_type,request.request_desc,request.request_date,request.request_status,request.request_id 
        FROM request 
        INNER JOIN user ON request.user_id = user.user_id
        WHERE request.request_type = 'Ambulance' AND request.request_status IN ('Accepted','Pending');";
        
      }else {
        $query = " SELECT user.user_id,user.first_name,user.last_name,user.email,user.address,
        request.request_type,request.request_desc,request.request_date,request.request_status,request.request_id 
        FROM request 
        INNER JOIN user ON request.user_id = user.user_id
        WHERE request.request_type = 'Security' AND request.request_status IN ('Accepted','Pending');";
      }
     

      $results = mysqli_query($conn,$query);

      $resultsCheck = mysqli_num_rows($results);
   
    ?>

    <div class="container">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">

          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
            aria-controls="nav-home" aria-selected="true">Requests</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
            aria-controls="nav-profile" aria-selected="false">Track Requests</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-complete" role="tab"
            aria-controls="nav-profile" aria-selected="false">Completed Requests</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-Report" role="tab"
            aria-controls="nav-profile" aria-selected="false">Download Report</a>

        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active table-responsive" id="nav-home" role="tabpanel"
          aria-labelledby="nav-home-tab">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">Request Type</th>
                <th scope="col">Request description</th>
                <th scope="col">date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>


              <?php

            if ($resultsCheck > 0) {
              while ($row = mysqli_fetch_assoc($results)) { ?>

              <tr>
                <th scope="row"><?php echo $row["user_id"];  ?></th>
                <td><?php echo $row["first_name"];  ?></td>
                <td><?php echo $row["last_name"];  ?></td>
                <td><?php echo $row["email"];  ?></td>
                <td><?php echo $row["address"];  ?></td>
                <td><?php echo $row["request_type"];  ?></td>
                <td><?php echo $row["request_desc"];  ?></td>
                <td><?php echo $row["request_date"];  ?></td>
                <td><?php echo $row["request_status"];  ?></td>
                <td>

                  <div class="dropdown">
                    <button class="btn  btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a href="admin-dash.php?accept=<?php echo $row["request_id"]; ?>" class="dropdown-item">Accept</a>
                      <a href="admin-dash.php?completed=<?php echo $row["request_id"]; ?>"
                        class="dropdown-item">Completed</a>
                      <a href="admin-dash.php?delete=<?php echo $row["request_id"]; ?>" class="dropdown-item">Remove</a>
                    </div>
                  </div>

                </td>
              </tr>


              <?php }?>
              <?php 
          
          }?>

              <?php
            
            if (isset($_GET['accept'])) {


              if (isset($_SESSION["operator_id"])) {

                $id = $_GET['accept'];
                $op_id = $_SESSION["operator_id"];

                $sql = "UPDATE request SET responder_id = $op_id WHERE request_id = $id;";
                mysqli_query($conn,$sql); 

                $sql = "UPDATE request SET request_status = 'Accepted' WHERE request_id = $id;";
                mysqli_query($conn,$sql); 

              }else{

                $of_id = $_SESSION["officer_id"];
                $id = $_GET['accept'];
               
                $sql = "UPDATE request SET responder_id = $of_id WHERE request_id = $id;";
                mysqli_query($conn,$sql); 

              $sql = "UPDATE request SET request_status = 'Accepted' WHERE request_id = $id;";
              mysqli_query($conn,$sql); 

              }


              // $sql = "UPDATE requests SET request_status = 'Accepted' WHERE requests_id = $id;";
              // mysqli_query($conn,$sql); 

            }elseif (isset($_GET['completed'])){
                $id = $_GET['completed'];
                $sql = "UPDATE request SET request_status = 'Completed' WHERE request_id = $id;";
                mysqli_query($conn,$sql);
              }elseif (isset($_GET['delete'])){
                $id = $_GET['delete'];
                $sql = "DELETE FROM request WHERE request_id = $id;";
                //$sql = "UPDATE requests SET request_status = 'Completed' WHERE requests_id = $id;";
                mysqli_query($conn,$sql);
              }
            

          ?>


            </tbody>
          </table>

        <!-- end div -->
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <!-- Contact Start -->

          <?php

            if(isset($_SESSION["officer_id"])){


              
                  $id = $_SESSION["officer_id"];
                  
                  $sql = "SELECT * FROM request WHERE responder_id = $id AND request_status = 'Accepted';";

                  $result = mysqli_query($conn,$sql);
                  $resultCheck = mysqli_num_rows($result);

                  if($resultCheck>0){
                    
                    $sql = "SELECT * FROM user_location WHERE user_id = $id;";

                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultsCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                       
                        $origin_lat = $row["latitude"];
                        $origin_lng = $row["longitude"];
                       
                        
                      }
                    }

                    $query = "SELECT request.request_date,request.request_status,request.request_id,request.responder_id,
                    user_location.location_id,user_location.user_id,user_location.latitude,user_location.longitude
                    FROM request 
                    INNER JOIN user_location ON request.user_id = user_location.user_id
                    WHERE request.request_status = 'Accepted' AND request.responder_id = $id;";
                    
                    $result = mysqli_query($conn,$query);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultsCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                       
                        $dest_lat = $row["latitude"];
                        $dest_lng = $row["longitude"];
                       
                        
                      }
                    }

                  

                    $address = ["origin_lat" => $origin_lat,"origin_lng" => $origin_lng,"dest_lat" => $dest_lat,"dest_lng" => $dest_lng];
                    $json = json_encode($address);

                  
                    ?>
                    <script>
                      var address = <?= $json?>;
                    </script>
                     <!-- map code starts here -->
                      <div class="contact">
                        <div class="container">
                          <div class="section-header">
                            <h2>Track Student</h2>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="faqs">
                                <div id="accordion">

                                  <div id="output">

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">

                              <div id="map"></div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Contact End -->



                 <?php }else{

                    echo'<div class="contact">
                    <div class="container">
                      <div class="section-header">
                        <h2>No Data</h2>
                      </div></div></div>';


                  }            
               ?>
                    
                  
                  
            <?php
            }else{

                 
                
                  $id = $_SESSION["operator_id"];
                  
                  $sql = "SELECT * FROM request WHERE responder_id = $id AND request_status = 'Accepted';";

                  $result = mysqli_query($conn,$sql);
                  $resultCheck = mysqli_num_rows($result);

                  if($resultCheck>0){
                    
                    $sql = "SELECT * FROM user_location WHERE user_id = $id;";

                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultsCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                       
                        $origin_lat = $row["latitude"];
                        $origin_lng = $row["longitude"];
                       
                        
                      }
                    }

                    $query = "SELECT request.request_date,request.request_status,request.request_id,request.responder_id,
                    user_location.location_id,user_location.user_id,user_location.latitude,user_location.longitude
                    FROM request 
                    INNER JOIN user_location ON request.user_id = user_location.user_id
                    WHERE request.request_status = 'Accepted' AND request.responder_id = $id;";
                    
                    $result = mysqli_query($conn,$query);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultsCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                       
                        $dest_lat = $row["latitude"];
                        $dest_lng = $row["longitude"];
                       
                        
                      }
                    }

                  

                    $address = ["origin_lat" => $origin_lat,"origin_lng" => $origin_lng,"dest_lat" => $dest_lat,"dest_lng" => $dest_lng];
                    $json = json_encode($address);

                  
                    ?>
                    <script>
                      var address = <?= $json?>;
                    </script>
                     <!-- map code starts here -->
                      <div class="contact">
                        <div class="container">
                          <div class="section-header">
                            <h2>Track Student</h2>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="faqs">
                                <div id="accordion">

                                  <div id="output">

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">

                              <div id="map"></div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Contact End -->


                 <?php }else{

                    echo'<div class="contact">
                    <div class="container">
                      <div class="section-header">
                        <h2>No Data</h2>
                      </div></div></div>';


                  }            
               

            }
          ?>

         

          





        </div>
        <!-- new tab here -->
        
        <div class="tab-pane fade" id="nav-complete" role="tabpanel" aria-labelledby="nav-profile-tab">

        <?php
      
      if (isset($_SESSION["operator_id"])) {

        $query = "SELECT user.user_id,user.first_name,user.last_name,user.email,user.address,
        request.request_type,request.request_desc,request.request_date,request.request_status,request.request_id 
        FROM request 
        INNER JOIN user ON request.user_id = user.user_id
        WHERE request.request_type = 'ambulance' and request.request_status = 'Completed';";
        
      }else {
        $query = "SELECT user.user_id,user.first_name,user.last_name,user.email,user.address,
        request.request_type,request.request_desc,request.request_date,request.request_status,request.request_id 
        FROM request 
        INNER JOIN user ON request.user_id = user.user_id
        WHERE request.request_type = 'security' and request.request_status = 'Completed';";
      }
     

      $results = mysqli_query($conn,$query);

      $resultsCheck = mysqli_num_rows($results);
   
    ?>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">Request Type</th>
                <th scope="col">Request description</th>
                <th scope="col">date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>


              <?php

            if ($resultsCheck > 0) {
              while ($row = mysqli_fetch_assoc($results)) { ?>

              <tr>
                <th scope="row"><?php echo $row["user_id"];  ?></th>
                <td><?php echo $row["first_name"];  ?></td>
                <td><?php echo $row["last_name"];  ?></td>
                <td><?php echo $row["email"];  ?></td>
                <td><?php echo $row["address"];  ?></td>
                <td><?php echo $row["request_type"];  ?></td>
                <td><?php echo $row["request_desc"];  ?></td>
                <td><?php echo $row["request_date"];  ?></td>
                <td><?php echo $row["request_status"];  ?></td>
                <td>

                  <div class="dropdown">
                    <button class="btn  btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a href="admin-dash.php?accept=<?php echo $row["request_id"]; ?>" class="dropdown-item">Accept</a>
                      <a href="admin-dash.php?completed=<?php echo $row["request_id"]; ?>"
                        class="dropdown-item">Completed</a>
                      <a href="admin-dash.php?delete=<?php echo $row["request_id"]; ?>" class="dropdown-item">Remove</a>
                    </div>
                  </div>

                </td>
              </tr>


              <?php }?>
              <?php 
          
          }?>

              <?php
            
            if (isset($_GET['accept'])) {

              

              if (isset($_SESSION["operator_id"])) {

                $id = $_GET['accept'];
                $op_id = $_SESSION["operator_id"];

                $sql = "UPDATE request SET responder_id = $op_id WHERE request_id = $id;";
                mysqli_query($conn,$sql); 

                $sql = "UPDATE request SET request_status = 'Accepted' WHERE request_id = $id;";
                mysqli_query($conn,$sql); 
                
              }else{

                $of_id = $_SESSION["officer_id"];
                $id = $_GET['accept'];
               
                $sql = "UPDATE request SET responder_id = $of_id WHERE request_id = $id;";
                mysqli_query($conn,$sql); 

              $sql = "UPDATE request SET request_status = 'Accepted' WHERE request_id = $id;";
              mysqli_query($conn,$sql); 

              }


              // $sql = "UPDATE requests SET request_status = 'Accepted' WHERE requests_id = $id;";
              // mysqli_query($conn,$sql); 

            }elseif (isset($_GET['completed'])){
                $id = $_GET['completed'];
                $sql = "UPDATE request SET request_status = 'Completed' WHERE request_id = $id;";
                mysqli_query($conn,$sql);
              }elseif (isset($_GET['delete'])){
                $id = $_GET['delete'];
                $sql = "DELETE FROM request WHERE request_id = $id;";
                //$sql = "UPDATE requests SET request_status = 'Completed' WHERE requests_id = $id;";
                mysqli_query($conn,$sql);
              }
            

          ?>


            </tbody>
          </table>

        </div>
        <div class="tab-pane fade" id="nav-Report" role="tabpanel" aria-labelledby="nav-profile-tab">
          
              <br>
        <center><h2>Download Request Report</h2>
              
                <br>
                <br>



              <div class="dropdown">

                    <button class="btn  btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Download
                    </button>
                    
                   


                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    

                    <form action="DownloadPDF.php" method="post">
 
                      <button type="submit" class="btn btn-link" >CSV</button>

                    </form>

                    <form action="DownloadDOC.php" method="post">
                      <button type="submit" class="btn btn-link" >DOC</button>
                    </form>

                      <!-- <a href="admin-dash.php?downloadPDF" class="dropdown-item">PDF</a>
                      <a href="admin-dash.php?downloadCSV" class="dropdown-item">CSV</a> -->
                    </div>

                  </div>

                  </center>

        </div> 

      </div>
    </div>















    <?php
  include 'footer-admin.php';
?>