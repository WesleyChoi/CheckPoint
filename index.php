<?php
    require "header.php";
?>
    <body>
        <div id="container">
            <?php
                if (isset($_SESSION['userId'])) {
                    echo '<p class="login-status">You are logged in!</p>';
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