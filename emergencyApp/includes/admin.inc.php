<?php

    if (isset($_POST['reg-submit'])) {
        
        require_once 'dbh.inc.php';

    
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $user_type = $_POST["responder_type"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_check = $_POST["password_check"];


        

        if (empty($firstname)||empty($lastname)||empty($email)||empty($password)||empty($password_check)||empty($phone)) {

            header("Location: ../admin.php?error=invalidfields&firstname=".$firstname."&lastname=".$lastname."&email=".$email);
            exit();

        }
        else if (!preg_match("/^[a-zA-Z]*$/",$firstname) && !preg_match("/^[a-zA-Z]*$/",$lastname) && !filter_var($email,FILTER_VALIDATE_EMAIL)) {
            
            header("Location: ../admin.php?error=invalidfields");
            exit();

        }
        elseif(!preg_match("/^[a-zA-Z]*$/",$firstname)){

            header("Location: ../admin.php?error=invalidfirstname&lastname=".$lastname."&email=".$email);
            exit();

        }
        elseif (!preg_match("/^[a-zA-Z]*$/",$lastname)) {

            header("Location: ../admin.php?error=invalidlastname&firstname=".$firstname."&email=".$email);
            exit();
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {

            header("Location: ../admin.php?error=email&firstname=".$firstname."&lastname=".$lastname);
            exit();

        }elseif ($password !== $password_check) {

            header("Location: ../admin.php?error=pwdcheck&firstname=".$firstname."&lastname=".$lastname."&email=".$email);
            exit();

        }else {

            if ($responder_type == "Ambulance") {
           

                 
            $query = "SELECT * FROM user WHERE email = ?;";
            $statement = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($statement,$query)) {
                
                header("Location: ../admin.php?error=sqlerror1");
                exit();

            }
            else {
                mysqli_stmt_bind_param($statement,"s",$email);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);
                $result_check = mysqli_stmt_num_rows($statement);

                if ($result_check > 0 ) {

                    header("Location: ../admin.php?error=usertaken");
                    exit();

                }
                else {
                    $query = "INSERT INTO user(user_type,first_name,last_name,phone,email,password) VALUES(?,?,?,?,?,?);";
                    $statement = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($statement,$query)) {
                        
                        header("Location: ../admin.php?error=sqlerror2");
                        exit();

                    }
                    else {
                        $hashed_pwd = password_hash($password,PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($statement,"ssssss",$user_type,$firstname,$lastname,$phone,$email,$hashed_pwd);
                        mysqli_stmt_execute($statement);
                        header("Location: ../admin.php?register=success");
                        exit();
                    }
                }

            }



            }else {
             $query = "SELECT * FROM user WHERE email = ?;";
            $statement = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($statement,$query)) {
                
                header("Location: ../admin.php?error=sqlerror1");
                exit();

            }
            else {
                mysqli_stmt_bind_param($statement,"s",$email);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);
                $result_check = mysqli_stmt_num_rows($statement);

                if ($result_check > 0 ) {

                    header("Location: ../admin.php?error=usertaken");
                    exit();

                }
                else {
                    $query = "INSERT INTO user(user_type,first_name,last_name,phone,email,password) VALUES(?,?,?,?,?,?);";
                    $statement = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($statement,$query)) {
                        
                        header("Location: ../admin.php?error=sqlerror2");
                        exit();

                    }
                    else {
                        $hashed_pwd = password_hash($password,PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($statement,"ssssss",$user_type,$firstname,$lastname,$phone,$email,$hashed_pwd);
                        mysqli_stmt_execute($statement);
                        header("Location: ../admin.php?register=success");
                        exit();
                    }
                }

            }
            }
    
           
        }






    }
    else {
        header("Location: ../admin.php");
    }

?>