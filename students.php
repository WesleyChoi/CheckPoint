<?php
    require "header.php";
?>
<?php 
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo");
?>

<body>
    <div id="announcement">
        <t>This is the home page for students to access</t><br>
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
            <table>
                <thread>
                    <tr>
                        <th>Tasks</th>
                        <th>Description</th>
                        <th>Task Value</th>
                    </tr>
                </thread>

                <tbody>
                    <?php

                        $tasks = mysqli_query($db, "SELECT * FROM tasks");

                        $i = 1; while($row = mysqli_fetch_array($tasks)) { ?>
                            <td class="task_input"> <?php echo $row['taskname']; ?> </td>
                            <td class="task_about"> <?php echo $row['taskabout']; ?> </td>
                            <td class="task_value"> <?php echo $row['taskvalue']; ?> </td>
                            <td class="delete"> 
                                <a href="index.php?del_task=<?php echo $row['id'] ?>">x</a> 
                            </td>
                            <?php $i++; } ?>
                </tbody>
            </table>
    </div>
</body>
<?php
    require "footer.php";
?>