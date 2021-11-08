<?php

$url = 'htps: //jsonplaceholder.typicode.com/users';
// Sample example to get data.
$resource = curl_init($url);
curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($resource);

$code =
$code = curl_getinfo($resource, CURLINFO_HTTP_CODE);
echo '<pre>';
var_dump($code);
echo '</pre>';
echo $result;
echo $result;
// Get response status code

// set_opt_array

// Post reqest
// myintlwancoder2021@gmail.com
// ashinvip2021@