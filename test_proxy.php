<?php
$ch = curl_init('http://localhost/thedigicoders-com/Home/api_proxy?endpoint=/training/getAll');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
file_put_contents('proxy_test_output.txt', $res);
if(curl_errno($ch)) echo 'ERR: '.curl_error($ch);
else echo 'HTTP '.curl_getinfo($ch, CURLINFO_HTTP_CODE);
