<?php
    require "header.php";
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
    <div id="frm">
        <form method="post" action="frmphp/teachers.inc.php" class="input_form">
            <p>
                <label>Task Name </label>
                <input type="text" name="taskname" class="task_input" required>
            </p>
            <p>
                <label>Task Description </label>
                <input type="text" name="taskabout" class="task_about" required>
            </p>
            <p>
                <label>Task Value </label>
                <input type="number" name="taskvalue" class="task_value" required>
            </p>
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
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

                        $tasks = mysqli_query($conn, "SELECT * FROM tasks");

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