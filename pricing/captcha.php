<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
require "../vendor/autoload.php";
//include "/config/database.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
// include_once "./pricing/smtp.php";
session_start();
//  echo $_POST;
//  print_r($_POST);
 
// Check for valid captcha

// $error_msg ="";
// if(isset($_POST['submit'])){ 
    
    // echo $_SESSION['captcha_word']."<br>";
$first_name = $_POST['Firstname'];
$Last_name = $_POST['Lastname'];
$email = $_POST['Email'];
$company = $_POST['Company'];
$role = $_POST['Role'];
$contact = $_POST['Contact'];
$company_address = $_POST['CompanyAddress'];
$demo_for = "AIS";
$demodate = $_POST['Date'];
$subject = "Regarding Demo For AIS";

    //  $captcha=$_POST['captcha'];
    //  echo $captcha;        
    // echo $_POST["captcha"];
    // if ($_SESSION['captcha_word'] == $_POST["captcha"])
    // {
        $mysqli = new mysqli("127.0.0.1","root","D0tv1k0pt1ma#123","ais_site");
     //   $mysqli = new mysqli("localhost","pradeep","pradeep","ais_site");
        if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }

// Perform a query, check for error
if (!$mysqli -> query("INSERT INTO request_demo_form (`first_name`, `Last_name`, `email`, `company`, `role`, `contact`, `company_address`, `demo_for`,`demodate`) VALUES ('$first_name','$Last_name','$email','$company','$role','$contact','$company_address','$demo_for','$demodate')")) {
echo("Error description: " . $mysqli -> error);
}
$mysqli -> close();

//smtp connection starts here..//
$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = false;

$mail->Host = "127.0.0.1";
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 25;

$mail->setFrom($email, $first_name);
$mail->addAddress("pradeep.yadav@dotvik.com","Pradeep");
$mail->AddCC('kunal.meshram@dotvik.com  ','Kunal');

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

        // $error_msg="Success";
       echo "Success";
       
    // }else{
    //     // $error_msg="Unsuccesful";
    //     echo "Captcha invalid, please try again";
    // }
    // echo $error_msg;
   
    // echo $_POST["captcha"];

// }


// if ($_SESSION['captcha_word'] == $_POST["captcha"]) {
//     // echo "Thanks for validation! You can proceed now.";
// } else {
//     // echo "Please enter valid captcha.";
// }
// unset($_SESSION['captcha_word']);

// include("generate_captcha.php");
?>
