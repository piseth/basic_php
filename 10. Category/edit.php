<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
$uid = "";
$name = "";
$description = "";
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $uid = isset($_POST['uid'])?$_POST['uid']:"";
    $name = isset($_POST['name'])?$_POST['name']:"";
    $description = isset($_POST['desc'])?$_POST['desc']:"";
    $sql = "update tbl_category set name='".$name."', description='".$description."' where uid=$uid";
    if (mysqli_query($db->connect(), $sql)) {
        $message = "Record updated successfully";
    } else {
        $message = "Error updating record: " . mysqli_error($db->connect());
    }
} else {
    $uid = isset($_GET['uid'])?$_GET['uid']:"";
    $sql = "select * from tbl_category where uid=$uid";
    $result = mysqli_query($db->connect(),$sql);
    if ($row = mysqli_fetch_assoc($result)){
        $name = $row['name'];
        $description = $row['description'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <?php
                    if (!empty($message)){
                        ?>
                          <div class="alert alert-primary alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><?php echo $message?></strong>
                        </div>
                        <?php
                    }
                    ?>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="uid" value="<?php echo $uid?>">
                        <div class="form-group ">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name?>">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label>Description</label>
                            <textarea name="desc" class="form-control"><?php echo $description?></textarea>
                            <span class="help-block"></span>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="list.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>