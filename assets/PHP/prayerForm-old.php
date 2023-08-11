
    

<?php



$headers = "From: pastor.wilkerson@mtolivebaptistchurch.net\r\n";
$headers .= "Reply-To: {$_POST['email']} \n";
$headers .= "X-Mailer: PHP/".phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= "Access-Control-Allow-Origin: *"; 

$message = '<html><body> <h2>';
//$message .= "Name: {$_POST['name']}\r\n";
//$message .= '<br>';
$message .= "Email Address: {$_POST['email']} \n";
$message .= '<br>';
//$message .= "Subject: {$_POST['subject']} \n";
//$message .= '<br>';
$message .= "Prayer Request: {$_POST['message']} \n";
$message .= '</h2></body></html>';

if(mail('thatbrowngurl@gmail.com,info@mtolivebaptistchurch.net,pastor.wilkerson@mtolivebaptistchurch.net', 'Confidential Prayer Request', 
$message,$headers)){
    echo "<p class='success'>Mail Sent.</p>";
    
    } else {
        echo "<p class='Error'>Problem in Sending Mail.</p>";
       
}



 ?> 
