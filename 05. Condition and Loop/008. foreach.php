<?php

$students = array("Mengheang","Dany","Sothorng","Sela1","Sela2");

$money = array(2400,5000,6000,10000,15000);

foreach($students as $data){
    echo $data . "<br>";
}
foreach($money as $data){
    echo $data . "<br>";
}

for($i=0;$i<count($students);$i++) {
    echo $students[$i]. " " . $money[$i]."<br>";
}

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
foreach($age as $key => $value) {
    echo "$key = $value<br>";
}

?>