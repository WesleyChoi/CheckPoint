<?php

if(isset($_POST['signup=submit'])) {

    require 'dbh.inc.php';

    $username = $_POSTp['uid'];
    $password = $_POSTp['pwd'];
    $passwordrepeat = $_POSTp['pwd-repeat'];
    
    if (empty($username) || empty($password) || empty($passwordrepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username);
        exit();
    }
    else if ($password !== $passwordrepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username);
        exit();
    }
    else {

        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);

    }
}
