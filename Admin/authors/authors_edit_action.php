<?php
    session_start();
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: ../login.php');
    }
    require_once('../../connection.php');
    
    $id = $_POST['id'];
    var_dump($id);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $level = $_POST['level'];
    $query = "UPDATE authors SET name = '".$name."', email = '".$email."', password = '".$password."', status = '".$status."' ,facebook = '".$facebook."', instagram = '".$instagram."', level = '".$level."'   WHERE id = ".$id;
    $status = $conn->query($query);
    
    if ($status== true) {
        setcookie('msg','Thêm mới thành công',time()+5);
        header('Location: index.php');
    }else {
        setcookie('msg','Thêm vào không thành công',time()+5);
        header('Location: authors_edit.php?id='.$id);
    }
?>