<?php

    if (isset($_POST["submit"])) {
        
        require_once "dbh.inc.php";

        $email = $_POST["email"];
        $user_type = "student";
        $password = $_POST["password"];

        if (empty($email)||empty($password)) {

            header("Location: ../index.php?error=emptyfields&email=".$email);
            exit();
        }
        else {

            $query = "SELECT * FROM user WHERE email = ? AND user_type = ?;";
            $statement = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($statement,$query)) {
                
                header("Location: ../index.php?error=sqlerror");
                exit();

            }
            else {
                mysqli_stmt_bind_param($statement,"ss",$email,$user_type);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);
                if ($row = mysqli_fetch_assoc($result)) {
                    
                    $pwd_check = password_verify($password, $row["password"]);

                     if ($pwd_check == false) {
                         header("Location: ../index.php?error=wrongpassword");
                         exit();
                     }
                     elseif ($pwd_check == true) {
                         
                        session_start();

                        $_SESSION["user_id"] = $row["user_id"];
                        
                        header("Location: ../get-location.php?login=success");
                        exit();

                     }else {
                        header("Location: ../index.php?error=wrongpassword");
                        exit();
                     }

                }else {
                    header("Location: ../index.php?error=nouser");
                    exit();
                }
            }
        }

    }
    else {
        header("Location: ../index.php");
    }

?>