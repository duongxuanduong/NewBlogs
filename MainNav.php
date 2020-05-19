<?php
//Liên kết tới file Connection
require_once('connection.php');
//load danh mục
$query_post =  "SELECT * from categories";

$result_post = $conn->query($query_post);

$categorie_post = array();

while ($row = $result_post->fetch_assoc()) {
	$categorie_post[] = $row;
}

//load post
$query_post_view_MN =  "SELECT p.*, c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE status= 1 ORDER BY count_view DESC , created_at   DESC limit 4  ";

$result_post_view_MN = $conn->query($query_post_view_MN);

$post_view_MN = array();

while ($row = $result_post_view_MN->fetch_assoc()) {
	$post_view_MN[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Bài Tập PHP Online Buổi 2</title>


</head>

<body>
	<!-- Header -->
	<header id="header">
		<!-- Nav -->
		<div id="nav">
			<!-- Main Nav -->
			<div id="nav-fixed">
				<div class="container">
					<!-- logo -->
					<div class="nav-logo">
						<a href="index.php" class="logo"><img src="./img/logo-lb.png" alt=""></a>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<ul class="nav-menu nav navbar-nav">
						<?php
						$i = 1;
						foreach ($categorie_post as $cate) { ?>
							<li class="cat-<?= $i ?>"><a href="category.php?id=<?= $cate['id'] ?>&cate=<?= $cate['tible'] ?>"><?= $cate['tible'] ?></a></li>
						<?php
							$i++;
							if ($i == 5) {
								$i = 1;
							}
						} ?>
					</ul>
					<!-- /nav -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div class="search-form">
							<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
							<button class="search-close"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">
				<!-- nav -->
				<div class="section-row">
					<ul class="nav-aside-menu">
						<li><a href="index.php">Trang Chủ</a></li>
						<li><a href="about.html">Thông tin</a></li>
						<li><a href="#">Liên Hệ</a></li>
						<li><a href="#">Quảng cáo</a></li>
					</ul>
				</div>
				<!-- /nav -->

				<!-- widget posts -->
				<div class="section-row">
					<h3>Nổi bật</h3>
					<?php foreach ($post_view_MN as $view_MN) { ?>
						<div class="post post-widget">
							<a class="post-img" href="blog-post.php?id=<?= $view_MN['id'] ?>"><img src=./img/<?= $view_MN['thumbnail']; ?> alt="" width="90px" height="90px"></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post.php?id=<?= $view_MN['id'] ?>"><?=$view_MN['title'] ?></a></h3>
							</div>
						</div>
					<?php } ?>
				</div>
				<!-- /widget posts -->

				<!-- social links -->
				<div class="section-row">
					<h3>Follow us</h3>
					<ul class="nav-aside-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div>
				<!-- /social links -->

				<!-- aside nav close -->
				<button class="nav-aside-close"><i class="fa fa-times"></i></button>
				<!-- /aside nav close -->
			</div>
			<!-- Aside Nav -->
		</div>
		<!-- /Nav -->
	</header>
</body>