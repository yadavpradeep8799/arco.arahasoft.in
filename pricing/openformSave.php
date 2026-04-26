<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include DB Connection
require "../pricing/config/database.php";

// Include Mail Config (uncomment after making mails.php ready)
require "../pricing/config/mails.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Collect POST data
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$isd = trim($_POST['isd']);
$phone = trim($_POST['phone']);
$company = trim($_POST['company']);
$fullPhone = $isd . $phone;

// Insert using Prepared Statement
$stmt = $conn->prepare("INSERT INTO consultation_requests (name, email, phone, company) VALUES (?, ?, ?, ?)");

if ($stmt === false) {
    echo "Database prepare error: " . $conn->error;
    exit;
}

$stmt->bind_param("ssss", $name, $email, $fullPhone, $company);

// FIRST: Try database insertion
 if ($stmt->execute()) {
    // SECOND: Try sending email
    try {
        $mail = getMailer();

        // Make sure sender address is verified with SMTP
         $mail->setFrom($email, $name);
        $mail->addAddress('yadavpradeep8799@gmail.com', 'Pradeep Yadav');

        $mail->isHTML(true);
        $mail->Subject = 'New Consultation Booking';
        $mail->Body    = "
            <h3>New Consultation Booking Details:</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $fullPhone</p>
            <p><strong>Company:</strong> $company</p>
        ";

        if ($mail->send()) {
            echo "Success"; 
        } else {
            echo "Mail Error"; 
        }

    } catch (Exception $e) {
        echo "Mail Error"; 
    }

} else {
    echo "DB Error"; 
}


$stmt->close();
$conn->close();

?>
