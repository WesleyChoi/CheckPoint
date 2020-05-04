<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php?logout=success"); // send them to home page
?>