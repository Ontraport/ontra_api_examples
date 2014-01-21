<?php

//Requires that a contact ID be passed to indicate who to attach the note to
//Optional time argument (Unix time format) can be passed to set the timestamp on the note
$data = <<<STRING
<contact id="16972">
    <note time='1341565200'>Note Contents</note>
</contact>
STRING;

// Replace the strings with your API credentials located in Admin > OfficeAutoPilot API Instructions and Key Manager
$appid = "XXXXXXXXXXXXXXX";
$key = "XXXXXXXXXXXXXXX";

$reqType= "add_notes";
$postargs = "appid=".$appid."&key=".$key."&&reqType=".$reqType."&data=".$data;
$request = "http://api.ontraport.com/cdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);