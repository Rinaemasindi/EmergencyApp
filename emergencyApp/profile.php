<?php

  include 'header-3.php';
  
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
          
        
          $id = $_SESSION["user_id"];
          
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


<form action="includes/procceess.inc.php" method="POST">

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
      href="profile.php?editName=<?php echo $row["user_id"]; ?>"><i class="fas fa-pen left-space"></i></a></p>
  <p><strong>Password</strong></p>

  <?php if (isset($_GET['editPass'])) {?>


  <form action="includes/procceess.inc.php" method="POST">

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

  <p>******** <a href="profile.php?editPass=<?php echo $row["user_id"]; ?>"><i class="fas fa-pen left-space"></i></a>
  </p>
  <p><strong>Email</strong></p>


  <?php if (isset($_GET['editEmail'])) {?>


  <form action="includes/procceess.inc.php" method="POST">

    <br>
    <div class="col col-lg-2">
      <input type="email" name="email" value="<?php echo $row["email"];?>" class="form-control" placeholder="email" required>
    </div>
    <br>
    <button type="submit" name="email-update" class="btn btn-primary ">update</button>
    <br><br>


  </form>



  <?php } ?>


  <p><?php echo $row["email"];?> <a href="profile.php?editEmail=<?php echo $row["user_id"]; ?>"><i
        class="fas fa-pen left-space"></i></a></p>
  <p><strong>Contact number</strong></p>


  <?php if (isset($_GET['editPhone'])) {?>


<form action="includes/procceess.inc.php" method="POST">

  <br>
  <div class="col col-lg-2">
    <input type="text" name="phone" value="<?php echo $row["phone"];?>" class="form-control" placeholder="email" required>
  </div>
  <br>
  <button type="submit" name="phone-update" class="btn btn-primary ">update</button>
  <br><br>


</form>



<?php } ?>


  <p><?php echo $row["phone"];?> <a href="profile.php?editPhone=<?php echo $row["user_id"]; ?>"><i
        class="fas fa-pen left-space"></i></a></p>


  <p><strong>Address</strong></p>



  <?php if (isset($_GET['editAddress'])) {?>


<form action="includes/procceess.inc.php" method="POST">

  <br>
  <div class="col col-lg-2">
  <textarea name="address" rows="3" class="form-control" required><?php echo $row["address"];?></textarea>
  </div>
  <br>
  <button type="submit" name="address-update" class="btn btn-primary ">update</button>
  <br><br>


</form>

<?php } ?>


  <p><?php echo $row["address"];?> <a href="profile.php?editAddress=<?php echo $row["user_id"]; ?>"><i
        class="fas fa-pen left-space"></i></a></p>


  <br>



  <p> Delete profile <a href="profile.php?deleteProfile1=<?php echo $row["user_id"]; ?>"
      class="btn btn-danger">Delete</a></p>

      <?php

       if (isset($_GET['deleteProfile1'])) {?>

        <p>Are you sure? <a href="profile.php?"class="btn btn-primary">No</a> 
        <a href="profile.php?deleteProfile=<?php echo $row["user_id"]; ?>"class="btn btn-danger">Yes</a></p>


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
            

          ?>

</div>



<?php
  include 'footer.php';
?>