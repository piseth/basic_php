<?php
$favcolor = "yellow";

switch ($favcolor) {
  case "red": echo "Your favorite color is red!";break;
  case "blue":
    echo "Your favorite color is blue!";break;
  case "green":
    echo "Your favorite color is green!";break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}

$day = 1;

switch ($day) {
  case $day > 2:
    echo "Monday test";break;
  case 2:
    echo "Tuesday";break;
  case 3:
    echo "Wednesday";break;
  default:
    echo "Sunday";
}
?>