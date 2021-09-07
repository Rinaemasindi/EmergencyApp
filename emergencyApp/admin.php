<?php 
    // session_start();
    include "header-4.php";

       if (isset($_SESSION["operator_id"]) || isset($_SESSION["officer_id"])) {

        header("Location: admin-dash.php");
    
        exit();   
      }   

 

 

?>
 
<!DOCTYPE html>

  
       
            <div class="header ">
                
                
                 <?php
                    
                    
                          if (isset($_GET['register'])) {
                            if ($_GET['register'] = 'success'){ ?>
                              
                             
                              <div class="alert alert-success" alert-dismissible fade show" role="alert">
                                 <strong>Registration Successful! Please Login.
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
                           <strong>User does not exist!.
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  
                      <?php }
                    }
              ?>
                
                
                
                <div class="container-fluid">
                    
                    <div class="hero row align-items-center">
                        <div class="col-md-7">
                        <div class="col-md-5">
                            
                            <div class="form">
                                <h3>Login</h3>
                                <form action="includes/admin-login.inc.php" method="POST">
                                    <input class="form-control" type="email" name = "email" placeholder="email" required>
                                    <input class="form-control" type="password" name="password" placeholder="password" required>
                                    <input type="radio" name="responder_type" value="ambulance" checked><span class="intxt">Ambulance</span>
                                    <input type="radio" name="responder_type" value="security"><span class="intxt">Security</span><br>
                                    <button class="btn btn-block" type="submit" name="log-submit">Login</button>
                                </form>
                            </div>
                        </div>
                          <!-- <h2><span>Register</span> An Account</h2> -->
                        </div>
                        <div class="col-md-5">
                            <div class="form">
                            
                                <h3>Register</h3>
                                <form action="includes/admin.inc.php" method="POST">
                                    <input class="form-control" type="text" name="firstname" placeholder="First name" required>
                                    <input class="form-control" type="text" name="lastname" placeholder="Last name" required>
                                    <input class="form-control" type="text" name = "phone" placeholder="phone" required>
                                    <input class="form-control" type="email" name = "email" placeholder="email" required>
                                    <span class="intxt">Responder type</span><br>
                                    <input type="radio" name="responder_type" value="ambulance" checked><span class="intxt">Ambulance</span>
                                    <input type="radio" name="responder_type" value="security"><span class="intxt">Security</span><br>
                                    <input class="form-control" type="password" name="password" placeholder="password" required>
                                    <input class="form-control" type="password" name="password_check" placeholder="Confirm password" required>
                                    <button class="btn btn-block" type="submit" name="reg-submit">Register</button>
                                </form>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!-- Header End -->
<?php
  include 'footer.php';
?>