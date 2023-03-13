<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    require '../root/connect.php';

    $sql = "select * from admin where email = '$email' and password = '$password'";
    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) == 1) {
        $each = mysqli_fetch_array($result);

        $_SESSION['admin_id'] = $each['id'];
        $_SESSION['admin_name'] = $each['name'];
        $_SESSION['admin_level'] = $each['level'];

        header('location:../root/index.php');
        exit;
    }
    $_SESSION['error'] = "Đăng nhập không thành công";
    header('location:./index.php');
    exit;