<?php

$data = <<<STRING
<contact id='16972'>
    <tag>Tag1</tag>
    <tag>Tag2</tag>
</contact>
STRING;

$data = urlencode(urlencode($data));

// Replace the strings with your API credentials located in Admin > OfficeAutoPilot API Instructions and Key Manager
$appid = "XXXXXXXXXXXXXXX";
$key = "XXXXXXXXXXXXXXX";

$reqType = "remove_tag";
$postargs = "appid=".$appid."&key=".$key."&reqType=".$reqType."&data=".$data;
$request = "http://api.ontraport.com/cdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt ($session, CURLOPT_HEADER, false);
curl_setopt ($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);