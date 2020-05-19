<?php
    session_start();
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: ../login.php');
    }
	//Liên kết tới file Connection
    require_once('../../connection.php');
    //lấy  danh mục theo id
    $id = $_GET['id'];
	$query_ad_authorsid=  "SELECT * from authors where id=".$id."";

	$result_ad_authorsid = $conn->query($query_ad_authorsid);
  
    $authors_ad_1 = $result_ad_authorsid->fetch_assoc(); 
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
    <h3 align="center">Category List</h3>
    <a href="index.php" type="button" class="btn btn-primary">Về trang chủ Authors - Admin</a>
    <h2>ID: <?=$authors_ad_1['id']?></h2>
    <h2>Name: <?=$authors_ad_1['name'] ?></h2>
    <h2>Email: <?=$authors_ad_1['email']?></h2>
    <h2>Password: <?=$authors_ad_1['password'] ?></h2>
    <h2>Status: <?=$authors_ad_1['status'] ?></h2>
    <h2>Facebook: <?=$authors_ad_1['facebook']?></h2>
    <h2>Instagram: <?=$authors_ad_1['instagram'] ?></h2>
    <h2>Level: <?=$authors_ad_1['level'] ?></h2>
</body>
</html>