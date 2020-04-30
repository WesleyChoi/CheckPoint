<?php
    require "header.php";
?>
<body>
    <div id="frm" class="container">
        <form action="login.inc.php" method="POST">
            <text>STUDENT LOGIN</text>
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
        <p><a href=signup.php>Don't have an account? Sign up here.</a></p>
        </form>
    </div>
</body>
<?php
    require "footer.php";
?>
