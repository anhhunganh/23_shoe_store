<?php 
    session_start();

    $id = $_GET['id'];
    $type = $_GET['type'];

    if($type === 'decrease') {
        if($_SESSION['cart'][$id]['quantity'] > 1 ) {
            $_SESSION['cart'][$id]['quantity']--;
            header("location:../cart/");
            exit;
        } else {
            unset($_SESSION['cart'][$id]);
            header("location:../cart/");
            exit;
        }
    } else {
        $_SESSION['cart'][$id]['quantity']++;
        header("location:../cart/"); 
    }
