<?php
    require "header.php";
?>
<body>
    <div id="frm" class="container">
        <form action="includes/student.login.inc.php" method="POST">
            <text>STUDENT LOGIN</text>
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
        <p><a href=teacherlogin.php>Are you a teacher? Login here.</a></p>
        <p><a href=studentsignup.php>Don't have an account? Sign up here.</a></p>
        </form>
    </div>
</body>
<?php
    require "footer.php";
?>
