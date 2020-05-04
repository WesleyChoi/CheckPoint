<?php
    require "header.php";
?>
    <body>
        <div id="announcement">
            <?php
                if (isset($_GET['logout'])) {
                    echo '<t>You have successfully logged out!</t><br>';
                } else if (isset($_GET['signup']) && $_GET['signup'] == "success") {
                    echo 'Signup was successful! Please login because I do not know how to automatically log you in.';
                }
            ?>
        </div>
    </body>
<?php
    require "footer.php";
?>