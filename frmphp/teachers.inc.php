<?php

    $errors = "";

    $servername = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "tasks";

    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

    if (isset($_POST['submit'])) {
        $taskname = $_POST['taskname'];
        $taskabout = $_POST['taskabout'];
        $taskvalue = $_POST['taskvalue']
        $sql = "INSERT INTO tasks (taskname, taskabout, taskvalue) VALUES (?, ?, ?)";
        mysqli_query($conn, $sql)
        header('location: teachers.php')
    }

    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
    
        mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
        header('location: index.php');
    }

?>