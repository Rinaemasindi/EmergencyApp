<?php
    session_start();
    require_once 'dbh.inc.php';

    if(isset($_POST["pass-update"])){
        

        
        if (isset($_SESSION["officer_id"])){
            $id = $_SESSION["officer_id"];
          }else{
            $id = $_SESSION["operator_id"];
          }
        

        $password = $_POST["password"];
        $password_check = $_POST["password_check"];

        if($password != $password_check) {

            header("Location: ../profile2.php?error=pwdcheck");
            exit();

        }else {
            
            $hashed_pwd = password_hash($password,PASSWORD_DEFAULT);

            $query = "UPDATE user  SET password = '$hashed_pwd' WHERE user_id = $id;";
            mysqli_query($conn,$query);

            header("Location: ../profile2.php?passUpdate=success");
            exit();
       
        }





    }else if(isset($_POST["email-update"])){
        

        $email = $_POST["email"];
        if (isset($_SESSION["officer_id"])){
            $id = $_SESSION["officer_id"];
          }else{
            $id = $_SESSION["operator_id"];
          }

        $query = "UPDATE user SET email = '$email' WHERE user_id = $id;";
        mysqli_query($conn,$query);

        header("Location: ../profile2.php?emailUpdate=success");
        exit();


    }else if(isset($_POST["phone-update"])){
        

        $phone = $_POST["phone"];
        if (isset($_SESSION["officer_id"])){
            $id = $_SESSION["officer_id"];
          }else{
            $id = $_SESSION["operator_id"];
          }

        $query = "UPDATE user SET phone = '$phone' WHERE user_id = $id;";
        mysqli_query($conn,$query);

        header("Location: ../profile2.php?phoneUpdate=success");
        exit();
    
    }else if(isset($_POST["name-update"])){
        

        $first_name = $_POST["first-name"];
        $last_name = $_POST["last-name"];
        if (isset($_SESSION["officer_id"])){
            $id = $_SESSION["officer_id"];
          }else{
            $id = $_SESSION["operator_id"];
          }

        $query = "UPDATE user SET first_name = '$first_name',last_name = '$last_name' WHERE user_id = $id;";
        mysqli_query($conn,$query);

        header("Location: ../profile2.php?nameUpdate=success");
        exit();
    
    }else if(isset($_POST["address-update"])){
        

        $address = $_POST["address"];
        if (isset($_SESSION["officer_id"])){
            $id = $_SESSION["officer_id"];
          }else{
            $id = $_SESSION["operator_id"];
          }

        $query = "UPDATE user SET address = '$address' WHERE user_id = $id;";
        mysqli_query($conn,$query);

        header("Location: ../profile2.php?addressUpdate=success");
        exit();
    
    }




?>