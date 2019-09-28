<?php
 
if($_POST) {
    $name = "";
    $email = "";
    $message = "";
     
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
         
    }
     
/*     if(isset($_POST['visitor_phone'])) {
        $visitor_phone = filter_var($_POST['visitor_phone'], FILTER_SANITIZE_NUMBER_INT);
    } */
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
 
    $recipient = "info@crwebservices.co.uk";
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
 
    $email_content = "<html><body>";
    $email_content .= "<table style='font-family: Arial;'><tbody><tr><td style='background: #eee; padding: 10px;'>Visitor Name</td><td style='background: #fda; padding: 10px;'>$name</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Visitor Email</td><td style='background: #fda; padding: 10px;'>$email</td></tr>";
    /*     $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Visitor Phone</td><td style='background: #fda; padding: 10px;'>$phone</td></tr>"; */
 
    $email_content .= "<p style='font-family: Arial; font-size: 1.25rem;'><strong>Special Request from $visitor_name &mdash;</strong><i> $message</i>.</p>";
    $email_content .= '</body></html>';
 
    echo $email_content;
     
    if(mail($recipient, "Contact form submission", $email_content, $headers)) {
        echo '<p>Thank you for your message. We will get back to you as soon as possible.</p>';
    } else {
        echo '<p>We are sorry but the message could not be sent.</p>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>