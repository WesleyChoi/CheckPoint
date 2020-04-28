<?php

    // login.php sends entries from form
    $username = $_POST['user'];
    $password = $_POST['pass'];

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