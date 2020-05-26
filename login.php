<?php
    require "header.php";
?>
<body>
    <div id="frm" class="container">
        <form action="includes/login.inc.php" method="POST">
            <h2>LOGIN</h2>
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
                    } else if ($_GET['error'] == "notchecked") {
                        echo '<p class="loginerror">Please select one of Student or Teacher.</p>';
                    }
                }
            ?>
            <div class="input-form">
                <input type="text" name="uid" class="task_about" placeholder="Task Description" value="<?php echo isset($_GET['uid']) ? $_GET['uid']: ''?>" required/>
                <label for="task_about">Username</label>
            </div>
            <div class="input-form">
                <input type="password" name="pwd" class="pwd" placeholder="Task Description" required>
                <label for="pwd">Password</label>
            </div>
            <div id="radioinput">
                <label id="radioinput-label" for="loginstudent">Student</label>
                <input type="radio" name="acctype" value="student" id="loginstudent"   />
            </div>
            <div id="radioinput">
                <label id="radioinput-label" for="loginteacher">Teacher</label>
                <input type="radio" name="acctype" value="teacher" id="loginteacher"  />
            </div>
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
