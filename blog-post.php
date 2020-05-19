<?php
session_start();
require_once('connection.php');
//lấy id của bài viết
$idblog = $_GET['id'];
//đếm view
//Lấy ngày cuối cùng cập nhât
//$query_created = "SELECT created_at FROM posts WHERE id = '$idblog'";

//$result_created = $conn->query($query_created);

//$date = $result_created->fetch_assoc();

//đếm
$query_post = "SELECT * FROM posts WHERE id = '$idblog'";
$resuft = mysqli_query($conn,$query_post);
if($resuft->num_rows != 0){
	$updateview = "UPDATE posts SET count_view = count_view + 1  WHERE id ='$idblog'";
	mysqli_query($conn,$updateview);
}

//Select bài viết từ cơ sở dữ liệu
$query_post_title =  "SELECT p.*, c.id as idcate, c.tible as t  , c.descripition as des, a.name as n FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id LEFT JOIN authors AS a  ON p.author_id = a.id WHERE p.status= 1 AND p.id = " . $idblog;

$result_post = $conn->query($query_post_title);

$post_title = $result_post->fetch_assoc();

//Select các bài viết liên quan
$query_post_MostR =  "SELECT p.*, c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id  WHERE p.status= 1 AND c.id = " . $post_title['idcate'] . " ORDER BY created_at DESC LIMIT 4 ";

$result_post_MostR = $conn->query($query_post_MostR);

$post_MostR = array();
while ($row = $result_post_MostR->fetch_assoc()) {
	$post_MostR[] = $row;
}
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
	<?php require_once('MainNav.php'); ?>
	<!-- Page Header -->
	<div id="post-header" class="page-header">
		<div class="background-img" style="background-image: url('./img/<?=$post_title['thumbnail']?>');"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="post-meta">
						<a class="post-category cat-<?= $post_title['idcate'] ?>" href="category.php?id=<?= $post_title['idcate'] ?>&cate=<?= $post_title['t'] ?>"><?= $post_title['t'] ?></a>
						<span class="post-date"><?=$post_title['created_at'] ?></span>
					</div>
					<h1><?=$post_title['title'] ?></h1>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- Post content -->
				<div class="col-md-8">
					<div class="section-row sticky-container">
						<div class="main-post">
							<h3><?php echo $post_title['title'] ?></h3>
							<p><i><?php echo $post_title['description'] ?></i></p>
							<figure class="figure-img">
								<img class="img-responsive" src="./img/<?= $post_title['thumbnail'] ?>" alt="" height="750px" width="450px">
							</figure>
							<p><?php echo $post_title['contents'] ?></p>
							<p><strong>Đăng bởi: <?php echo $post_title['n'] ?></strong></p>
						</div>
						<div class="post-shares sticky-shares">
							<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
							<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
							<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
							<a href="#"><i class="fa fa-envelope"></i></a>
						</div>
					</div>

					<!-- ad -->
					<div class="section-row text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-2.jpg" alt="">
						</a>
					</div>
					<!-- ad -->

					<!-- author -->
					<div class="section-row">
						<div class="post-author">
							<div class="media">
								<div class="media-left">
									<img class="media-object" src="./img/author.png" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h3>John Doe</h3>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<ul class="author-social">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /author -->

					<!-- comments -->
					<div class="section-row">
						<div class="post-comments">
							<!-- comment -->
							
							<div class="fb-comments" data-href="https://dxdbloger.000webhostapp.com/blog-post.php?id=<?=$idblog?>" data-numposts="5" data-width=""></div>
							<!-- /comment -->
						</div>
					</div>
					<!-- /comments -->

					<!-- reply -->
					<div class="section-row">
						<div class="section-title">
							<h2>Leave a reply</h2>
							<p>your email address will not be published. required fields are marked *</p>
						</div>
						<form class="post-reply">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<span>Name *</span>
										<input class="input" type="text" name="name">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<span>Email *</span>
										<input class="input" type="email" name="email">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<span>Website</span>
										<input class="input" type="text" name="website">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="input" name="message" placeholder="Message"></textarea>
									</div>
									<button class="primary-button">Submit</button>
								</div>
							</div>
						</form>
					</div>
					<!-- /reply -->
				</div>
				<!-- /Post content -->

				<!-- aside -->
				<div class="col-md-4">

					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Bài viết liên quan</h2>
						</div>
						<?php foreach ($post_MostR as $most) { ?>
							<div class="post post-widget">
								<a class="post-img" href="blog-post.php?id=<?= $most['id'] ?>"><img src=./img/<?= $most['thumbnail']; ?> alt="" width="90px" height="90px"></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?= $most['id'] ?>"><?php echo $most['title'] ?></a></h3>
								</div>
							</div>
						<?php } ?>
						<!-- /post widget -->

						<?php require_once('right_index.php') ?>
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- Footer -->
		<?php  require_once('footer.php')?>
		<!-- /Footer -->
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2652621865018691&autoLogAppEvents=1"></script>
		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

</body>

</html>