<?php

    session_start();

    require_once "includes/dbh.inc.php";


    if (isset($_SESSION["operator_id"])) {

        $query = "SELECT user.user_id,user.first_name,user.last_name,user.email,user.address,
        request.request_type,request.request_desc,request.request_date,request.request_status,request.request_id 
        FROM request 
        INNER JOIN user ON request.user_id = user.user_id
        WHERE request.request_type = 'Ambulance' AND request.request_status IN ('Completed');";
        
      }else {
        $query = " SELECT user.user_id,user.first_name,user.last_name,user.email,user.address,
        request.request_type,request.request_desc,request.request_date,request.request_status,request.request_id 
        FROM request 
        INNER JOIN user ON request.user_id = user.user_id
        WHERE request.request_type = 'Security' AND request.request_status IN ('Completed');";
      }


    
    $results = mysqli_query($conn,$query);
    $resultsCheck = mysqli_num_rows($results);


    header("Content-Type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="MyMsDocFile.doc');

    echo "<html>";
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";

    echo "<body>";
    ?>

    <center><strong>Request Report</strong></center>
    <br>

    <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">Request Type</th>
                <th scope="col">Request description</th>
                <th scope="col">date</th>
             

              </tr>
            </thead>
            <tbody>


              <?php

            if ($resultsCheck > 0) {
              while ($row = mysqli_fetch_assoc($results)) { ?>

              <tr>
                <th scope="row"><?php echo $row["user_id"];  ?></th>
                <td><?php echo $row["first_name"]." ".$row["last_name"];  ?></td>
                <br>
                <td><?php echo $row["email"];  ?></td>
                <br>
                <td><?php echo $row["address"];  ?></td>
                <br>
                <td><?php echo $row["request_type"];  ?></td>
                <br>
                <td><?php echo $row["request_desc"];  ?></td>
                <br>
                <td><?php echo $row["request_date"];  ?></td>
            
               
            <?php
              }}
            ?>
              </tr>


              </tbody>
          </table>


    </body>
    </html>

