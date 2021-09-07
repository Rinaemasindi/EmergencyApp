<?php

    if (isset($_POST['reg-submit'])) {
        
        
        require_once 'dbh.inc.php';

        $user_type = "Student";
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $student_number = $_POST["studentnumber"];
        $address = $_POST["address"];
        $password = $_POST["password"];
        $password_check = $_POST["password_check"];

        if (empty($firstname)||empty($lastname)||empty($student_number)||empty($email)||empty($address)||empty($phone)||empty($password)||empty($password_check)) {

            header("Location: ../register.php?error=invalidfields&firstname=".$firstname."&lastname=".$lastname."&studentnumber=".$student_number."&email=".$email."&address=".$address);
            exit();

        }
        else if (!preg_match("/^[a-zA-Z]*$/",$firstname) && !preg_match("/^[a-zA-Z]*$/",$lastname) && !preg_match("/^[0-9]*$/",$student_number) && !filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$address)) {
            
            header("Location: ../register.php?error=invalidfields");
            exit();

        }
        elseif(!preg_match("/^[a-zA-Z]*$/",$firstname)){

            header("Location: ../register.php?error=invalidfirstname&lastname=".$lastname."&studentnumber=".$student_number."&email=".$email."&address=".$address);
            exit();

        }
        elseif (!preg_match("/^[a-zA-Z]*$/",$lastname)) {

            header("Location: ../register.php?error=invalidlastname&firstname=".$firstname."&studentnumber=".$student_number."&email=".$email."&address=".$address);
            exit();
        }
        elseif (!preg_match("/^[0-9]*$/",$student_number)) {

            header("Location: ../register.php?error=invalidstudentnumber&firstname=".$firstname."&lastname=".$lastname."&email=".$email."&address=".$address);
            exit();

        }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {

            header("Location: ../register.php?error=email&firstname=".$firstname."&lastname=".$lastname."&studentnumber=".$student_number."&address=".$address);
            exit();

        }elseif ($password !== $password_check) {

            header("Location: ../register.php?error=pwdcheck&firstname=".$firstname."&lastname=".$lastname."&studentnumber=".$student_number."&email=".$email."&address=".$address);
            exit();

        }else {
            
            $query = "SELECT * FROM user WHERE student_number = ? OR email = ?;";

            $statement = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($statement,$query)) {
                
                header("Location: ../register.php?error=sqlerror1");
                exit();

            }
            else {
                mysqli_stmt_bind_param($statement,"is",$student_number,$email);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);
                $result_check = mysqli_stmt_num_rows($statement);

                if ($result_check > 0 ) {

                    header("Location: ../register.php?error=usertaken");
                    exit();

                }
                else {
                    $query = "INSERT INTO user(user_type,first_name,last_name,phone,student_number,email,address,password) VALUES(?,?,?,?,?,?,?,?);";
                    $statement = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($statement,$query)) {
                        
                        header("Location: ../register.php?error=sqlerror2");
                        exit();

                    }
                    else {
                        $hashed_pwd = password_hash($password,PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($statement,"ssssisss",$user_type,$firstname,$lastname,$phone,$student_number,$email,$address,$hashed_pwd);
                        mysqli_stmt_execute($statement);
                        header("Location: ../index.php?register=success");
                        exit();
                    }
                }

            }

        }

    }
    else {
        header("Location: ../register.php");
    }

?>