<?php
    require "header.php";

    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: teachers.php');
		}
    }	
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
    
        mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
        header('location: teachers.php');
    }
    
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>
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
    <div id="frm">
        <form method="post" action="teachers.php" class="input_form">
            <?php 
                if (isset($errors)) { 
                    echo '<p>'.$errors.'</p>';
                }
            ?>

            <input type="text" name="task" class="task_input">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
        </form>
    </div>
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
                // select all tasks if page is visited or refreshed
                $tasks = mysqli_query($db, "SELECT * FROM tasks");

                $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td class="task"> <?php echo $row['task']; ?> </td>
                        <td class="delete"> 
                            <a href="teachers.php?del_task=<?php echo $row['id'] ?>">x</a> 
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