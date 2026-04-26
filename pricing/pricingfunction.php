<?php

//include('db.php');
require '../pricing/config/database.php';

function getPricingPlan($conn)
{
    # global $conn;

    // $query = "SELECT A.attributeName as silverplan_attributeName,A.attCode as silver_attcode , A.attributeType as silver_attributeType , A.valueServiceId as silver_valueServiceId , A.sku_code as silver_sku_code ,A.attributeValue as silver_attributeValue,B.attributeName as goldplan_attributeName,B.attCode as gold_attcode , B.attributeType as gold_attributeType , B.valueServiceId as gold_valueServiceId , B.sku_code as gold_sku_code ,B.attributeValue as gold_attributeValue,C.attributeName as platinumplan_attributeName,C.attCode as platinum_attcode , C.attributeType as platinum_attributeType , C.valueServiceId as platinum_valueServiceId , C.sku_code as platinum_sku_code ,C.attributeValue as platinum_attributeValue FROM silver_plan A, gold_plan B, platinum_plan C WHERE A.attCode = B.attCode AND B.attCode= C.attCode";
    
       $query = "SELECT A.attributeName AS freeplan_attributeName, A.attCode AS free_attcode, A.attributeType AS free_attributeType, A.valueServiceId AS free_valueServiceId, A.sku_code AS free_sku_code, A.attributeValue AS free_attributeValue, B.attributeName AS silverplan_attributeName, B.attCode AS silver_attcode, B.attributeType AS silver_attributeType, B.valueServiceId AS silver_valueServiceId, B.sku_code AS silver_sku_code, B.attributeValue AS silver_attributeValue, C.attributeName AS goldplan_attributeName, C.attCode AS gold_attcode, C.attributeType AS gold_attributeType, C.valueServiceId AS gold_valueServiceId, C.sku_code AS gold_sku_code, C.attributeValue AS gold_attributeValue, D.attributeName AS platinumplan_attributeName, D.attCode AS platinum_attcode, D.attributeType AS platinum_attributeType, D.valueServiceId AS platinum_valueServiceId, D.sku_code AS platinum_sku_code, D.attributeValue AS platinum_attributeValue FROM free_plan A, silver_plan B, gold_plan C, platinum_plan D WHERE A.attCode = B.attCode AND B.attCode = C.attCode AND C.attCode = D.attCode";

    $query_run = mysqli_query($conn, $query);
     

    if ($query_run) {

        if (mysqli_num_rows($query_run) > 0) {

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            
            $data =[
                'status' => 200,
                'message' => 'Pricing Details Fetched Successfully',
                'data'=> $res
            ];
            //header("HTTP/1.0.200 Pricing Details Fetched Successfully");
            return json_encode($data);

        } else {
            $data = [
                'status' => 404,
                'message' => 'No Pricing Details Found',
            ];
            header("HTTP/1.0.404 No Pricing Details Found");
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
