<?php
    session_start();

    $id = $_POST['id'];
    $size_id = $_POST['size_id'];

    require '../admin/root/connect.php';

    
    if(empty($_SESSION['cart'][$id])) {
        $sql = "select * from products where id = '$id'";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
        
        $_SESSION['cart'][$id]['name'] = $each['name'];
        $_SESSION['cart'][$id]['price'] = $each['price'];
        $_SESSION['cart'][$id]['image'] = $each['image'];
        $_SESSION['cart'][$id]['size'] = $size_id;
        $_SESSION['cart'][$id]['quantity'] = 1;
    } else {
        $_SESSION['cart'][$id]['quantity']++;
    }

    // echo json_encode($_SESSION['cart']);
    header('location:./index.php');
    exit;
