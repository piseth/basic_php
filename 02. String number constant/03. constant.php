<?php

define("PI",3.14);

$r = "100";
$surface = $r * $r * PI;

echo $surface;

//define("CARS", ["Ford", "BMW", "Toyota"]);
//echo CARS[0];

function getSurface($r){
    $surface = $r * $r * PI;
    return $surface;
}

echo getSurface(10);
?>