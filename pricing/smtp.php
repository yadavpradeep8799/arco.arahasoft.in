<?php
$first_name = $_POST['Firstname'];
$Last_name = $_POST['Lastname'];
$email = $_POST['Email'];
$company = $_POST['Company'];
$role = $_POST['Role'];
$contact = $_POST['Contact'];
$company_address = $_POST['CompanyAddress'];
$demo_for = "Arco Compliance";
$demodate = $_POST['Date'];
$subject = "Regarding Demo For Arco Compliance";


require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = false;

$mail->Host = "127.0.0.1";
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 25;

$mail->setFrom($email, $name);
$mail->addAddress("pradeep.yadav@dotvik.com","Pradeep");
$mail->AddCC('sanskriti.singh@dotvik.com ', 'Sanskriti');

$body = "Firstname : ".$first_name. "\r\n" .
"Lasttname : ".$Last_name. "\r\n" .
"Company : ".$company. "\r\n" .
"Role : ".$role. "\r\n" .
"Contact : ".$contact. "\r\n" .
"Company_address : ".$company_address. "\r\n" .
"Demo_for : ".$demo_for. "\r\n" .
"Demodate : ".$demodate. "\r\n" ;
$mail->Body =$body;

$mail->Subject = $subject;

$mail->send();

header("Location: ./sent.html ");

?>