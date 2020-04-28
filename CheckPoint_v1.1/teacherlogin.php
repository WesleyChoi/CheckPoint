<?php
    require "header.php";
?>

<body>
    <div id="frm" class="container">
        <form action="process.php" method="POST">
            <text>TEACHER LOGIN</text>
            <p>
                <label>Username </label>
                <input type="text" id="user" name="user"    />
            </p>
            <p>
                <label>Password </label>
                <input type="text" id="pass" name="pass"   />
            </p>
            <p>
                <input type="submit" id="btn" value="Login"     />
            </p>
        <a href=studentlogin.php>Are you a student? Login here.</a>
        </form>
    </div>
</body>
<?php
    require "footer.php";
?>
