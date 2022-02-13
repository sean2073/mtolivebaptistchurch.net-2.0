
    

<?php

// ini_set('display_errors',1);
//  error_reporting(E_ALL);

  echo "I'm in the php file.";

$headers = "From: pastor@mtolivebaptistchurch.net\r\n";
$headers .= "Reply-To: {$_POST['userEmail-address']} \n";
$headers .= "X-Mailer: PHP/".phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body> <h2>';
$message .= "Name: {$_POST['name']}\r\n";
$message .= '<br>';
$message .= "Email Address: {$_POST['userEmail-address']} \n";
$message .= '<br>';
$message .= "Subject: {$_POST['subject']} \n";
$message .= '<br>';
$message .= "Message: {$_POST['message']} \n";
$message .= '</h2></body></html>';

if(mail('seanbbyfield@gmail.com,pastor@mtolivebaptistchurch.net', 'Inquiry from mtolivebaptistchurch.net', 
$message,$headers)){
    // print "<p class='success'>Mail Sent.</p>";
    // header("Location:http://www.mtolivebaptistchurch.net/contact.html/");
        echo "Email Sent";
    } else {
        // print "<p class='Error'>Problem in Sending Mail.</p>";
        echo "Problem in sending email";
}


//mail('seanbbyfield@gmail.com', 'Inquiry from mtolivebaptistchurch.net',$_POST["subject"],$_POST["message"], 'From: pastor@mtolivebaptistchurch.net');

 // $toEmail = 'seanbbyfield@gmail.com, pastor@mtolivebaptistchurch.net';
//     $mailHeaders = "From: " . $_POST["name"] . "<". $_POST["userEmail-address"] .">\r\n";
//     $mailHeaders .= "Reply-To: <{$_POST['userEmail-address']}>";
//     if(mail($toEmail, $_POST["subject"], $_POST["message"], $mailHeaders)) {
//         print "<p class='success'>Mail Sent.</p>";
//     } else {
//         print "<p class='Error'>Problem in Sending Mail.</p>";
//     }

 ?> 
