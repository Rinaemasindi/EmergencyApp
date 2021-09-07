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

    
<style>
  .left-space {
    margin-left: 2em;
  }

  ;
</style>


<div class="container">
  <br>

  <?php
          require_once "includes/dbh.inc.php";
          
          if (isset($_SESSION["officer_id"])){
            $id = $_SESSION["officer_id"];
          }else{
            $id = $_SESSION["operator_id"];
          }
          
          $sql = "SELECT * FROM user WHERE user_id = $id;";

          $results = mysqli_query($conn,$sql);

          $resultsCheck = mysqli_num_rows($results);
          
          ?>

  <?php

if ($resultsCheck > 0) {
  while ($row = mysqli_fetch_assoc($results)) { ?>

  <h1>Personal details</h1>

  <p><strong>Your name</strong></p>



  <?php if (isset($_GET['editName'])) {?>


<form action="includes/procceess.inc2.php" method="POST">

  <br>
  <div class="col col-lg-2">
    <input type="text" name="first-name" value="<?php echo $row["first_name"];?>" class="form-control" placeholder="first name" required>
  </div>
  <br>
  <div class="col col-lg-2">
    <input type="text" name="last-name" value="<?php echo $row["last_name"];?>" class="form-control" placeholder="last name" required>

  </div>
  <br>
  <button type="submit" name="name-update" class="btn btn-primary ">update</button>
  <br><br>


</form>



<?php } ?>



  <p><?php echo $row["first_name"];?> <?php echo $row["last_name"];?> <a
      href="profile2.php?editName=<?php echo $row["user_id"]; ?>"><i class="fas fa-pen left-space"></i></a></p>
  <p><strong>Password</strong></p>

  <?php if (isset($_GET['editPass'])) {?>


  <form action="includes/procceess.inc2.php" method="POST">

    <br>
    <div class="col col-lg-2">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>
    <br>
    <div class="col col-lg-2">
      <input type="password" name="password_check" class="form-control" placeholder="confirm Password" required>

    </div>
    <br>
    <button type="submit" name="pass-update" class="btn btn-primary ">update</button>
    <br><br>


  </form>



  <?php } ?>

  <p>******** <a href="profile2.php?editPass=<?php echo $row["user_id"]; ?>"><i class="fas fa-pen left-space"></i></a>
  </p>
  <p><strong>Email</strong></p>


  <?php if (isset($_GET['editEmail'])) {?>


  <form action="includes/procceess.inc2.php" method="POST">

    <br>
    <div class="col col-lg-2">
      <input type="email" name="email" value="<?php echo $row["email"];?>" class="form-control" placeholder="email" required>
    </div>
    <br>
    <button type="submit" name="email-update" class="btn btn-primary ">update</button>
    <br><br>


  </form>



  <?php } ?>


  <p><?php echo $row["email"];?> <a href="profile2.php?editEmail=<?php echo $row["user_id"]; ?>"><i
        class="fas fa-pen left-space"></i></a></p>
  <p><strong>Contact number</strong></p>


  <?php if (isset($_GET['editPhone'])) {?>


<form action="includes/procceess.inc2.php" method="POST">

  <br>
  <div class="col col-lg-2">
    <input type="text" name="phone" value="<?php echo $row["phone"];?>" class="form-control" placeholder="email" required>
  </div>
  <br>
  <button type="submit" name="phone-update" class="btn btn-primary ">update</button>
  <br><br>


</form>



<?php } ?>


  <p><?php echo $row["phone"];?> <a href="profile2.php?editPhone=<?php echo $row["user_id"]; ?>"><i
        class="fas fa-pen left-space"></i></a></p>




  <br>



    <p> Delete profile <a href="profile2.php?deleteProfile1=<?php echo $row["user_id"]; ?>"
      class="btn btn-danger">Delete</a></p>

      <?php

       if (isset($_GET['deleteProfile1'])) {?>

        <p>Are you sure? <a href="profile2.php?"class="btn btn-primary">No</a> 
        <a href="profile2.php?deleteProfile=<?php echo $row["user_id"]; ?>"class="btn btn-danger">Yes</a></p>


       <?php
       
      }
      
      
      ?>


  <?php }?>
  <?php }?>

  <?php

            
            if (isset($_GET['deleteProfile'])) {

              $id = $_GET['deleteProfile'];
              
              $conn->query("DELETE FROM user_location WHERE user_id = $id") or die($conn->error);

              $conn->query("DELETE FROM request WHERE user_id = $id") or die($conn->error);

              $conn->query("DELETE FROM user WHERE user_id = $id") or die($conn->error);
             
              session_unset();
              session_destroy();
              
            }
            
            header("Location: index.php");

          ?>

</div>



<?php
  include 'footer.php';
?>