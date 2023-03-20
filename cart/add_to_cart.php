<?php
    session_start();

    $id = $_POST['id'];

    if(!isset($_POST['size'])){
        $_SESSION['error'] = "Size chưa được chọn";
        header("location:../collection/product_detail.php?id=$id");
        exit;
    }
    $size = $_POST['size'];

    require '../admin/root/connect.php';

    
    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    if(empty($_SESSION['cart'][$id . $size])) {
        
        $_SESSION['cart'][$id . $size]['name'] = $each['name'];
        $_SESSION['cart'][$id . $size]['id'] = $each['id'];
        $_SESSION['cart'][$id . $size]['price'] = $each['price'];
        $_SESSION['cart'][$id . $size]['image'] = $each['image'];
        $_SESSION['cart'][$id . $size]['size'] = $size;
        $_SESSION['cart'][$id . $size]['quantity'] = 1;
    } else {
        if($_SESSION['cart'][$id . $size]['size'] == $size) {
            $_SESSION['cart'][$id . $size]['quantity']++;
        }
    }

    // echo json_encode($_SESSION['cart']);
    header('location:./index.php');
    exit;
