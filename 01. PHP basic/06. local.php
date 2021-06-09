<?php
$x = 5; // global scope

function myTest() {
    $x = 10; // local variable
    echo "<p>Variable x inside function is: $x</p>";
}
myTest();
// $x is global
echo "<p>Variable x outside function is: $x</p>"; ?>