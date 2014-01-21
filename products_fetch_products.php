<?php

$data = <<<STRING
<product_id>1</product_id>
<product_id>2</product_id> //Multiple products can be returned in a single request
STRING;

// Replace the strings with your API credentials located in Admin > OfficeAutoPilot API Instructions and Key Manager
$appid = "XXXXXXXXXXX";
$key = "XXXXXXXXXXX";

$reqType= "fetch";
$postargs = "appid=".$appid."&key=".$key."&reqType=".$reqType."&data=".$data;
$request = "http://api.ontraport.com/pdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);