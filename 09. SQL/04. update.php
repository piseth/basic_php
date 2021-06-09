<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "up_php";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE tbl_category SET name='cat 55',description='desc 55' WHERE uid=5";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();


?>