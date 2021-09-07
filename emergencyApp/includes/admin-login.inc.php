<?php

    if (isset($_POST["log-submit"])) {
        
        require_once "dbh.inc.php";

        $email = $_POST["email"];
        $responder_type = $_POST["responder_type"];
        $password = $_POST["password"];

        if (empty($email)||empty($password)) {

            header("Location: ../admin.php?error=emptyfields&email=".$email);
            exit();
        }
        else {


            if ($responder_type == "ambulance") {
            
            

                
            $query = "SELECT * FROM user WHERE email = ? AND user_type = ?;";
            $statement = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($statement,$query)) {
                
                header("Location: ../admin.php?error=sqlerror");
                exit();

            }
            else {
              

                mysqli_stmt_bind_param($statement,"ss",$email,$responder_type);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);
                if ($row = mysqli_fetch_assoc($result)) {
                    
                    $pwd_check = password_verify($password, $row["password"]);

                     if ($pwd_check == false) {
                         header("Location: ../admin.php?error=wrongpassword");
                         exit();
                     }
                     elseif ($pwd_check == true) {
                         
                        session_start();

                        $_SESSION["operator_id"] = $row["user_id"];
                        
                        
                        header("Location: ../get-location2.php?login=success");
                        exit();

                     }else {
                        header("Location: ../admin.php?error=wrongpassword");
                        exit();
                     }

                }else {
                    header("Location: ../admin.php?error=nouser");
                    exit();
                }
            }





            
            }else {
             
                
                      
                $query = "SELECT * FROM user WHERE email = ? AND user_type = ?;";
                $statement = mysqli_stmt_init($conn);
    
                if (!mysqli_stmt_prepare($statement,$query)) {
                    
                    header("Location: ../admin.php?error=sqlerror");
                    exit();
    
                }
                else {
                  
    
                    mysqli_stmt_bind_param($statement,"ss",$email,$responder_type);
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);
                    if ($row = mysqli_fetch_assoc($result)) {
                    
                    $pwd_check = password_verify($password, $row["password"]);

                     if ($pwd_check == false) {
                         header("Location: ../admin.php?error=wrongpassword");
                         exit();
                     }
                     elseif ($pwd_check == true) {
                         
                        session_start();

                        $_SESSION["officer_id"] = $row["user_id"];
                        
                        header("Location: ../get-location2.php?login=success");
                        exit();

                     }else {
                        header("Location: ../admin.php?error=wrongpassword");
                        exit();
                     }

                }else {
                    header("Location: ../admin.php?error=nouser");
                    exit();
                }
            }


            }
        }

    }
    else {
        header("Location: admin.php?back");
    }

?>