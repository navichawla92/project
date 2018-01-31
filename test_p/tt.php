<?php
function sortByKey($arr,$key_order)
{
    if(count(array_intersect(array_keys($arr),$key_order))!=count($key_order))
    {
        return false;
    }
    $ordered_keys=array_merge($key_order,array_diff(array_keys($arr),$key_order));
    $sorted_arr=[];
    foreach($ordered_keys as $key)
    {
        $sorted_arr[$key]=$arr[$key];
    }
    return $sorted_arr;
}

$my_arr=[];
$my_arr['cats'] = array('Shadow', 'Tiger', 'Luna');
$my_arr['dogs'] = array('Buddy', 'Lucy', 'Bella');
$my_arr['dolphins'] = array('Sunny', 'Comet', 'Pumpkin');
$my_arr['lizzards'] = array('Apollo', 'Eddie', 'Bruce');

$order = array('dogs', 'cats','dolphins');

$my_arr=sortByKey($my_arr,$order);
print_r($my_arr);


?>
