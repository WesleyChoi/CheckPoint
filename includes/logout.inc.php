<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php"); // send them to home page
?>