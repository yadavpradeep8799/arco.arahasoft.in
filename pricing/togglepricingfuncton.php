<?php

//include('db.php');
require '../pricing/config/database.php';

function getTogglePricingPlan()
{
    global $conn;

    // $query = "SELECT plan_sku_code,yearly_price,monthly_price FROM price_master";
    $query = "SELECT plan_sku_code,monthly_price FROM price_master";
    $query_run = mysqli_query($conn, $query);
     

    if ($query_run) {

        if (mysqli_num_rows($query_run) > 0) {

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            
            $data =[
                'status' => 200,
                'message' => 'Toggle Pricing Details Fetched Successfully',
                'data'=> $res
            ];
            //header("HTTP/1.0.200 Toggle Pricing Details Fetched Successfully");
            return json_encode($data);

        } else {
            $data = [
                'status' => 404,
                'message' => 'No Toggle Pricing Details Found',
            ];
            header("HTTP/1.0.404 No Toggle Pricing Details Found");
            return json_encode($data);
        }

    } else {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0.500 Internal Server Error");
        return json_encode($data);

    }
    
}

?>