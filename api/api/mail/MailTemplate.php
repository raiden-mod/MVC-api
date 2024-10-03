<?php
// this will add phpmail sender the project
// this will definne the name space
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($mailSubject, $mailBody, $receiverMail): bool
{
// this will create instance of php mailer
$mail = new PHPMailer();
// this will set mailer to use
$mail->isSMTP();
// this will define the smtp host
$mail->Host = "";
// this will enable smtp authentication
$mail->SMTPAuth = true;
// set the gmail user name
$mail->Username = "";
// set gmail password
$mail->Password = "";
// this will set the type of encryption
$mail->SMTPSecure = "ssl";
// this will set the port to connect to
$mail->Port = 465;
// set sender email
$mail->SetFrom(address: "", name: "");
// add recipent
$mail->addAddress(address: $receiverMail);
// this will chek if its HTML
$mail->isHTML(isHtml: true);
// set the subject of email
$mail->Subject = $mailSubject;
// email body
$mail->Body = '';
// finally send the email
if ($mail->send()) {
return true;
} else {
return false;
}
}