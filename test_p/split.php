<?php
$str='1,2,3,4,4,5,6';
$arr = array();
$begin = 0;
$str = trim($str); # remove leading and trailing whitespace
//echo $end = strpos($str, ',', $begin).'</br>';
while ($end = strpos($str, ',', $begin)) {
	//echo $end = strpos($str, ',', $begin).'</br>';
    $split = strpos($str, ',', $begin);
    $arr[] = substr($str, $begin, $split-$begin);
    $begin = $end+1;
}
print_r($arr);



?>


