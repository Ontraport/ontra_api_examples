<?php

$data = array(
    "contact_id"=>123456,
    "date"=>1366625710,
    "products"=>array(
        array(
            "product_id"=>6,
            "quantity"=>2,
            "external_id"=>13,
            "price"=>275
        ),
        array(                    
            "product_id"=>13
        )
    )
);

$data = json_encode($data);

// Replace the strings with your API credentials located in Admin > OfficeAutoPilot API Instructions and Key Manager
$appid = "XXXXXXXXXXX";
$key = "XXXXXXXXXXX";

$reqType= "log_transaction";
$postargs = "appid=".$appid."&key=".$key."&reqType=".$reqType."&data=".$data;
$request = "https://api.moon-ray.com/pdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);