<?php
    session_start();
    
    if (isset($_POST["sec-submit"])) {
        
        require_once "dbh.inc.php";

        $user_id = $_SESSION["user_id"];
        $request_type = "Security";
        $request_desc = $_POST["desc"];
        $request_date = date("Y-m-d H:i:s");
        $status = "Pending";

        $sql = "INSERT INTO request(user_id,request_type,request_desc,request_date,request_status) VALUES($user_id,'$request_type','$request_desc','$request_date','$status');";
        mysqli_query($conn,$sql);

        header("Location: ../requests.php?request=success");

    }
    elseif (isset($_POST["ambu-submit"])) {
       
        require_once "dbh.inc.php";

        $user_id = $_SESSION["user_id"];
        $request_type = "Ambulance";
        $request_desc = $_POST["desc"];
        $request_date = date("Y-m-d H:i:s");
        $status = "Pending";

        $sql = "INSERT INTO request(user_id,request_type,request_desc,request_date,request_status) VALUES($user_id,'$request_type','$request_desc','$request_date','$status');";
        mysqli_query($conn,$sql);

        header("Location: ../requests.php?request=success");

    }
    // elseif (isset($_POST["fire-submit"])) {
    //     require_once "dbh.inc.php";

    //     $user_id = $_SESSION["user_id"];
    //     $request_type = "Firefighters";
    //     $request_desc = $_POST["desc"];
    //     $request_date = date("Y-m-d H:i:s");
    //     $status = "Pending";

    //     $sql = "INSERT INTO requests(user_id,request_type,request_desc,request_date,status) VALUES($user_id,'$request_type','$request_desc','$request_date','$status');";
    //     mysqli_query($conn,$sql);

    //     header("Location: ../requests.php?request=success");
    // }
    
     


?>