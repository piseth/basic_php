<?php
if( isset($_REQUEST["name"]) || isset($_REQUEST["age"] )) {
    echo "Welcome ". $_REQUEST['name']. "<br />";
    echo "You are ". $_REQUEST['age']. " years old.";
}
?>
<html>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Name: <input type="text" name="name" />
        <br>
        Age: <input type="number" name="age" />
        <br>
        <input type="submit" />
    </form>
</body>
</html>