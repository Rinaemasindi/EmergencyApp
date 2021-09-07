<?php
 error_reporting(0);
  include 'header-3.php';
  require_once 'includes/dbh.inc.php';

 ?>
    <br>
          <center>  
          <h1>Request Emergerncy Assistance</h1>
    
        <?php
        
            $userLotLat = $_POST;
            $userId = $_SESSION["user_id"];
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

            
        
        ?>
            <div class="contact">
                <div class="container">

                    <div class="row">
                        <div class="col-sm">
                            <div class="contact-form">

                                <form action="includes/requests.inc.php" method="post">

                                    <div class="form-group">
                                            <textarea class="form-control" name="desc" rows="2" placeholder="Description (optional)" ></textarea>
                                    </div>
                                    <div><button class="btn"  name="sec-submit" type="submit">Security</button></div>

                                </form>
                                    
                              
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="col-sm">
                            <div class="contact-form">
                                
                                <form action="includes/requests.inc.php" method="POST">

                                <div class="form-group">
                                        <textarea class="form-control" name="desc" rows="2" placeholder="Description (optional)" ></textarea>
                                </div>
                                <div><button class="btn"  name="ambu-submit" type="submit">Ambulance</button></div>

                                </form>
                                   
                               
                            </div>
                            <br>
                            <br>
                        </div>
                        <!-- <div class="col-sm">
                            <div class="contact-form">
                                
                                <form action="includes/requests.inc.php" method="POST">

                                    <div class="form-group">
                                        <textarea class="form-control" name="desc" rows="2" placeholder="Description (optional)" ></textarea>
                                    </div>
                                    <div><button class="btn"  name="fire-submit" type="submit">Firefighters</button></div>

                                </form>
                                    
                              
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            </center>
         

<?php
  include 'footer.php';
?>
