<?php

    if (isset($_POST["submit"])) {
        
        session_start();
        session_unset();
        session_destroy();

        header("Location: ../admin.php");


    }
    else {
        header("Location: ../admin.php");
    }

?>