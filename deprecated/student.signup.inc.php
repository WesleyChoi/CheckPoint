<?php

if(isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $firstname = $_POST['fn'];
    $lastname = $_POST['ln'];
    $username = $_POST['uid'];
    $password = $_POST['pwd'];
    $passwordrepeat = $_POST['pwd-repeat'];
    
    if (empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($passwordrepeat)) {
        header("Location: ../studentsignup.php?error=emptyfields&uid=".$username);
        exit();
    }
    else if ($password !== $passwordrepeat) {
        header("Location: ../studentsignup.php?error=passwordcheck&uid=".$username);
        exit();
    }
    else {

        $sql = "SELECT uidUsers FROM students WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../studentsignup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../studentsignup.php?error=usertaken");
                exit();
            }
            else{
                $sql = "INSERT INTO students (firstName, lastName, uidUsers, pwdUsers) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../studentsignup.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $username, $hashedpwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success");
                    exit();

                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}
else {
    header("Location: ../studentsignup.php");
    exit();
}
