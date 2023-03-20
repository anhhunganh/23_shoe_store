<?php
    session_start();

    if(!isset($_SESSION['admin_level'])) {
        $_SESSION['error'] = "Bạn chưa đăng nhập!";
        header('location:../account/login.php');
        exit;
    }