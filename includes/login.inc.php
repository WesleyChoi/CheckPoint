<?php
    // login.inc.php sends entries from login form
    if (isset($_POST['login-submit'])) {
        if (!(isset($_POST['acctype']))) {
            header("Location: ../login.php?error=notchecked");
            exit();
        }

        require 'dbh.inc.php';

        $acctype = $_POST['acctype'];
        $username = $_POST['uid'];
        $password = $_POST['pwd'];

        if (empty($username) || empty($password)) { // send them back
            header("Location: ../login.php?error=emptyfields");
            exit();
        }
        else {
            if ($acctype == "student") {
                $sql = "SELECT * FROM students WHERE uidUsers=?;"; // check for username
            } else {
                $sql = "SELECT * FROM teachers WHERE uidUsers=?;";
            }
            $stmt = mysqli_stmt_init($conn); // new sqli statement
            // check that works with database
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../login.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                // check that we get a result
                if ($row = mysqli_fetch_assoc($result)) {
                    // compare the given password with database password
                    $pwdCheck = password_verify($password, $row['pwdUsers']);
                    if ($pwdCheck == false) {
                        header("Location: ../login.php?error=wrongpwd");
                        exit();
                    }
                    else if ($pwdCheck == true) {
                        // login the user! start a session for a session variable
                        session_start();
                        $_SESSION['userFn'] = $row['firstName'];
                        $_SESSION['userLn'] = $row['lastName'];
                        $_SESSION['userUid'] = $row['uidUsers'];
                        if ($acctype == "student") {
                            header("Location: ../students.php?login=success");
                        } else {
                            header("Location: ../teachers.php?login=success");
                        }
                        exit();
                    }
                    else { // some mistake happened
                        header("Location: ../login.php?error=sqlerror");
                        exit();
                    }
                }
                else {
                    header("Location: ../login.php?error=nouser");
                    exit();
                }
            }
        }
    }
    else {
        header("Location: ../login.php");
        exit();
    }
?>