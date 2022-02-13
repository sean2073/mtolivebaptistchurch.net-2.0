
    

<?php

ini_set('display_errors',1);
 error_reporting(E_ALL);

 echo "I'm in the php file.";

$headers = "From: info@mtolivebaptistchurch.net\r\n";
$headers.= "Reply-To: {$_POST['userEmail-address']} \n";
$headers .= "X-Mailer: PHP/".phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

$message = "     
<html>
<head></head>
<body>
    

<h2>
Name: {$_POST['name']} \n
</h2>
</body>
</html>
";
$message .= "

// <html>
// <head></head>
// <body>
// <h2>
Email Address: {$_POST['userEmail-address']} \n
// </h2>
// </body>
// </html>
";

$message .= "
// <html>
// <head></head>
// <body>
// <h2>
Subject: {$_POST['subject']} \n
// </h2>
// </body>
// </html>
";

$message .= "
// <html>
// <head></head>
// <body>
// <h2>
 Message: {$_POST['message']} \n
//  </h2>
//  </body>
//  </html>
 ";

if(mail('seanbbyfield@gmail.com,pastor@mtolivebaptistchurch.net', 'Inquiry from mtolivebaptistchurch.net', 
$message,'From: pastor@mtolivebaptistchurch.net')){
    print "<p class='success'>Mail Sent.</p>";
    } else {
        print "<p class='Error'>Problem in Sending Mail.</p>";
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
