<?php
// global variable
$x = 5; $y = 10;
function myTest() {
    // global variable
    $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}
myTest();

echo $y; // outputs 15 ?>