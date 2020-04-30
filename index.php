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
                    echo '<p class="login-status">You are not logged in!</p>';
                }
            ?>
        </div>
    </body>
<?php
    require "footer.php";
?>