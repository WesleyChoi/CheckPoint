<?php
    require "header.php";
?>
<body>
    <div id="container">
        <t>Want to contact us, send feedback, or learn more? Feel free to fill out the form below!</t><br>
    </div>
    <div id="frm">
        <form action="includes/feedback.inc.php" method="post">
            <p>
                <label>Name </label>
                <input type="text" name="name" placeholder="Your Name" required/>
            </p>
            <p>
                <label>Email </label>
                <input type="email" name="email" placeholder="Your Email" required/>
            </p>
            <p>
                <label>Message </label>
                <textarea name="message" placeholder="Write Message..." required></textarea>
            </p>
            <p>
                <button type="submit" name="submit">Submit Message</button>
            </p>
        </form>
        <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] =="mailsent") {
                    echo "<div style=\"width:100%; height=100%; \">
                    <h3>Sent your message successfully!</h3></div>";
                } else {
                    echo "<div style=\"width:100%; height=100%; \">
                    <h3>Sorry, there was an error with your submission.</h3></div>";
                }
            }
        ?>
        
    </div>
</body>
<?php
    require "footer.php";
?>
