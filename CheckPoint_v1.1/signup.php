<?php
    // the tutorial guy uses header.php but i'm not sure if we have one to refer to
    require "header.php";
?>

    <main>
        <div class="wrapper-main" id="frm">
            <section class="section-default">
                <text>Signup</text>
                <form class="form-signup" action="includes/signup.inc.php" method="post">
                <!-- note that there are no id's for username, password, and repeat password -->
                    <p>
                        <label>Username </label>
                        <input type="text" name="uid"    />
                    </p>
                    <p>
                        <label>Password  </label>
                        <input type="text" name="pwd"    />
                    </p>
                    <p>
                        <label>Repeat Password </label>
                        <input type="text" name="pwd-repeat"    />
                    </p>
                    <button type="submit" name="signup-submit">Signup</button>
                </form>
                <br><a href=studentlogin.php>Already have an account? Login here.</a>
            </section>
        </div>
    </main>

<?php
    require "footer.php";
?>


