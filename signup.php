<?php
    // the tutorial guy uses header.php but i'm not sure if we have one to refer to
    require "header.php";
?>

    <main>
        <div class="wrapper-main" id="frm">
            <section class="section-default">
                <text>Signup</text>
                <form class="form-signup" action="includes/signup.inc.php" method="POST">
                <!-- note that there are no id's for username, password, and repeat password -->
                    <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "emptyfields") {
                                echo '<p class="signuperror">You have not filled in all fields.</p>';
                            } else if ($_GET['error'] == "usertaken") {
                                echo '<p class="signuperror">That username is taken.</p>';
                            } else if ($_GET['error'] == "passwordcheck") {
                                echo '<p class="signuperror">Passwords don\'t match.</p>';
                            } else if ($_GET['error'] == "sqlerror") {
                                echo '<p class="signuperror">There was a problem with our database.</p>';
                            } else if ($_GET['error'] == "studentandteacher") {
                                echo '<p class="loginerror">You can only check one of Student or Teacher.</p>';
                            } else if ($_GET['error'] == "notchecked") {
                                echo '<p class="loginerror">Please check one of Student or Teacher.</p>';
                            }
                        }
                    ?>
                    <p>
                        <label>First Name </label>
                        <input type="text" name="fn"    />
                    </p>
                    <p>
                        <label>Last Name </label>
                        <input type="text" name="ln"    />
                    </p>
                    <p>
                        <label>Username </label>
                        <input type="text" name="uid"    />
                    </p>
                    <p>
                        <label>Password  </label>
                        <input type="password" name="pwd"    />
                    </p>
                    <p>
                        <label>Repeat Password </label>
                        <input type="password" name="pwd-repeat"    />
                    </p>
                    <p>
                        <label>Student </label>
                        <input type="checkbox" name="acctype" value="student"   />
                    </p>
                    <p>
                        <label>Teacher </label>
                        <input type="checkbox" name="acctype" value="teacher"   />
                    </p>
                    <button type="submit" name="signup-submit">Signup</button>
                </form>
                <br><a href=login.php>Already have an account? Login here.</a>
            </section>
        </div>
    </main>

<?php
    require "footer.php";
?>


