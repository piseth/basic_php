<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form with POST method</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        Name: <input name="name" type="text">
        <br>
        AGE: <input name="age" type="number">
        <br>
        <input type="submit">
    </form>

    <?php
    if(isset($_POST['name']) || isset($_POST['age']) ) {
        echo "Welcome <b>". $_POST['name']. "</b> <br/>";
        echo "You are <b>". $_POST['age']. "</b> years old.";
    } 
    ?>
</body>
</html>