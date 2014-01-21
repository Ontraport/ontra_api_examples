<?php

$data = <<<STRING
<product>
    <Group_Tag name="Product Details">
        <field name="Name">New Product</field>
        <field name="Price">250.00</field>
        <field name="Description">This is a new product</field>
        <field name="Commission (Level 1)">25</field>
        <field name="Commission (Level 2)">10</field>
    </Group_Tag>
</product>
STRING;

$data = urlencode(urlencode($data));

// Replace the strings with your API credentials located in Admin > OfficeAutoPilot API Instructions and Key Manager
$appid = "XXXXXXXXXXX";
$key = "XXXXXXXXXXX";

$reqType= "add";
$postargs = "appid=".$appid."&key=".$key."&reqType=".$reqType."&data=".$data;
$request = "http://api.ontraport.com/pdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);