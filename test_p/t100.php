<?php
$x =1;

function t(){

echo $GLOBALS['x']++.'<br>';
}
function t1(){
t();
t();
t();
t();
}

function t2(){
t1();
t1();
t1();
t1();
t1();
}

function t3(){
t2();
t2();
t2();
t2();
t2();
}

t3();

?>
