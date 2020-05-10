<?php
    require "header.php";
?>
<body>
    <div id="container">
        <t>Want to contact us, send feedback, or learn more? Feel free to fill out the form below!</t><br>
    </div>
    <div id="frm">
        <h2>FEEDBACK</h2>
        <form action="includes/feedback.inc.php" method="post">
            <div class="input-form">
                <input type="text" name="name" class="task_about" placeholder="Your Name" required/>
                <label for="task_about">Name</label>
            </div>
            <div class="input-form">
                <input type="email" name="email" class="task_about" placeholder="Email" required/>
                <label for="task_about">Email</label>
            </div>
            <div class="input-form">
                <input type="textarea" name="message" class="task_about" placeholder="Write Message..." required/>
                <label for="task_about">Write Message...</label>
            </div>
            <p>
                <button type="submit" name="submit">Submit Message</button>
            </p>
        </form>
        <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] =="mailsent") {
                    echo "<div style=\"width:100%; height=100%; \">
                    <h3>Sent your message successfully!</h3></div>";
                }
            }
        ?>
        
    </div>
</body>
<?php
    require "footer.php";
?>
