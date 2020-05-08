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
</body>

<?php
    require "footer.php";
?>