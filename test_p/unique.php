<?php

$array = array(
    0 => array(
        "name"=> "Foo",
        "slug"=> "Bar"
    ),
    1 => array(
        "name"=> "Foo",
        "slug"=> "Bar"
    ),
    2 => array(
        "name"=> "Test 1",
        "slug"=> "test-1"
    ),
    3 => array(
        "name"=> "Test 2",
        "slug"=> "test-2"
    ),
    4 => array(
        "name"=> "Test 3",
        "slug"=> "test-3"
    )
);



public static function array_unique_by_key (&$array, $key) {
    $tmp = array();
    $result = array();
    foreach ($array as $value) {
        if (!in_array($value[$key], $tmp)) {
            array_push($tmp, $value[$key]);
            array_push($result, $value);
        }
    }
    return $array = $result;
}

$t=array_unique_by_key($array, "name");

print_r($t);

?>
