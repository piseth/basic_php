<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "up_php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO tbl_category (name, description) VALUES ('cat 5', 'desc 5')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>