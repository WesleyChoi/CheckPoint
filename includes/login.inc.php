<?php
    // login.inc.php sends entries from login form
    if (isset($_POST['login-submit'])) {
        require 'dbh.inc.php';

        $username = $_POST['uid'];
        $password = $_POST['pwd'];

        if (empty($username) || empty($password)) { // send them back
            header("Location: ../index.php?error=emptyfields");
            exit();
        }
        else {
            $sql = "SELECT * FROM users WHERE uidUsers=?;"; // check for username
            $stmt = mysqli_stmt_init($conn); // new sqli statement
            // check that works with database
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $username, $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                // check that we get a result
                if ($row = mysqli_fetch_assoc($result)) {
                    // compare the given password with database password
                    $pwdCheck = password_verify($password, $row['pwdUsers']);
                    if ($pwdCheck == false) {
                        header("Location: ../index.php?error=wrongpwd");
                        exit();
                    }
                    else if ($pwdCheck == true) {
                        // login the user! start a session for a session variable
                        session_start();
                        $_SESSION['userId'] = $row['idUsers'];
                        $_SESSION['userUid'] = $row['uidUsers'];
                        
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                    else { // some mistake happened
                        header("Location: ../index.php?error=sqlerror");
                        exit();
                    }
                }
                else {
                    header("Location: ../index.php?error=nouser");
                    exit();
                }
            }
        }
    }
    else {
        header("Location: ../index.php");
        exit();
    }

    // prevent mysql injection (used to hack passwords)
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($username);
    $password = mysqli_real_escape_string($password);

    // connect to server, select login database
    mysqli_connect("localhost", "root", "");
    mysqli_select_db("loginsystem");

    // query database for user
    $result = mysql_query("select * from users where username = '$username' and password = '$password'") 
            or die("Failed to query database ".mysql_error());
    $row = mysql_fetch_array($result);
    if ($row['username'] == $username && $row['password'] == $password ){
        echo "Welcome to Checkpoint, ".$row['username'];
    } else {
        echo "Failed to login";
    }

?>