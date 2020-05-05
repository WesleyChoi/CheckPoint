<?php
    require "header.php";
?>
<body>
    <div id="announcement">
        <t>This is the home page for teachers to access</t><br>
        <?php
            if (isset($_SESSION['userUid'])) {
                echo 'Welcome to Checkpoint, ' . $_SESSION['userFn'];
            }
            else {
                echo 'You are not logged in!';
            }
        ?>
    </div> 
    <div id="container">
        <h1>Your Classrooms</h1>
        <button>Add a task</button>
        <button>Delete task</button>
        <button>View students' points</button>
    </div>
</body>
<?php
    require "footer.php";
?>