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
</head>
<body>
    <div class="container">
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Posts List</h3>
    <a href="index" type="button" class="btn btn-primary">Về trang chủ Posts - Admin</a>
    <h2>Id: <?= $posts_ad_postid['id']?></h2>
    <h2>Title: <?= $posts_ad_postid['title'] ?></h2>
    <h2>Description: </h2>
    <p><?= $posts_ad_postid['description'] ?></p>
    <h2>Contents: </h2>
    <p><?= $posts_ad_postid['contents']?></p>
    <h2>Author_id: <?= $posts_ad_postid['author_id'] ?></h2>
    <h2>Categories_id: <?= $posts_ad_postid['categories_id'] ?></h2>
    <h2>Created_at: <?= $posts_ad_postid['created_at'] ?></h2>
    <h2>Thumbnail: </h2>
    <a><img src="../../img/<?=$posts_ad_postid['thumbnail']?>" height="400px"></a>
</body>
</html>