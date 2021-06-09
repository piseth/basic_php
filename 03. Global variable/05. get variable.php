<html>

<body>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Name: <input type="text" name="fname">
        <input type="submit">
    </form>
    <a href="register.php?country=cambodia&username=piseth">Register</a>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
       
        $name = isset($_GET['fname'])?$_GET['fname']:"";
        if (empty($name)) {
            echo "Name is empty";
        } else {
            echo $name;
        }
    }

    ?>
</body>

</html>