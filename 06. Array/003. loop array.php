<?php
    $cars = array("Volvo", "BMW", "Toyota");
    $elements = count($cars);

    for($i = 0; $i < $elements; $i++) {
        echo $cars[$i];
        echo "<br>";
    }

    foreach($cars as $car) {
        echo $car . "<br>";
    }

?>