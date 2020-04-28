<?php
    // the tutorial guy uses header.php but i'm not sure if we have one to refer to
    require "header.php";
?>

    <main>
        <div class="wrapper-main"
            <section class="section-default">
                <h1>Signup</h1>
                <form class="form-signup" action="includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="password" name="pwd" placeholder= "Password">
                    <input type="password" name="pwd-repeat" placeholder= "Repeat Password">
                    <button type="submit" name="signup-submit">Signup</button>
                </form>
                <a href=studentlogin.php>Already have an account? Login here.</a>
            </section>
        </div>
    </main>

<?php
    require "footer.php";
?>


