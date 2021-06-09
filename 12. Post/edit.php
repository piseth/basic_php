<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
$message = "";
$uid = "";
$title ="";
$description ="";
$content="";
$picture = "";
$category = "";
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $uid = isset($_POST['uid'])?$_POST['uid']:"";
    $title = isset($_POST['title'])?$_POST['title']:"";
    $description = isset($_POST['description'])?$_POST['description']:"";
    $content = isset($_POST['content'])?$_POST['content']:"";
    $picture = $db->uploadFile('picture');
    $category = isset($_POST['category'])?$_POST['category']:"";
    $sql = "UPDATE tbl_post set title='".$title."', description='".$description."',content='".$content."',category='".$category."' WHERE uid=$uid";
    if (!empty($picture['filename'])) {
        $picture = $picture['filename'];
        $sql = "UPDATE tbl_post set title='".$title."', description='".$description."',content='".$content."',category='".$category."',picture='".$picture."' WHERE uid=$uid";
        if (!empty($_POST['oldPicture'])) {
            unlink('upload/' . $_POST['oldPicture']);
        }
    } else {
        $picture = isset($_POST['image'])?$_POST['image']:"";
    }
    if (mysqli_query($db->connect(), $sql)) {
      $message = "Record updated successfully";
    } else {
      $message = "Error: " . $sql . "<br>" . mysqli_error($db->connect());
    }
} else {
    $uid = isset($_GET['uid'])?$_GET['uid']:"";
    $sql = "select * from tbl_post where uid=".$uid;
    $result = mysqli_query($db->connect(),$sql);
    if (mysqli_num_rows($result)>0){
        if($row = mysqli_fetch_assoc($result)){
            $title =$row['title'];
            $description = $row['description'];
            $content=$row['content'];
            $picture = $row['picture'];
            $category = $row['category'];
        }
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
                        <h2>Edit Record</h2>
                    </div>
                    
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
                    <form action="edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="uid" value="<?php echo $uid?>">
                        
                        <div class="form-group ">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $title?>">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group ">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description?></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group ">
                            <label>Content</label>
                            <textarea name="content" class="form-control"><?php echo $content?></textarea>
                            <span class="help-block"></span>
                        </div>
                        
                        <div class="form-group ">
                            <label>Picture</label>
                            <input id="myfile" type="file" name="picture">
                            <img id="img" width='200px' src='upload/<?php echo $picture?>' alt='picture' />
                            <input type="hidden" name="image" value="<?php echo $picture?>">
                            <input type="hidden" name="oldPicture" value="<?php echo $picture?>">
                            <span class="help-block"></span>
                            <script>
                                $("#myfile").change(function() {
                                    readURL(this);
                                });
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            $('#img').attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
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
                                        $selected = ($category ==$record['uid'])?"selected":"";
                                    ?>
                                    <option <?php echo $selected?> value="<?php echo $record["uid"];?>"><?php echo $record["name"];?></option>
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