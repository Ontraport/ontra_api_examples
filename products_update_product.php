<?php

$data = <<<STRING
<product id="2">
    <Group_Tag name="Product Details">
    <field name="Name">Name</field>
    <field name="Price">250.00</field>
    </Group_Tag>
</product>
STRING;

$data = urlencode(urlencode($data));

$appid = "XXXXXXXXXXX";
$key = "XXXXXXXXXXX";

$reqType= "update";
$postargs = "appid=".$appid."&key=".$key."&return_id=1&reqType=".$reqType."&data=".$data;
$request = "http://api.ontraport.com/pdata.php";

$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);
curl_close($session);