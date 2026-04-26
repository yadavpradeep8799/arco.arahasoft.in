<?php
// configuration for smtp server;

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// variables declare for smtp 
function getMailer() {
$smtp_serverName = "email-smtp.us-east-1.amazonaws.com";
$smtp_port ="587";
$smtp_username = "AKIAVRSL2RHZA6AZXTWH";
$smtp_password = "BKNgJH/wJuhVLOHMl0lVfCwOJ5/JqSRH8N9LonPv+tNY";
$smtp_auth = true;  
$smtp_istls = "tls";

$mail = new PHPMailer();
$mail->IsSMTP();  
$mail->SMTPAuth = $smtp_auth;                
$mail->SMTPSecure = $smtp_istls;              
$mail->Host = $smtp_serverName;   
$mail->Port = $smtp_port;    
$mail->Username = $smtp_username; 
$mail->Password = $smtp_password; 

    return $mail;
}
?>