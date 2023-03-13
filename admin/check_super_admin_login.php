<?php
    session_start();

    if(!isset($_SESSION['admin_level']) || $_SESSION['admin_level'] != 1) {
        $_SESSION['error'] = "Bạn cần đăng nhập với tư cách Super Admin";
        header('location:../account/login.php');
        exit;
    }

