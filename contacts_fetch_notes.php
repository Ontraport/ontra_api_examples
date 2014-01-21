<?php

$data = <<<STRING
<contact_id>12345</contact_id>
STRING;

$appid = "XXXXXXXXXXXXXXXX";
$key = "XXXXXXXXXXXXXXXX";

$reqType= "fetch_notes";
$postargs = "appid=".$appid."&key=".$key."&reqType=".$reqType."&data=".$data;
$request = "http://api.moon-ray.com/cdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);