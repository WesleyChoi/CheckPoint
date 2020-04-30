<?php
    require "header.php";
?>
    <body>
        <div id="container">
            <?php
                if (isset($_SESSION['userId'])) {
                    echo 'Welcome to Checkpoint, ' . $_SESSION['userUid'];
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