<?php
$x = 4;
//$x--;
//--$x;
echo "The value of x with post-plusplus = " . $x--;  // 4
echo "<br /> The value of x after the post-plusplus is " . $x; // 3

$y = 4;
echo "<br />The value of y with with pre-plusplus = " . --$y; //3
echo "<br /> The value of y after the pre-plusplus is " . $y; //3
?>