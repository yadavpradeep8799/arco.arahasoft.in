<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:applications/json');
header('Access-Control_Allow-Method:GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');

include('togglepricingfuncton.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "GET") {

    $togglePlanList = getTogglePricingPlan();
    echo $togglePlanList;

} else {
    $data = [
        'status' => 405,
        'message' => $requestMethod . 'Method Not Allowed',
    ];
    header("HTTP/1.0.405 Method Not Allowed");
    echo json_encode($data);
}

mysqli_close($conn);


?>