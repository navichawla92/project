<?php
$str1 ='/user/john/account';
$from1 ='/user/';
$to1 ='/';
//$uri = explode('/', $uri);

echo get_string_between($str1,$from1,$to1);

function get_string_between ($str,$from,$to) {

    $string = substr($str, strpos($str, $from) + strlen($from));

    if (strstr ($string,$to,TRUE) != FALSE) {

        $string = strstr ($string,$to,TRUE);

    }

    return $string;

}

?>
