<?php

function mygreeting1($name) {
    echo "Hello " . $name;
}

function mygreeting2($fname, $lname){
    echo "Hello " . $lname . " " . $fname;
}


mygreeting1("PISETH");
mygreeting2("PISETH","SOK");
?>