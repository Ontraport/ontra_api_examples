<?php

//Multiple contacts can be fetched by sending separate contact IDs
$data = <<<STRING
<contact_id>260414</contact_id>
<contact_id>260413</contact_id>
STRING;

// Replace the strings with your API credentials located in Admin > OfficeAutoPilot API Instructions and Key Manager
$appid = "XXXXXXXXXXXXXXX";
$key = "XXXXXXXXXXXXXXX";

$reqType= "fetch";
$postargs = "appid=".$appid."&key=".$key."&return_id=1&reqType=".$reqType."&data=".$data;
$request = "http://api.ontraport.com/cdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);