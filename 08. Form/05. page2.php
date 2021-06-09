<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET['name']) || isset($_GET['job']) ) {
        echo "Welcome <b>". $_GET['name']. "</b> <br/>";
        echo "You are <b>". $_GET['job']. "</b>.";
    } 
    ?>
</body>
</html>