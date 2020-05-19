<?php
    session_start();
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: ../login.php');
    }
	//Liên kết tới file Connection
    require_once('../../connection.php');
    //lấy  danh mục theo id
    $id = $_GET['id'];
	$query_delete=  "DELETE from posts where id=".$id."";

	$status = $conn->query($query_delete);  
    
    if ($status== true) {
        setcookie('msg','Xóa thành công',time()+5);
    }else {
        setcookie('msg','Xóa không thành công',time()+5);
    }
    header('Location: index.php');
?>