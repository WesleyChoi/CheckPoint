<?php
    require "header.php";
?>
    <body>
        <a href="signup.php">Login/Signup</a>
        <div id="container">
            <p class="login-status">You are logged out!</p>
            <p class="login-status">You are logged in!</p>
        </div>
        <form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
        </form>
    </body>
<?php
    require "footer.php";
?>