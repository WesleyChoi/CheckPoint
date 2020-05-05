<?php

if(isset($_POST['signup-submit'])) {

    $firstname = $_POST['fn'];
    $lastname = $_POST['ln'];
    $username = $_POST['uid'];
    $password = $_POST['pwd'];
    $passwordrepeat = $_POST['pwd-repeat'];

    if (!(isset($_POST['acctype']))) {
        header("Location: ../signup.php?error=notchecked&fn=".$firstname."&ln=".$lastname."&uid=".$username);
        exit();
    }

    require 'dbh.inc.php';

    $acctype = $_POST['acctype'];
    
    if (empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($passwordrepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username);
        exit();
    }
    else if ($password !== $passwordrepeat) {
        header("Location: ../signup.php?error=passwordcheck&fn=".$firstname."&ln=".$lastname."&uid=".$username);
        exit();
    }
    else {
        if ($acctype == "student") {
            $sql = "SELECT uidUsers FROM students WHERE uidUsers=?";
        } else {
            $sql = "SELECT uidUsers FROM teachers WHERE uidUsers=?";
        }
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror&fn=".$firstname."&ln=".$lastname."&uid=".$username);
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&fn=".$firstname."&ln=".$lastname."&uid=".$username);
                exit();
            }
            else{
                if ($acctype == "student") {
                    $sql = "INSERT INTO students (firstName, lastName, uidUsers, pwdUsers) VALUES (?, ?, ?, ?)";
                } else {
                    $sql = "INSERT INTO teachers (firstName, lastName, uidUsers, pwdUsers) VALUES (?, ?, ?, ?)";
                }
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror&fn=".$firstname."&ln=".$lastname."&uid=".$username);
                    exit();
                }
                else{
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $username, $hashedpwd);
                    mysqli_stmt_execute($stmt);

                    // login the user! start a session for a session variable
                    session_start();
                    $_SESSION['userFn'] = $firstname;
                    $_SESSION['userLn'] = $lastname;
                    $_SESSION['userUid'] = $username;
                    if ($acctype == "student") {
                        header("Location: ../students.php?signup=success");
                    } else {
                        header("Location: ../teachers.php?signup=success");
                    }
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}
else {
    header("Location: ../signup.php");
    exit();
}
