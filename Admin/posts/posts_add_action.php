<?php
    session_start();
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: ../login.php');
    }
    require_once('../../connection.php');

    
    $target_dir = "../../img/";  // thư mục chứa file upload
	$thumbnail="";

	$target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên

	$status_upload = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

	if ($status_upload) { // nếu upload file không có lỗi 
	    $thumbnail = basename( $_FILES["thumbnail"]["name"]);
	}

    $title = $_POST['title'];
    $description = $_POST['description'];
    $contents = $_POST['contents'];
    $author_id = $_SESSION['author']['id'];
    $categories_id= $_POST['categories_id'];

    $status =0;
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $created_at =  date('Y-m-d H:i:s'); 

    $query = "INSERT INTO posts(title,description,contents,thumbnail,author_id, categories_id, status, created_at,count_view) VALUES ('".$title."','".$description."','".$contents."','".$thumbnail."',".$author_id.",".$categories_id.",".$status.",'".$created_at."',0);";

    $status = $conn->query($query);
    // var_dump($query);
    // die;
    if ($status== true) {
        setcookie('msg','Thêm mới thành công',time()+5);
        header('Location: index.php');
    }else {
        setcookie('msg','Thêm vào không thành công',time()+5);
        header('Location: posts_add.php');
    }
?>