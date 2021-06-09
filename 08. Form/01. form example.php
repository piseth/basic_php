<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form with PHP</h1>
    <form action="process.php" method="post">
        <select name="item">
        <option>Paint</option>
        <option>Brushes</option>
        <option>Erasers</option>
        </select>
        Quantity: <input name="quantity" type="text" />
        <input type="submit" />
    </form>
</body>
</html>