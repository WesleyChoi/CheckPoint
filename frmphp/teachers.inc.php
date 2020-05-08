<?php

    $errors = "";

    $servername = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "tasks";

    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

    if (isset($_POST['submit'])) {
        if (empty($_POST['taskname']) {
            $errors = "You must fill in the task";
        }
        if (empty($_POST['taskabout']) {
            $errors = "You must fill in the task description";
        }
        if (empty($_POST['taskvalue']) {
            $errors = "You must fill in the task description";
        }
        else {
            $taskname = $_POST['taskname'];
            $taskabout = $_POST['taskabout'];
            $taskvalue = $_POST['taskvalue']
            $sql = "INSERT INTO taskname (task) VALUES ('$taskname')";
            mysqli_query($conn, $sql)
            header('location: teachers.php')
        }
    }

?>