<?php
$ages = array("Peter"=>"35", "Ben"=>"43", "Joe"=>"37");

krsort($ages);
echo "<pre>" . print_r($ages,true). "</pre>";

?>