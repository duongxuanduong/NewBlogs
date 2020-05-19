<?php
    session_start();
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: ../login.php');
    }
    require_once('../../connection.php');

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];;
    $query = "UPDATE categories  SET tible = '".$title."', descripition= '".$description." 'WHERE id = ".$id;
    $status = $conn->query($query);
    if ($status== true) {
        setcookie('msg','Sửa mới thành công',time()+5);
        header('Location: index.php');
    }else {
        setcookie('msg','Sửa không thành công',time()+5);
        header('Location: category_edit.php?id='.$id);
    }
?>