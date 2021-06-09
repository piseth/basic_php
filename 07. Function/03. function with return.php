<?php

function mysum($data1,$data2){
    $result = $data1 + $data2;
    return $result;
}

function myminus($param1,$param2) {
    return $param1 - $param2;
}

function mymultiply($p1,$p2){
    return $p1 * $p2;
}

function mydivide($param1,$param2){
    if ($param2 == 0){
        return 0;
    }
    return $param1 / $param2;
}

$sum = mysum(50,30);
echo $sum;
echo "<br>";
echo myminus(40,30);
echo "<br>";
echo mymultiply(40,10);
echo "<br>";
echo mydivide(10,0);
?>