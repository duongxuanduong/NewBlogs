<?php
    session_start();
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: ../login.php');
    }
	//Liên kết tới file Connection
    require_once('../../connection.php');
    //lấy  danh mục theo id
    $id = $_GET['id'];
	$query_ad_postid=  "SELECT * from posts where id=".$id."";

	$result_ad_postid = $conn->query($query_ad_postid);
  
    $posts_ad_postid = $result_ad_postid->fetch_assoc(); 

    //danh sách category
    $query_post=  "SELECT * from categories";

	$result_post = $conn->query($query_post);

	$cate_value = array();

	while($row = $result_post->fetch_assoc()){
		$cate_value[] = $row;
	}
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zent - Education And Technology Group</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Add Edit Posts</h3>
    <a href="index" type="button" class="btn btn-primary">Về trang chủ Posts - Admin</a>
    <hr>
        <?php if(isset($_COOKIE['msg'])) { ?>
            <div class="alert alert-warning">
                <strong>Thông báo</strong> <?=$_COOKIE['msg']?>
            </div>
        <?php } ?>
        <form action="posts_edit_action.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$posts_ad_postid['id']?> ">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" placeholder="" name="title" value="<?=$posts_ad_postid['title'] ?>">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description" value="<?=$posts_ad_postid['description'] ?>">
            </div>
            <div class="form-group">
                <label for="">Contents</label>
                <textarea rows="8" class="form-control" id="summernote" placeholder="" name="contents"><?=$posts_ad_postid['contents'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="cars">Categories: </label>
                <select id="" name="categories_id" class="form-control">
                    <?php foreach ($cate_value as $cate) {?>
                        <option <?= ($cate['id'] == $posts_ad_postid['categories_id'])?'selected':''?> value="<?=$cate['id']?>"> <?=$cate['tible']?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Thumbnail</label>
                <img src="../../img/<?=$posts_ad_postid['thumbnail']?>" height="200px" width="200px">
                <input type="file" class="form-control" id="" placeholder="" name="thumbnail" value="<?=$posts_ad_postid['thumbnail'] ?>">
            </div>
            <div class="form-group">
                <label for="">Hiện thị bài biết</label>
                <input <?=($posts_ad_postid['status']==1)?'checked':''?> type="checkbox" id="" placeholder="" value="1" name="status"><em>(Check cho phép hiện thị bài viết)</em>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>
    </div>
</body>
</html>