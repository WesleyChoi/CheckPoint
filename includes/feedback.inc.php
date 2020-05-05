<?php

    if (isset($_POST['submit'])) {
        $user_name = $_POST['name'];
        $email_subject = "New Form Submission";
        $user_email = $_POST['email'];
        $message = $_POST['message'];
    
        $to = 'wesleyhchoi@gmail.com';
        $headers = "From: ".$email_from;
        $txt = "You have received an email from ".$user_name.".\n\n".$message;


        mail($to, $email_subject, $txt, $headers);
        header("Location: index.php?mailsent");
    }


?>