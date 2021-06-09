<?php
// global variables
$x = 5; $y = 10;
function myTest() {
    // global variable
    global $x, $y;
    $y = $x + $y; 
}
myTest();
echo $y; // outputs 15 
?>