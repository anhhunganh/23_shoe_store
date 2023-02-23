<?php
    require '../check_super_admin_login.php';

    if(!isset($_GET['id'])){
        header('location:./index.php?error=Không tồn tại id');
    }
    $id = $_GET['id'];
    require '../root/connect.php';
    $sql = "select id from style where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    if($num_row !== 1) {
        $_SESSION['error'] = 'Xoá không thành công!';
        header('location:./index.php');
        exit;
    }
    $sql = "delete from style where id = '$id'";
    mysqli_query($connect, $sql);
    $_SESSION['success'] = 'Xoá kiểu dáng sản phẩm thành công';
    header('location:./index.php');
    exit;
