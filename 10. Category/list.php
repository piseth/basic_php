<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
$sql = "SELECT uid, name, description FROM tbl_category";
$result = mysqli_query($db->connect(), $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Category List</h2>
        <a href="create.php" class="btn btn-primary">Create</a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["uid"]?></td>
                            <td><?php echo $row["name"]?></td>
                            <td><?php echo $row["description"]?></td>
                            <td><button onclick="deleteData(<?php echo $row["uid"]?>)" class="btn btn-danger">Delete</button></td>
                            <td><a href="edit.php?uid=<?php echo $row['uid']?>" class="btn btn-info">Edit</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function deleteData(uid){
            if (confirm("Do you want to remove this record?")) {
                window.location.href = "delete.php?uid="+uid;
            }
        }
    </script>
</body>
</html>