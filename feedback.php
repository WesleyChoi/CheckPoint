<?php
    require "header.php";
?>
<body>
    <div id="container">
        <t>Want to contact us, send feedback, or learn more? Feel free to fill out the form below!</t><br>
    </div>
    <div id="frm">
        <form method="post">
            <p>
                <label>Name </label>
                <input type="text" name="uidfeedback"    />
            </p>
            <p>
                <label>Email </label>
                <input type="text" name="emailfeedback"    />
            </p>
            <p>
                <label>Feedback </label>
                <textarea id="feedback" name="feedback" placeholder="Write Feedback..."></textarea>
            </p>
            <p>
                <button type="submit" name="Submit-Feedback">Submit Feedback</button>
            </p>
        </form>
    </div>
</body>
<?php
    require "footer.php";
?>