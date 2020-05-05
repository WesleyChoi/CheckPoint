<?php
    require "header.php";
?>
<body>
    <div id="frm" class="container">
        <form action="includes/login.inc.php" method="POST">
            <text>LOGIN</text>
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
                    } else if ($_GET['error'] == "studentandteacher") {
                        echo '<p class="loginerror">You can only check one of Student or Teacher.</p>';
                    } else if ($_GET['error'] == "notchecked") {
                        echo '<p class="loginerror">Please check one of Student or Teacher.</p>';
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
                <label>Student </label>
                <input type="checkbox" name="acctype" value="student"   />
            </p>
            <p>
                <label>Teacher </label>
                <input type="checkbox" name="acctype" value="teacher"   />
            </p>
            <p>
                <button type="submit" name="login-submit">Login</button>
            </p>
        <p><a href=signup.php>Don't have an account? Sign up here.</a></p>
        </form>
    </div>
</body>
<?php
    require "footer.php";
?>
