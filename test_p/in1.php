<?php
$log = "apptify_admin";
$password = "~_Bella_6622";
$redirect = "wp-admin/post-new.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://boutique.appturemarket.com/wp-login.php');
curl_setopt($ch, CURLOPT_POSTFIELDS,'log='.urlencode($log).'&pwd='.urlencode($password).'&redirect_to='.urlencode($redirect));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookies.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");
$result = curl_exec($ch);


print_r($result);
?>

