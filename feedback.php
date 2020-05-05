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
                <input type="text" name="uidfeedback" class="form-control" placeholder="Your Name" required/>
            </p>
            <p>
                <label>Email </label>
                <input type="text" name="emailfeedback" class="form-control" placeholder="Your Email" required/>
            </p>
            <p>
                <label>Feedback </label>
                <textarea id="feedback" name="feedback" placeholder="Write Feedback..."></textarea>
            </p>
            <p>
                <button type="submit" name="Submit-Feedback">Submit Feedback</button>
            </p>
        </form>
        <div id="success_message" style="width:100%; height=100%; display:none; ">
            <h3>Posted your feedback successfully!</h3>
        </div>
        <div id="error_message" style="width:100%; height=100%; display:none; ">
            <h3>Sorry, there was an error with your submission.</h3>
        </div>
    </div>
</body>
<?php
    require "footer.php";
?>