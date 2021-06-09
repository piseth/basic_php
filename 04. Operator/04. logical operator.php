<?php


$myresult1 = (10>20) && (30>10); // false
$myresult2 = (10>20) || (30>10); // true
$myresult3 = !((10>20) || (30>10)); // false
$myresult4 = !$myresult1;         // true

var_dump($myresult1);
var_dump($myresult2);
var_dump($myresult3);
var_dump($myresult4);

?>