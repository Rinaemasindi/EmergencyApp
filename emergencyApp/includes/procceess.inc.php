<?php
    session_start();
    require_once 'dbh.inc.php';

    if(isset($_POST["pass-update"])){
        

        
        $id = $_SESSION["user_id"];

        

        $password = $_POST["password"];
        $password_check = $_POST["password_check"];

        if($password != $password_check) {

            header("Location: ../profile.php?error=pwdcheck");
            exit();

        }else {
            
            $hashed_pwd = password_hash($password,PASSWORD_DEFAULT);

            $query = "UPDATE user  SET password = '$hashed_pwd' WHERE user_id = $id;";
            mysqli_query($conn,$query);

            header("Location: ../profile.php?passUpdate=success");
            exit();
       
        }





    }else if(isset($_POST["email-update"])){
        

        $email = $_POST["email"];
        $id = $_SESSION["user_id"];

        $query = "UPDATE user SET email = '$email' WHERE user_id = $id;";
        mysqli_query($conn,$query);

        header("Location: ../profile.php?emailUpdate=success");
        exit();


    }else if(isset($_POST["phone-update"])){
        

        $phone = $_POST["phone"];
        $id = $_SESSION["user_id"];

        $query = "UPDATE user SET phone = '$phone' WHERE user_id = $id;";
        mysqli_query($conn,$query);

        header("Location: ../profile.php?phoneUpdate=success");
        exit();
    
    }else if(isset($_POST["name-update"])){
        

        $first_name = $_POST["first-name"];
        $last_name = $_POST["last-name"];
        $id = $_SESSION["user_id"];

        $query = "UPDATE user SET first_name = '$first_name',last_name = '$last_name' WHERE user_id = $id;";
        mysqli_query($conn,$query);

        header("Location: ../profile.php?nameUpdate=success");
        exit();
    
    }else if(isset($_POST["address-update"])){
        

        $address = $_POST["address"];
        $id = $_SESSION["user_id"];

        $query = "UPDATE user SET address = '$address' WHERE user_id = $id;";
        mysqli_query($conn,$query);

        header("Location: ../profile.php?addressUpdate=success");
        exit();
    
    }




?>