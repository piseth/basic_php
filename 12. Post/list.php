<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
$sql = "select * from tbl_post";
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
        <h2>Post List</h2>
        <a href="create.php" class="btn btn-success">Add New</a>
        <br /><br>
        <table class="table">
            <thead>
                <tr>
                    <th>UID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Picture</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['uid']?></td>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td>
                            <?php
                                $cate = mysqli_query($db->connect(),"SELECT * FROM tbl_category where uid=".$row['category']);
                                if(mysqli_num_rows($cate)> 0) if($record = mysqli_fetch_array($cate)) {echo $record['name'];}
                            ?>
                            </td>
                            <td><img width='200px' src='upload/<?php echo $row['picture']?>' alt='picture' /></td>
                            <td><button onclick="removePost('<?php echo $row['uid']?>','<?php echo $row['picture']?>')" href='delete.php?uid=<?php echo $row['uid']?>' class='btn btn-danger'>Delete</button></td>
                            <script>
                                function removePost(uid,oldPicture){
                                    if (confirm('Are you sure you want to delete this record?')) {
                                        window.location.href = "delete.php?uid="+uid+"&oldPicture="+oldPicture;
                                        //console.log('Record was deleted.');
                                    }
                                }
                            </script>
                            <td><a href='edit.php?uid=<?php echo $row['uid']?>' class='btn btn-info'>Edit</button></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>