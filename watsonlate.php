<?php
$turl = 'https://api.eu-gb.language-translator.watson.cloud.ibm.com/instances/XXXXXXXXXXXXXXXXXX/v3/translate?version=2018-05-01';
$payload = '{"text":["'.$raw_t.'"],"model_id":"ru-en"}';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $turl);
curl_setopt($ch, CURLOPT_TIMEOUT, 0.1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$headers = [
'Host: api.eu-gb.language-translator.watson.cloud.ibm.com',
'Authorization: Basic XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
'Content-Type: application/json',
'Connection: close'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$respo = curl_exec($ch);
curl_close ($ch);
return;
?>