<?php

    session_start();
    
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: login.php');
    }
    require_once('../connection.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT a.id, a.name from authors  as a WHERE a.email = '".$email."' AND a.password = '".md5($password)."' AND a.status = 1 ";
    $author = $conn->query($query)->fetch_assoc();

    if ($author !== NULL) {
        $_SESSION['isLogin'] = true;
        $_SESSION['author'] = $author;
        header('Location: index.php');
    }else {
        setcookie('msg','Đăng nhập không thành công',time()+5);
        header('Location: login.php');
    }
?>