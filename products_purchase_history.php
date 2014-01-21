<?php

// The following will search for any purchase log entries between 11/1/2012
// and 11/28/2012 where exactly 2 of product 1 or product 2 were purchased

$data = <<<STRING
<purchase_history>H
    <start_date>1351753200</start_date>
    <end_date>1354176000</end_date>
    <product_id>1,2</product_id>
    <quantity>2</quantity>
</purchase_history>
STRING;

// Replace the strings with your API credentials located in Admin > OfficeAutoPilot API Instructions and Key Manager
$appid = "XXXXXXXXXXX";
$key = "XXXXXXXXXXX";

$reqType= "purchase_history";
$postargs = "appid=".$appid."&key=".$key."&reqType=".$reqType."&data=".$data;
$request = "http://api.ontraport.com/pdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);