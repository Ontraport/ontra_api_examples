<?php

//You must pass the contact ID as an argument to indicate which contact is being updated
//Multiple contacts can be updated in a single call by wrapping the data in separate contact tags
$data = <<<STRING
<contact id="12345">
    <Group_Tag name="Contact Information">
        <field name="Company">Ontraport</field>
        <field name="Home Phone">5555555</field>
    </Group_Tag>
</contact>

<contact id="98765">
    <Group_Tag name="Contact Information">
        <field name="E-Mail">test@test.com</field>
    </Group_Tag>
</contact>
STRING;

$data = urlencode(urlencode($data));

// Replace the strings with your API credentials located in Admin > OfficeAutoPilot API Instructions and Key Manager
$appid = "XXXXXXXXXXXXXXX";
$key = "XXXXXXXXXXXXXXX";

$reqType= "update";
$postargs = "appid=".$appid."&key=".$key."&return_id=1&reqType=".$reqType."&data=".$data;
$request = "http://api.ontraport.com/cdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);