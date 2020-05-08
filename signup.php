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
                            } else if ($_GET['error'] == "notchecked") {
                                echo '<p class="loginerror">Please select one of Student or Teacher.</p>';
                            } else if ($_GET['error'] == "nocourse") {
                                echo '<p class="loginerror">Please fill in Class ID if you\'re a student or Course Name if you\'re a teacher.</p>';
                            } else if ($_GET['error'] == "invalidcid") {
                                echo '<p class="loginerror">The Class ID you\'ve entered is invalid.</p>';
                            }
                        }
                    ?>
                    <p>
                        <label>First Name </label>
                        <input type="text" name="fn" value="<?php echo isset($_GET['fn']) ? $_GET['fn']: ''?>" required    />
                    </p>
                    <p>
                        <label>Last Name </label>
                        <input type="text" name="ln" value="<?php echo isset($_GET['ln']) ? $_GET['ln']: ''?>" required    />
                    </p>
                    <p>
                        <label>Username </label>
                        <input type="text" name="uid" value="<?php echo isset($_GET['uid']) ? $_GET['uid']: ''?>" required   />
                    </p>
                    <p>
                        <label>Password  </label>
                        <input type="password" name="pwd" required    />
                    </p>
                    <p>
                        <label>Repeat Password </label>
                        <input type="password" name="pwd-repeat" required   />
                    </p>
                    <p>
                        <label>Student </label>
                        <input type="radio" name="acctype" value="student"   /><br>
                        <input type="text" name="cid" value="<?php echo isset($_GET['cid']) ? $_GET['cid']: ''?>" placeholder="Enter Class ID"    />
                    </p>
                    <p>
                        <label>Teacher </label>
                        <input type="radio" name="acctype" value="teacher"  /><br>
                        <input type="text" name="cn" value="<?php echo isset($_GET['cn']) ? $_GET['cn']: ''?>" placeholder="Enter Course Name"   />
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


