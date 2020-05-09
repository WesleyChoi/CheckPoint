<?php
    require "header.php";
    require "includes/dbh.inc.php";

	// if form was submitted, insert task into database
	if (isset($_POST['submit'])) {
        $task = $_POST['task'];
        $taskabout = $_POST['taskabout'];
        $taskvalue = $_POST['taskvalue'];
		$sql = "INSERT INTO tasks (classId, task, taskabout, taskvalue) VALUES (?, ?, ?, ?)";
        //mysqli_query($conn, $sql);
        $stmt = mysqli_stmt_init($conn); // new sqli statement
        // check that works with database
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: teachers.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "issi", $_SESSION['classId'], $task, $taskabout, $taskvalue);
            mysqli_stmt_execute($stmt);
        }
		header('Location: teachers.php');
    }	

    // delete task
    if (isset($_GET['del_task'])) {
        $task_del = $_GET['del_task'];
        
        $sql = "DELETE FROM tasks WHERE task=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../teachers.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $task_del);
            mysqli_stmt_execute($stmt);
        }
        header('Location: teachers.php?task_deleted');
    } else if (isset($_GET['task_deleted'])) {
        $msg = "Task deleted!";
    }
?>

<body>
    <div id="announcement">
        <?php 
        if (isset($_GET['task_deleted'])) {
            echo '<t>You deleted a task.</t><br>';
        } else if (isset($_GET['login']) || isset($_GET['signup'])) {
            echo '<t>This is the home page for teachers to access</t><br>';
        }
        ?>
    </div> 
    <div id="container">
        <?php
            if (isset($_SESSION['userUid'])) {
                echo 'Welcome to Checkpoint, ' . $_SESSION['userFn'];
            }
            else {
                echo 'You are not logged in!';
            }
        ?>
    </div>
    
    <!--User Input-->
    <div id="frm">
        <h2>Set a Task</h2>
        <form method="post" action="teachers.php" class="input_form">
            <?php 
                if (isset($errors)) { 
                    echo '<p>'.$errors.'</p>';
                }
            ?>

            <input type="text" name="task" class="task_input" placeholder="Task Name" required><br>
            <input type="text" name="taskabout" class="task_about" placeholder="Task Description"><br>
            <input type="text" name="taskvalue" class="task_value" placeholder="Worth How Many Points" required><br>
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
        </form>
    </div>

    <!-- Input table display-->
    <div id="tasklist">
        <h2><?php echo $_SESSION['courseName']?> Task List</h2>
        <table>
            <thead>
                <tr>
                    <th id="itemclmn">Number</th>
                    <th id="itemclmn">Task Name</th>
                    <th id="itemclmn">Task Description</th>
                    <th id="itemclmn">Point Value</th>
                    <th id="itemclmn">Delete Task</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                $sql = "SELECT * FROM tasks WHERE classId=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../teachers.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "i", $_SESSION['classId']);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }

                    $i = 1; while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td class="task"> <?php echo $row['task']; ?> </td>
                        <td class="task"> <?php echo $row['taskabout']; ?> </td>
                        <td class="task"> <?php echo $row['taskvalue']; ?> </td>
                        <td class="delete"> 
                            <a href="teachers.php?del_task=<?php echo $row['task'] ?>">x</a> 
                        </td>
                    </tr>
                    <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</body>

<?php
    require "footer.php";
?>