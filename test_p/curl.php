<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
// ...
curl_setopt($ch, CURLOPT_URL,"https://xearch.xensam.com/api/v2/files/r_all_devices.csv?download=true");

$headers = [
    'X-DreamFactory-Session-Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ0LCJ1c2VyX2lkIjo0NCwiZW1haWwiOiJwYXJhbWppdEB4ZW5zYW0uY29tIiwiZm9yZXZlciI6ZmFsc2UsImlzcyI6Imh0dHBzOlwvXC94ZWFyY2gueGVuc2FtLmNvbVwvYXBpXC92MlwvdXNlclwvc2Vzc2lvbiIsImlhdCI6MTQ5NzM1MTE2MCwiZXhwIjoxNDk3MzYxOTYwLCJuYmYiOjE0OTczNTExNjAsImp0aSI6IjMwOWEyNjMxMjE4N2NkMjcwZWRhM2E0MDQwZGViMGY3In0.e5aa6Qh57Nach_XQGadn2FpkayK0zg-Q1N5Sz-ruck8',
    'X-DreamFactory-Api-Key: bidc865f3d8b6b9679cec71b0144dd0a94d369f9c048f050fb2e9dcd12ef3397'
];







$response = curl_exec($ch);

print_r($response);
// Then, after your curl_exec call:
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
?>
