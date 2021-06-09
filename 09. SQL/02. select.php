<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "up_php";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT uid, name, description FROM tbl_category";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["uid"] . " - Name: " . $row["name"] . " " . $row["description"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
