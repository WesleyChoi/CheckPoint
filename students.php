<?php
    require "header.php";
?>
<body>
    <div id="container">
        <t>This is the home page for students to access</t><br>
        <?php
            if (isset($_SESSION['userId'])) {
                echo 'Welcome to Checkpoint, ' . $_SESSION['userFn'];
            }
            else {
                echo 'You are not logged in!';
            }
        ?>
    </div>
</body>
<?php
    require "footer.php";
?>