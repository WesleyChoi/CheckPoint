<?php

    if (isset($_POST['submit'])) {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $message = $_POST['message'];
    
        $to = 'k2chew@uwaterloo.ca';
        $email_subject = "New Feedback Form Submission";
        $txt = "You have received an email from ".$user_name.".\n\n".$message;
        $headers = "From: ".$user_email;

        mail($to, $email_subject, $txt, $headers);
        header("Location: ../index.php?mailsent");
        exit();
    }


?>