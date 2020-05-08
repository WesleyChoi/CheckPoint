<?php
    require "header.php";
?>
    <body>
        <?php
            if (isset($_GET['logout'])) {
                echo '<div id="announcement"><t>You have successfully logged out!</t><br></div>';
            } else if (isset($_GET['signup']) && $_GET['signup'] == "success") {
                echo '<div id="announcement"><t>Signup was successful!</t></div>';
            }
        ?>
        <div id=intro>
            <h2>Hello! Welcome to CheckPoint!</h2>
            <p>With an estimated 88% of the workforce and 25-75% of college students being affected by procrastination, it seems that there is a prominent lack of organization and productivity in individuals’ day-to-day lives.</p>

            <p><br>Our solution? Getting younger students more habituated with scheduling by creating a rewards system that incentivises the idea of keeping track of <b>what they need to get done.</b> 
            <br>The goal is to <b>make productivity an integrated part of students' habits</b>, that will carry on past elementary or high school.</p>
        </div>

    </body>
<?php
    require "footer.php";
?>