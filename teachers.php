<?php
    require "header.php";
    require "includes/dbh.inc.php";

    // initialize errors variable
	$errors = "";

	/* connect to database
	conn = mysqli_connect("localhost", "root", "", "testtodo");*/

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
            $task = $_POST['task'];
            $taskabout = $_POST['taskabout'];
            $taskvalue = $_POST['taskvalue'];
			$sql = "INSERT INTO tasks (task, taskabout, taskvalue) VALUES (?, ?, ?)";
            //mysqli_query($conn, $sql);
            $stmt = mysqli_stmt_init($conn); // new sqli statement
            // check that works with database
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: teachers.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "ssi", $task, $taskabout, $taskvalue);
                mysqli_stmt_execute($stmt);
            }
			header('Location: teachers.php');
		}
    }	
    if (isset($_GET['del_task'])) {
        $task_del = $_GET['del_task'];
    
        mysqli_query($conn, "DELETE FROM tasks WHERE task=".$task_del);
        header('Location: teachers.php');
    }
?>

<body>
    <div id="announcement">
        <t>This is the home page for teachers to access.</t><br>
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
        <form method="post" action="teachers.php" class="input_form">
            <?php 
                if (isset($errors)) { 
                    echo '<p>'.$errors.'</p>';
                }
            ?>

            <input type="text" name="task" class="task_input">
            <input type="text" name="taskabout" class="task_about">
            <input type="text" name="taskvalue" class="task_value">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
        </form>
    </div>

    <!-- Input table display-->
    <div id="tasklist">
        <table>
            <thead>
                <tr>
                    <th id="itemclmn">N</th>
                    <th id="itemclmn">Tasks</th>
                    <th id="itemclmn">Task Description</th>
                    <th id="itemclmn">Task Value</th>
                    <th id="itemclmn">Delete Task</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                $sql = "SELECT * FROM tasks";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                $i = 1; while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td class="task"> <?php echo $row['task']; ?> </td>
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