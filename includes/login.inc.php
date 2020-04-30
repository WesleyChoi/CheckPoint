<?php
    // login.inc.php sends entries from login form
    if (isset($_POST['login-submit'])) {
        require 'dbh.inc.php';

        $username = $_POST['user'];
        $password = $_POST['pass'];

        if (empty($username) || empty($password)) { // send them back
            header("Location: ../index.php");
            exit();
        }
        else {
            $sql = "SELECT * FROM users WHERE uidUsers=?;"; // check for username
            $stmt = mysqli_stmt_init($conn); // new sqli statement
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
    mysqli_select_db("login");

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