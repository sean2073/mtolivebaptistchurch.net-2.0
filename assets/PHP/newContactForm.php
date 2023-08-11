<?php
 echo "I'm in the newContactForm php file.";
/**
 * This example shows how to handle a simple contact form safely.
 */

//Import PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/seabyf/PHPMailer/src/Exception.php';
require '/home/seabyf/PHPMailer/src/PHPMailer.php';
require '/home/seabyf/PHPMailer/src/SMTP.php';


//Don't run this unless we're handling a form submission
//if (array_key_exists('email', $_POST)) {
if (array_key_exists('userEmail-address', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require '../vendor/autoload.php';
    $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    //Send using SMTP to localhost (faster and safer than using mail()) – requires a local mail server
    //See other examples for how to use a remote server such as gmail
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->Port = 25;

    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('info@mtolivebaptistchurch.net', 'First Last');
    //Choose who the message should be sent to
    //You don't have to use a <select> like in this example, you can simply use a fixed address
    //the important thing is *not* to trust an email address submitted from the form directly,
    //as an attacker can substitute their own and try to use your form to send spam
    // $addresses = [
    //     'sales' => 'sales@example.com',
    //     'support' => 'support@example.com',
    //     'accounts' => 'accounts@example.com',
    // ];
    //Validate address selection before trying to use it
    // if (array_key_exists('dept', $_POST) && array_key_exists($_POST['dept'], $addresses)) {
    //     $mail->addAddress($addresses[$_POST['dept']]);
    // } else {
    //     //Fall back to a fixed address if dept selection is invalid or missing
    //     $mail->addAddress('support@example.com');
    // }

	 $mail->addAddress('info@mtolivebaptistchurch.net', 'Joe User'); // Add a recipient address
    $mail->addAddress('thatbrowngurl@gmail.com');               // Name is optional
  
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['userEmail-address'], $_POST['name'])) {
        $mail->Subject = 'Inquiry from contact form on mtolivebaptistchurch.net';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['userEmail-address']}
<br>
Name: {$_POST['name']}
<br>
Message: {$_POST['message']}
<br>
Subject: {$_POST['subject']}
EOT;

        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but it's unsafe to display errors directly to users - process the error, log it on your server.
            if ($isAjax) {
                http_response_code(500);
            }

            $response = [
                "status" => false,
                "message" => 'Sorry, something went wrong. Please try again later.'
            ];
        } else {
            $response = [
                "status" => true,
                "message" => 'Message sent! Thanks for contacting us.'
            ];
        }
    } else {
        $response = [
            "status" => false,
            "message" => 'Invalid email address, message ignored.'
        ];
    }

    if ($isAjax) {
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($response);
        exit();
    }
}
?>