<?php

// Construct contact data in XML format
$data = <<<STRING
<contact>
    <Group_Tag name="Contact Information">
        <field name="First Name">Tim</field>
        <field name="Last Name">Lincecum</field>
        <field name="Email">t.lincecum@test.com</field>
    </Group_Tag>
    <Group_Tag name="Sequences and Tags">
        <field name="Contact Tags">Test</field>
        <field name="Sequences">*/*3*/*8*/*</field>
    </Group_Tag>
</contact>
STRING;

$data = urlencode(urlencode($data));

// Replace the strings with your API credentials located in Admin > OfficeAutoPilot API Instructions and Key Manager
$appid = "XXXXXXXXXXXXXXX";
$key = "XXXXXXXXXXXXXXX";

//Set your request type and construct the POST request
$reqType= "add";
$postargs = "appid=".$appid."&key=".$key."&return_id=1&reqType=".$reqType."&data=".$data;
$request = "http://api.ontraport.com/cdata.php";

//Start the curl session and send the data
$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

//Store the response from the API for confirmation or to process return data
$response = curl_exec($session);

//Close the session
curl_close($session);
