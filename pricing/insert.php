<?php


$mysqli = new mysqli("127.0.0.1","root","D0tv1k0pt1ma#123","ais_site");
if ($mysqli -> connect_errno) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}

// get the post records
$first_name = $_POST['Firstname'];
$Last_name = $_POST['Lastname'];
$email = $_POST['Email'];
$company = $_POST['Company'];
$role = $_POST['Role'];
$contact = $_POST['Contact'];
$company_address = $_POST['CompanyAddress'];
$demo_for = "AIS";
$demodate = $_POST['Date'];


// $date=date_create( $_POST['Date']);
// // echo date_format($date,"d-m-y");

// echo    $_POST['Date'];

// $date=date_create( $_POST['Date']);
// // echo date_format($date,"Y-m-d");



// Perform a query, check for error
if (!$mysqli -> query("INSERT INTO request_demo_form (`first_name`, `Last_name`, `email`, `company`, `role`, `contact`, `company_address`, `demo_for`,`demodate`) VALUES ('$first_name','$Last_name','$email','$company','$role','$contact','$company_address','$demo_for','$demodate')")) {
echo("Error description: " . $mysqli -> error);
}
$mysqli -> close();


?>