<?php

if(isset($_POST['signup-submit'])) {

    $firstname = $_POST['fn'];
    $lastname = $_POST['ln'];
    $username = $_POST['uid'];
    $password = $_POST['pwd'];
    $passwordrepeat = $_POST['pwd-repeat'];

    if (!(isset($_POST['acctype']))) {
        header("Location: ../signup.php?error=notchecked&fn=".$firstname."&ln=".$lastname."&uid=".$username."&cn=".$coursename."&cid=".$classid);
        exit();
    }

    require 'dbh.inc.php';

    $acctype = $_POST['acctype'];
    if ($acctype == "student") {
        $classid = $_POST['cid'];
    } else {
        $coursename = $_POST['cn'];
    }
    
    if ($password !== $passwordrepeat) {
        header("Location: ../signup.php?error=passwordcheck&fn=".$firstname."&ln=".$lastname."&uid=".$username."&cn=".$coursename."&cid=".$classid);
        exit();
    }
    if (empty($coursename) && empty($classid)) {
        header("Location: ../signup.php?error=nocourse&fn=".$firstname."&ln=".$lastname."&uid=".$username);
        exit();
    }
    else {
        // check if the username is taken already
        if ($acctype == "student") {
            $sql = "SELECT uidUsers FROM students WHERE uidUsers=?";
        } else {
            $sql = "SELECT uidUsers FROM teachers WHERE uidUsers=?";
        }
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror&fn=".$firstname."&ln=".$lastname."&uid=".$username."&cn=".$coursename."&cid=".$classid);
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&fn=".$firstname."&ln=".$lastname."&uid=".$username."&cn=".$coursename."&cid=".$classid);
                exit();
            }


            else{
                if ($acctype == "student") {
                    // make sure classid is valid
                    $sql = "SELECT * FROM teachers WHERE classId=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signup.php?error=sqlerror&fn=".$firstname."&ln=".$lastname."&uid=".$username."&cn=".$coursename."&cid=".$classid);
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "i", $classid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if ($row = mysqli_fetch_assoc($result)) {
                            // if so, get courseName from teacher's table entry
                            $coursename = $row['courseName'];
                        } else {
                            header("Location: ../signup.php?error=invalidcid&fn=".$firstname."&ln=".$lastname."&uid=".$username."&cn=".$coursename."&cid=".$classid);
                            exit();
                        }
                    }



                    $sql = "INSERT INTO students (firstName, lastName, uidUsers, pwdUsers, courseName, classId) VALUES (?, ?, ?, ?, ?, ?)";
                } else {
                    $sql = "INSERT INTO teachers (firstName, lastName, uidUsers, pwdUsers, courseName, classId) VALUES (?, ?, ?, ?, ?, ?)";
                }
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror&fn=".$firstname."&ln=".$lastname."&uid=".$username."&cn=".$coursename."&cid=".$classid);
                    exit();
                }
                else{
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

                    if ($acctype == "teacher") {
                        // generate randomized classid between 0 and 100
                        do {
                            $classid = rand(1, 100);
                            mysqli_stmt_bind_param($stmt, "i", $classid);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $resultCheck = mysqli_stmt_num_rows($stmt);
                        } while ($resultCheck > 0);
                    } 
                    

                    mysqli_stmt_bind_param($stmt, "sssssi", $firstname, $lastname, $username, $hashedpwd, $coursename, $classid);
                    mysqli_stmt_execute($stmt);

                    // login the user! start a session for a session variable
                    session_start();
                    $_SESSION['userFn'] = $firstname;
                    $_SESSION['userLn'] = $lastname;
                    $_SESSION['userUid'] = $username;
                    $_SESSION['courseName'] = $coursename;
                    $_SESSION['classId'] = $classid;
                    $_SESSION['accType'] = $acctype;
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
