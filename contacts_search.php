<?php

//Multiple search queries can be sent by separating with commas
//Multiple equations work as an AND
$data = <<<STRING
<search>
	<equation>
		<field>First Name</field>
		<op>e</op>
		<value>Multiple,First,Names</value>
		<field>Last Name</field>
	</equation>
	<equation>
		<op>n</op>
		<value>Man</value>
	</equation>
</search>
STRING;

$data = urlencode(urlencode($data));

// Replace the strings with your API credentials located in Admin > OfficeAutoPilot API Instructions and Key Manager
$appid = "XXXXXXXXXXXXXXX";
$key = "XXXXXXXXXXXXXXX";

$reqType = "search";
$postargs = "appid=".$appid."&key=".$key."&reqType=".$reqType."&data=".$data;
$request = "http://api.ontraport.com/cdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt ($session, CURLOPT_HEADER, false);
curl_setopt ($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);