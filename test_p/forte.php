<?php

	$externalContent = file_get_contents('http://checkip.dyndns.com/');
	preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
	print_r('CheckIp Response: ' . $m[1] . '<br>');
	
	if(isset($_GET['sandbox']))
	{
		$url = 'https://sandbox.forte.net/api';
		$AccountID  = '303380';
		$LocationID = '165787';
		$APIKey = 'I5sR5qu7R1';
		$SecureTransactionKey = 'tVY6B21X2gm';	
	}
	else
	{
		$url = 'https://api.forte.net';
		$AccountID  = 'act_303380';
		$LocationID = 'loc_165787';
		$APIKey = 'I5sR5qu7R1';
		$SecureTransactionKey = 'tVY6B21X2gm';	
	}

	$auth_token = base64_encode($APIKey.':'.$SecureTransactionKey);
	$service_url = $url.'/v2/accounts/'.$AccountID.'/locations/'.$LocationID.'/customers/';
	
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$auth_token,
					             'X-Forte-Auth-Account-Id: '.$AccountID,
						     'Content-Type: application/json'));
   	curl_setopt($curl, CURLOPT_NOBODY, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	curl_setopt($curl, CURLOPT_FAILONERROR, false);
	
	$curl_response = curl_exec($curl);

	//Use this to look for bad HTTP status codes
	$info = curl_getinfo($curl);
	print_r('HttpStatus Code: ' . $info['http_code'] . '<br>');

	//if using CURLOPT_FAILONERROR = true:
	//(Will not contain the information found in the response body.)
	if($curl_response === false)
	{
	    print_r('Curl error: ' . curl_error($curl) . '<br>');
	}
	
	curl_close($curl);
	print_r($curl_response);

	$decoded = json_decode($curl_response);
	print_r($decoded);

	echo '<br> end here';
?>
