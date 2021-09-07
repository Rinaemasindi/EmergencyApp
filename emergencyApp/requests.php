<?php

  include 'header-3.php';
  include_once "includes/dbh.inc.php";

 ?>



<div class="container">



  <?php
        $userId  = $_SESSION["user_id"];
        
        $query = "SELECT * FROM request WHERE user_id = $userId;"; 
                
                
        $results = mysqli_query($conn,$query);
        $resultsCheck = mysqli_num_rows($results);


        if ($resultsCheck > 0) {
          while ($row = mysqli_fetch_assoc($results)) {

            $status = $row["request_status"];

          }
        }
       ?>
      
        <?php if($status == "Pending") {
          
          echo'
          <div class="contact">
            <div class="container">
              <div class="section-header">
                <h2>Request Pending</h2>
              </div>
            </div>
          </div>
          ';

        }elseif ($status == "Accepted") {?>
<!-- experiment code here -->




<?php

            


  
      $id = $_SESSION["user_id"];
        
        $sql = "SELECT * FROM user_location WHERE user_id = $id;";

      

        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultsCheck > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
          

            $dest_lat = $row["latitude"];
            $dest_lng = $row["longitude"];
            
            
          }
        }

        $query = "SELECT request.request_date,request.request_status,request.request_id,request.responder_id,
        user_location.location_id,user_location.user_id,user_location.latitude,user_location.longitude
        FROM request 
        INNER JOIN user_location ON request.user_id = user_location.user_id
        WHERE request.request_status = 'Accepted' AND request.user_id = $id;";
        
        $result = mysqli_query($conn,$query);
        $resultCheck = mysqli_num_rows($result);

        if ($resultsCheck > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            
            $origin_lat = $row["latitude"];
            $origin_lng = $row["longitude"];
            
            
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
                            <h2>Help is on the way</h2>
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

 





  <?php  }else {

          echo'
          <div class="contact">
            <div class="container">
              <div class="section-header">
                <h2>Request completed</h2>
                  <a href="home.php">Go back</a>
              </div>
            </div>
          </div>
          ';

        }
      ?>



</div>
<?php
  include 'footer.php';
?>