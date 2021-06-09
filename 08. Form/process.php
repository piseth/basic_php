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
        if (isset($_POST['quantity']) && isset($_POST['item'])) 
        { 
            $quantity = $_POST['quantity'];
            $item = $_POST['item'];
        } else {
            $quantity = 0;
            $item = ""; 
        }
        echo "You ordered ". $quantity . " " . $item . ".<br />"; 
        echo "Thank you for ordering from Jamuna Art Supplies!"; 
    ?>
</body>
</html>