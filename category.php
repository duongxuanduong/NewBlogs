<?php
//Load bài viết theo danh mục
require_once('connection.php');
$id = $_GET['id'];
$query_recent_category =  "SELECT p.*, c.tible as t, c.descripition as des from posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE p.categories_id = " . $id . " ORDER BY created_at DESC LIMIT 7";

$result_recent_category = $conn->query($query_recent_category);

$categorise_cate = array();

while ($row = $result_recent_category->fetch_assoc()) {
	$categorise_cate[] = $row;
}
$cates = $_GET['cate'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>DXD BLOG</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php require_once('MainNav.php') ?>
	<!-- section -->
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<ul class="page-header-breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><?php
							echo $cates;
							?></li>
					</ul>
					<h1>
						<?php
						echo $cates;
						?>
					</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<!-- post -->
						<div class="col-md-12">
							<div class="post post-thumb">
								<a class="post-img" href="blog-post.php?id=<?= $categorise_cate['0']['id'] ?>"><img src="./img/<?= $categorise_cate["0"]["thumbnail"]; ?>" alt="" height="380px"></a>
								<div class="post-body">
									<div class="post-meta">
										<?php
											$kt = NULL;
											$i = 1;
											foreach ($categorie_post as $cate) {
												if (strcasecmp($categorise_cate['0']['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $i;
												}
												if (strcasecmp($categorise_cate['0']['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $i;
												}
												if (strcasecmp($categorise_cate['0']['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $i;
												}
												if (strcasecmp($categorise_cate['0']['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $i;
												}
												$i++;
												if ($i == 5)
													$i = 1;
											}
										?>
										<a class="<?= $kt; ?>" href="category.php?id=<?= $id ?>&cate=<?= $categorise_cate['0']['t'] ?>"><?php echo $categorise_cate['0']['t']; ?></a>
										<span class="post-date"><?php echo $categorise_cate['0']['created_at']; ?></span>
									</div>
									<h3 class="post-title"><a href="blog-post.php?id=<?= $categorise_cate['0']['id'] ?>"><?php echo $categorise_cate['0']['title']; ?></a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<?php for ($i = 1; $i < 3; $i++) { ?>
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="blog-post.php?id=<?= $categorise_cate[$i]['id'] ?>"><img src="./img/<?= $categorise_cate[$i]["thumbnail"]; ?>" alt="" height="243px"></a>
									<div class="post-body">
										<div class="post-meta">
										<?php
											$kt = NULL;
											$a = 1;
											foreach ($categorie_post as $cate) {
												if (strcasecmp($categorise_cate[$i]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $a;
												}
												if (strcasecmp($categorise_cate[$i]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $a;
												}
												if (strcasecmp($categorise_cate[$i]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $a;
												}
												if (strcasecmp($categorise_cate[$i]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $a;
												}
												$a++;
												if ($a == 5)
													$a = 1;
											}
										?>
											<a class="<?php echo $kt; ?>" href="category.php?id=<?= $id ?>&cate=<?= $categorise_cate['0']['t'] ?>"><?php echo $categorise_cate[$i]['t']; ?></a>
											<span class="post-date"><?php echo $categorise_cate[$i]['created_at']; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?= $categorise_cate[$i]['id'] ?>"><?php echo $categorise_cate[$i]['title']; ?></a></h3>
									</div>
								</div>
							</div>
						<?php } ?>
						<!--  /post -->

						<div class="clearfix visible-md visible-lg"></div>

						<!-- ad -->
						<div class="col-md-12">
							<div class="section-row">
								<a href="#">
									<img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
								</a>
							</div>
						</div>
						<!-- ad -->

						<!-- post -->
						<?php for ($i = 3; $i < 8; $i++) {
							if (!isset($categorise_cate[$i]['id']))
								break;
						?>
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?= $categorise_cate[$i]['id'] ?>"><img src="./img/<?= $categorise_cate[$i]["thumbnail"]; ?>" alt="" height="243px"></a>
									<div class="post-body">
										<div class="post-meta">
										<?php
											$kt = NULL;
											$a = 1;
											foreach ($categorie_post as $cate) {
												if (strcasecmp($categorise_cate[$i]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $a;
												}
												if (strcasecmp($categorise_cate[$i]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $a;
												}
												if (strcasecmp($categorise_cate[$i]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $a;
												}
												if (strcasecmp($categorise_cate[$i]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $a;
												}
												$a++;
												if ($a == 5)
													$a = 1;
											}
										?>
											<a class="<?= $kt; ?>" href="category.php?id=<?= $id ?>&cate=<?= $categorise_cate['0']['t'] ?>"><?= $categorise_cate[$i]['t']; ?></a>
											<span class="post-date"><?= $categorise_cate[$i]['created_at']; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?= $categorise_cate[$i]['id'] ?>"><?= $categorise_cate[$i]['title']; ?></a></h3>
										<p><?= $categorise_cate[$i]['description'] ?></p>
									</div>
								</div>
							</div>
						<?php } ?>

						<div class="col-md-12">
							<div class="section-row">
								<button class="primary-button center-block">Load More</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<!-- ad -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-1.jpg" alt="">
						</a>
					</div>
					<?php require_once('right_index.php') ?>
					<!-- /ad -->
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- Footer -->
	<?php require_once('footer.php') ?>
	<!-- /Footer -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>