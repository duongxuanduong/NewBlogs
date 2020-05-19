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
	    $thumbnail = "',thumbnail='".basename( $_FILES["thumbnail"]["name"]);
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $contents = $_POST['contents'];
    $author_id =  $_SESSION['author']['id'];;
    $categories_id= $_POST['categories_id'];

    $status =0;
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    }
    //chú ý
    $query = "UPDATE posts  SET title = '".$title."', description = '".$description."' ,contents = '".$contents.$thumbnail."',author_id=".$author_id.", categories_id = ".$categories_id.", status = ".$status." WHERE id = '".$id."'";
    
    $status_p = $conn->query($query);
    if ($status_p == true) {
        setcookie('msg','Sửa thành công',time()+5);
        header('Location: index.php');
    }else {
        setcookie('msg','Sửa không thành công',time()+5);
        header('Location: posts_edit.php?id='.$id);
    }
?>