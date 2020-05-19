<?php
//Liên kết tới file Connection
require_once('connection.php');

//Post 2 bài viết  mới nhất vừa cập nhật
$query_tow_post =  "SELECT p.*, c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE status= 1 ORDER BY created_at DESC limit 2 ";

$result_tow_post = $conn->query($query_tow_post);

$posts_tow_post = array();

while ($row = $result_tow_post->fetch_assoc()) {
	$posts_tow_post[] = $row;
}
//Post 6 bài viết mới nhất
$query_recent_post =  "SELECT p.*,c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE status= 1 ORDER BY created_at DESC limit 2,6";

$result_recent_post = $conn->query($query_recent_post);

$posts_recent_post = array();

while ($row = $result_recent_post->fetch_assoc()) {
	$posts_recent_post[] = $row;
}

//Post các bài viết tiếp theo
$query_post =  "SELECT p.*,c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE status= 1 ORDER BY created_at DESC limit 8,10 ";

$result_post = $conn->query($query_post);

$posts_post = array();

while ($row = $result_post->fetch_assoc()) {
	$posts_post[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>DXD BLOG </title>

	<!-- Google font -->


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
<?php require_once('MainNav.php') ?>
<!-- /Header -->
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<?php foreach ($posts_tow_post as $post) { ?>
			<div class="row">
				<div class="col-md-6">
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.php?id=<?= $post['id'] ?>"><img src="./img/<?= $post['thumbnail']; ?>" alt="" height="345px"></a>
						<div class="post-body">
							<div class="post-meta">
								<?php
								$kt = NULL;
								$i = 1;
								foreach ($categorie_post as $cate) {
									if (strcasecmp($post['des'], $cate['descripition']) == 0) {
										$kt = 'post-category cat-' . $i;
									}
									if (strcasecmp($post['des'], $cate['descripition']) == 0) {
										$kt = 'post-category cat-' . $i;
									}
									if (strcasecmp($post['des'], $cate['descripition']) == 0) {
										$kt = 'post-category cat-' . $i;
									}
									if (strcasecmp($post['des'], $cate['descripition']) == 0) {
										$kt = 'post-category cat-' . $i;
									}
									$i++;
									if ($i == 5)
										$i = 1;
								}
								?>
								<a class="<?php echo $kt; ?>" href="category.php?id=<?= $post['idcate'] ?>&cate=<?= $post['t'] ?>"><?php echo $post['t']; ?></a>
								<span class="post-date"><?php echo $post['created_at']; ?></span>
							</div>
							<h3 class="post-title"><a href="blog-post.php?id=<?= $post['id'] ?>"><?php echo $post['title']; ?></a></h3>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Bài viết mới nhất </h2>
					</div>
				</div>

				<?php
				foreach ($posts_recent_post as $post) {
				?>
					<!-- post  6 bài đầu -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.php?id=<?= $post['id'] ?>"><img src="./img/<?= $post['thumbnail']; ?>" alt="" height="207"></a>
							<div class="post-body">
								<div class="post-meta">
									<?php
									$kt = NULL;
									$i = 1;
									foreach ($categorie_post as $cate) {
										if (strcasecmp($post['des'], $cate['descripition']) == 0) {
											$kt = 'post-category cat-' . $i;
										}
										if (strcasecmp($post['des'], $cate['descripition']) == 0) {
											$kt = 'post-category cat-' . $i;
										}
										if (strcasecmp($post['des'], $cate['descripition']) == 0) {
											$kt = 'post-category cat-' . $i;
										}
										if (strcasecmp($post['des'], $cate['descripition']) == 0) {
											$kt = 'post-category cat-' . $i;
										}
										$i++;
										if ($i == 5)
											$i = 1;
									}
									?>
									<a class="<?= $kt; ?>" href="category.php?id=<?= $post['idcate'] ?>&cate=<?= $post['t'] ?>"><?= $post['t']; ?></a>
									<span class="post-date"><?= $post['created_at']; ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?= $post['id'] ?>"><?= $post['title']; ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
				<?php } ?>
				<!-- post -->

				<!-- /row -->
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<!-- post 1 bài tiếp theo -->
							<div class="col-md-12">
								<div class="post">
									<a class="post-img" href="blog-post.php?id=<?= $posts_post["0"]['id'] ?>"><img src="./img/<?= $posts_post["0"]["thumbnail"]; ?>" alt="" height="600px"></a>
									<div class="post-body">
										<div class="post-meta">
											<?php
											$kt = NULL;
											$i = 1;
											foreach ($categorie_post as $cate) {
												if (strcasecmp($posts_post["0"]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $i;
												}
												if (strcasecmp($posts_post["0"]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $i;
												}
												if (strcasecmp($posts_post["0"]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $i;
												}
												if (strcasecmp($posts_post["0"]['des'], $cate['descripition']) == 0) {
													$kt = 'post-category cat-' . $i;
												}
												$i++;
												if ($i == 5)
													$i = 1;
											}
											?>
											<a class="<?php echo $kt; ?>" href="category.php?id=<?= $posts_post["0"]['idcate'] ?>&cate=<?= $posts_post["0"]['t'] ?>"><?php echo $posts_post["0"]['t']; ?></a>
											<span class="post-date"><?php echo $posts_post[$i]['created_at']; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?= $posts_post["0"]['id'] ?>"><?php echo $posts_post["0"]['title']; ?></a></h3>
									</div>
								</div>
							</div>
							<!-- post  6 bài liên tục-->
							<?php for ($i = 1; $i < 7; $i++) { ?>
								<div class="col-md-6">
									<div class="post">
										<a class="post-img" href="blog-post.php?id=<?= $posts_post[$i]['id'] ?>"><img src="./img/<?= $posts_post[$i]['thumbnail']; ?>" alt="" height="225px"></a>
										<div class="post-body">
											<div class="post-meta">
												<?php
												$kt = NULL;
												$a = 1;
												foreach ($categorie_post as $cate) {
													if (strcasecmp($posts_post[$i]['des'], $cate['descripition']) == 0) {
														$kt = 'post-category cat-' . $a;
													}
													if (strcasecmp($posts_post[$i]['des'], $cate['descripition']) == 0) {
														$kt = 'post-category cat-' . $a;
													}
													if (strcasecmp($posts_post[$i]['des'], $cate['descripition']) == 0) {
														$kt = 'post-category cat-' . $a;
													}
													if (strcasecmp($posts_post[$i]['des'], $cate['descripition']) == 0) {
														$kt = 'post-category cat-' . $a;
													}
													$a++;
													if ($a == 5)
														$a = 1;
												}
												?>
												<a class="<?php echo $kt; ?>" href="category.php?id=<?= $posts_post[$i]['idcate'] ?>&cate=<?= $posts_post[$i]['t'] ?>"><?php echo $posts_post[$i]['t']; ?></a>
												<span class="post-date"><?php echo $posts_post[$i]['created_at']; ?></span>
											</div>
											<h3 class="post-title"><a href="blog-post.php?id=<?= $posts_post[$i]['id'] ?>"><?php echo $posts_post[$i]['title']; ?></a></h3>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>

					<div class="col-md-4">
						<!-- post widget -->

						<?php require_once('right_index.php') ?>

						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Bài viết nổi bật</h2>
					</div>
				</div>

				<!-- post -->
				<?php for ($i = 7; $i < 10; $i++) { ?>
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.php?id=<?= $posts_post[$i]['id'] ?>"><img src="./img/<?= $posts_post[$i]['thumbnail']; ?>" alt="" height="225px"></a>
							<div class="post-body">
								<div class="post-meta">
									<?php
									$kt = NULL;
									$a = 1;
									foreach ($categorie_post as $cate) {
										if (strcasecmp($posts_post[$i]['des'], $cate['descripition']) == 0) {
											$kt = 'post-category cat-' . $a;
										}
										if (strcasecmp($posts_post[$i]['des'], $cate['descripition']) == 0) {
											$kt = 'post-category cat-' . $a;
										}
										if (strcasecmp($posts_post[$i]['des'], $cate['descripition']) == 0) {
											$kt = 'post-category cat-' . $a;
										}
										if (strcasecmp($posts_post[$i]['des'], $cate['descripition']) == 0) {
											$kt = 'post-category cat-' . $a;
										}
										$a++;
										if ($a == 5)
											$a = 1;
									}
									?>
									<a class="<?php echo $kt; ?>" href="category.php?id=<?= $posts_post[$i]['idcate'] ?>&cate=<?= $posts_post[$i]['t'] ?>"><?php echo $posts_post[$i]['t']; ?></a>
									<span class="post-date"><?php echo $posts_post[$i]['created_at']; ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?= $posts_post[$i]['id'] ?>"><?php echo $posts_post[$i]['title']; ?></a></h3>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<!-- /post -->

		</div>
		<?php
		function select()
		{
			echo "The select function is called.";
		}
		?>
		<!-- /row -->
		<div class="section-row">
			<button class="primary-button center-block" onclick="">Load More</button>
		</div>

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