<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
$message = "";
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $title = isset($_POST['title'])?$_POST['title']:"";
    $description = isset($_POST['description'])?$_POST['description']:"";
    $content = isset($_POST['content'])?$_POST['content']:"";
    $picture = $db->uploadFile('picture');
    $category = isset($_POST['category'])?$_POST['category']:"";
    $sql = "INSERT INTO tbl_post(title, description,content,category) VALUES ('".$title."', '".$description."','".$content."','".$category."')";
    if (!empty($picture['filename'])) {
        $sql = "INSERT INTO tbl_post(title, description,content,picture,category) VALUES ('".$title."', '".$description."','".$content."','".$picture['filename']."','".$category."')";
    }
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
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group ">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group ">
                            <label>Content</label>
                            <textarea name="content" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>
                        
                        <div class="form-group ">
                            <label>Picture</label>
                            <input type="file" name="picture">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <?php
                                    $cate = mysqli_query($db->connect(),"SELECT * FROM tbl_category");
                                    ?>
                                    <option value="">Select Category</option>
                                    <?php
                                    while($record = mysqli_fetch_array($cate)) {
                                    ?>
                                    <option value="<?php echo $record["uid"];?>"><?php echo $record["name"];?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                            
                            <span class="help-block"></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="list.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
</body>
</html>