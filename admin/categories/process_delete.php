<?php
    require '../check_super_admin_login.php';

    if(!isset($_GET['id'])){
        header('location:./index.php?error=Không tồn tại id');
    }
    $id = $_GET['id'];
    require '../root/connect.php';
    $sql = "select id from categories where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    if($num_row !== 1) {
        $_SESSION['error'] = 'Xoá không thành công!';
        header('location:./index.php');
        exit;
    }
    $sql = "delete from categories where id = '$id'";
    mysqli_query($connect, $sql);
    $_SESSION['success'] = 'Xoá danh mục sản phẩm thành công';
    header('location:./index.php');
    exit;
