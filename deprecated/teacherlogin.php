<?php
    require "header.php";
?>

<body>
    <div id="frm" class="container">
        <form action="includes/teacher.login.inc.php" method="POST">
            <text>TEACHER LOGIN</text>
            <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p class="loginerror">You have not filled in all fields.</p>';
                    } else if ($_GET['error'] == "wrongpwd") {
                        echo '<p class="loginerror">Wrong password.</p>';
                    } else if ($_GET['error'] == "nouser") {
                        echo '<p class="loginerror">There is no user with that username.</p>';
                    } else if ($_GET['error'] == "sqlerror") {
                        echo '<p class="loginerror">There was a problem with our database.</p>';
                    }
                }
            ?>
            <p>
                <label>Username </label>
                <input type="text" name="uid"    />
            </p>
            <p>
                <label>Password </label>
                <input type="password" name="pwd"   />
            </p>
            <p>
                <button type="submit" name="login-submit">Login</button>
            </p>
        <a href=studentlogin.php>Are you a student? Login here.</a>
        <p><a href=teachersignup.php>Don't have an account? Sign up here.</a></p>
        </form>
    </div>
</body>
<?php
    require "footer.php";
?>
