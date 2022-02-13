
    

<?php

ini_set('display_errors',1);
 error_reporting(E_ALL);

 echo "I'm in the php file.";

// if(isset($_POST['submit'])){
// $to = "seanbbyfield@gmail.com";

// $mail_from = $_POST['userEmail-address'];

// $name = $_POST['name'];

// $subject = "Some Feedback from" .$mail_from;
// $subject .= $_POST['subject'];

// $message = $_POST['message'];


// $headers = "From: mtolivebaptistchurch.net <$to> \n";
// $headers .= "Reply-To: <{$_POST['userEmail-address']}>";



// $send_contact =mail($to,$mail_from,$subject,$message,$name,$headers);

// if($send_contact){
//   echo "We have received your email, Thank you very much!";
// } else {
//   echo "Oops! There was an error";
// }
// }



$toEmail = "seanbbyfield@gmail.com, pastor@mtolivebaptistchurch.net";
    $mailHeaders = "From: " . $_POST["name"] . "<". $_POST["userEmail-address"] .">\r\n";
    $mailHeaders .= "Reply-To: <{$_POST['userEmail-address']}>";
    if(mail($toEmail, $_POST["subject"], $_POST["message"], $mailHeaders)) {
        print "<p class='success'>Mail Sent.</p>";
    } else {
        print "<p class='Error'>Problem in Sending Mail.</p>";
    }
 ?> 
