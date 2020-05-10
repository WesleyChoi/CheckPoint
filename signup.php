<?php
    // the tutorial guy uses header.php but i'm not sure if we have one to refer to
    require "header.php";
?>

    <main>
        <div class="wrapper-main" id="frm">
            <section class="section-default">
                <h1>Signup</h1>
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
                    <div class="input-form">
                        <input type="text" name="fn" class="first_name" placeholder="Task Description" value="<?php echo isset($_GET['fn']) ? $_GET['fn']: ''?>" required   ><br>
                        <label for="first_name">First Name </label>
                    </div>
                    <div class="input-form">
                        <input type="text" name="ln" class="last_name" placeholder="Task Description" value="<?php echo isset($_GET['ln']) ? $_GET['ln']: ''?>" required    ><br>
                        <label for="last_name">Last Name </label>
                    </div>
                    <div class="input-form">
                        <input type="text" name="uid" class="user_name" placeholder="Task Description" value="<?php echo isset($_GET['uid']) ? $_GET['uid']: ''?>" required  ><br>
                        <label for="user_name">Username </label>
                    </div>
                    <div class="input-form">
                        <input type="password" name="pwd" class="password" required  ><br>
                        <label for="password">Password </label>
                    </div>
                    <div class="input-form">
                        <input type="password" name="pwd-repeat" class="password-rpt" required  ><br>
                        <label for="password-rpt">Repeat Password </label>
                    </div>
                    <p>
                        <label>Student </label>
                        <input type="radio" name="acctype" value="student"   /><br>
                        <div class="input-form">
                            <input type="text" name="cid" class="cid" value="<?php echo isset($_GET['cid']) ? $_GET['cid']: ''?>" placeholder="Enter Class ID"    required  ><br>
                            <label for="cid">Enter Class ID </label>
                        </div>
                    </p>
                    <p>
                        <label>Teacher </label>
                        <input type="radio" name="acctype" value="teacher"  /><br>
                        <div class="input-form">
                            <input type="text" name="cn" class="cn" value="<?php echo isset($_GET['cn']) ? $_GET['cn']: ''?>" placeholder="Enter Course Name"    required  ><br>
                            <label for="cn">Enter Course Name </label>
                        </div>
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


