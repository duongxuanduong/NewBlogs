<?php
    session_start();
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: ../login.php');
    }
    require_once('../../connection.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $level = $_POST['level'];
    $query = "INSERT INTO authors(name,email,password,status,facebook,instagram,level) VALUES ('".$name."','".$email."','".$password."','".$status."','".$facebook."','".$instagram."','".$level."');";
  
    $status = $conn->query($query);
    
    if ($status== true) {
        setcookie('msg','Thêm mới thành công',time()+5);
        header('Location: index.php');
    }else {
        setcookie('msg','Thêm vào không thành công',time()+5);
        header('Location: authors_add.php');
    }
?>