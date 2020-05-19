<?php
    session_start();
    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: login.php');
    }

    if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin']!= true){
        header('Location: login.php');
    }
    session_destroy();
    header('location: login.php');
?>