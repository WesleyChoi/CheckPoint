<?php

    if (isset($_POST['submit'])) {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $message = $_POST['message'];
    
        $to = "checkpoint333@outlook.com";
        $email_subject = "New Feedback Form Submission";
        $txt = "You have received an email from ".$user_name.":\n\n".$message;
        $headers = "From: ".$user_email;

        mail($to, $email_subject, $txt, $headers);
        header("Location: ../feedback.php?msg=mailsent");
        exit();
    }


?>
