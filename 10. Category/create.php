<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
$message = "";
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name = isset($_POST['name'])?$_POST['name']:"";
    $description = isset($_POST['desc'])?$_POST['desc']:"";
    $sql = "INSERT INTO tbl_category(name, description) VALUES ('".$name."', '".$description."')";
    
    if (mysqli_query($db->connect(), $sql)) {
      $message = "New record created successfully";
    } else {
      $message = "Error: " . $sql . "<br>" . mysqli_error($db->connect());
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
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
                    <form action="create.php" method="post">
                        <div class="form-group ">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label>Description</label>
                            <textarea name="desc" class="form-control"></textarea>
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