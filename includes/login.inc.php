<!--login.inc.php processes form data from login.php
It either logs user in or sends user back to form with an error message.-->

<?php
    // login.inc.php sends entries from login form
    if (isset($_POST['login-submit'])) {
        require 'dbh.inc.php';

        $username = $_POST['uid'];
        $password = $_POST['pwd'];

        if (!(isset($_POST['acctype']))) {
            header("Location: ../login.php?error=notchecked&uid=".$username);
            exit();
        }
        
        $acctype = $_POST['acctype'];

        if (empty($username) || empty($password)) { // send user back
            header("Location: ../login.php?error=emptyfields&uid=".$username);
            exit();
        }
        else {
            if ($acctype == "student") {
                $sql = "SELECT * FROM students WHERE uidUsers=?;"; // check for pre-existing username
            } else {
                $sql = "SELECT * FROM teachers WHERE uidUsers=?;";
            }
            $stmt = mysqli_stmt_init($conn); // new sqli statement
            // check that statement works with database
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../login.php?error=sqlerror&uid=".$username);
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
                        header("Location: ../login.php?error=wrongpwd&uid=".$username);
                        exit();
                    }
                    else if ($pwdCheck == true) {
                        // login the user! start a session for a session variable
                        session_start();
                        $_SESSION['userFn'] = $row['firstName'];
                        $_SESSION['userLn'] = $row['lastName'];
                        $_SESSION['userUid'] = $row['uidUsers'];
                        $_SESSION['courseName'] = $row['courseName'];
                        $_SESSION['classId'] = $row['classId'];
                        $_SESSION['accType'] = $acctype;
                        if ($acctype == "student") {
                            header("Location: ../students.php?login=success");
                        } else {
                            header("Location: ../teachers.php?login=success");
                        }
                        exit();
                    }
                    else { // some database error happened
                        header("Location: ../login.php?error=sqlerror&uid=".$username);
                        exit();
                    }
                }
                else { // no user exists with that username
                    header("Location: ../login.php?error=nouser&uid=".$username);
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