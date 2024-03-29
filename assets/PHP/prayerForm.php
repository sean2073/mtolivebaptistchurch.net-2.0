<?php
echo 'Inside of prayerForm.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/seabyf/PHPMailer/src/Exception.php';
require '/home/seabyf/PHPMailer/src/PHPMailer.php';
require '/home/seabyf/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.dreamhost.com';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'pastor.wilkerson@mtolivebaptistchurch.net' ;      // SMTP username
    $mail->Password = 'Mtolive2023';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('pastor.wilkerson@mtolivebaptistchurch.net', 'Prayer Request');          //This is the email your form sends From
    $mail->addAddress('pastor.wilkerson@mtolivebaptistchurch.net', ''); // Add a recipient address
    $mail->addAddress('thatbrowngurl@gmail.com');               // Name is optional
   // $mail->addReplyTo('thatbrowngurl@gmail.com');
   //$mail->addReplyTo($_POST['userEmail-address']);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Prayer Request From mtolivebaptistchurch.net';
  //  $mail->Body    = 'Body text goes here';
     $mail->Body = <<<EOT
	 Someone from the church sent the following prayer request
<br>
<strong>Message:</strong> 
{$_POST['message']}

EOT;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>