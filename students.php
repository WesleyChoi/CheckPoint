<?php
    require "header.php";
    require "includes/dbh.inc.php";
    
    // mark task as completed
    if (isset($_GET['comp_task'])) {
        $task_del = $_GET['comp_task'];
        
        // we'll need to update the student's point column
        /* insert code
        here */


        /* how do we remove or indicate that this task is completed on the student's account
        without deleting it from the tasks table??? */
        header('Location: students.php?task_completed=y');
    }
?>

<body>
    <div id="announcement">
        <?php 
        if (isset($_GET['task_completed'])) {
            echo '<t>Congratulations! You completed a task!</t><br>';
        } else if (isset($_GET['login']) || isset($_GET['signup'])) {
            echo '<t>This is the home page for students to access</t><br>';
        }
        ?>
    </div>
    <div id="container">
        <?php
            if (isset($_SESSION['userUid'])) {
                echo 'Welcome to Checkpoint, ' . $_SESSION['userFn'] . '!<br>';
                echo 'We wish you the best of luck in '.$_SESSION['courseName'].'!';
            }
            else {
                echo 'You are not logged in!';
            }
        ?>
    </div>
    <div id="tasklist">
        <h2><?php echo $_SESSION['courseName']?> Task List</h2>
        <table>
            <thead>
                <tr>
                    <th id="itemclmn">Number</th>
                    <th id="itemclmn">Task Name</th>
                    <th id="itemclmn">Task Description</th>
                    <th id="itemclmn">Point Value</th>
                    <th id="itemclmn">I've Completed This Task</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                $sql = "SELECT * FROM tasks WHERE classId=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../students.php?error=sqlerror");
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
                        <td class="completed"> 
                            <a href="students.php?comp_task=<?php echo $row['task'] ?>">o</a> 
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