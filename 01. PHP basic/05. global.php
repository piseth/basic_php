<?php
$x = 5; // global scope

function myTest() {
    $x = 10; // another variable
    echo "<p>Variable x inside function is: $x</p>";
}
myTest();

echo "<p>Variable x outside function is: $x</p>"; ?>