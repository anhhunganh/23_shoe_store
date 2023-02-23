<?php
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    require '../admin/root/connect.php';

    if(isset($_POST['remember'])){
        $remember = true;
    } else {
        $remember = false;
    }

    $sql = "select * from customers where email = '$email' and password = '$password'";
    
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);

    if($num_row === 1) {
        $each = mysqli_fetch_array($result);
        $id = $each['id'];
        $_SESSION['customer_id'] = $id;
        $_SESSION['customer_name'] = $each['name'];

        if($remember) {
            $token = uniqid('customer_', true) . time();
            setcookie('remember', $token, time() + (86400 * 30));
            $sql = "update customers set token = '$token' where id = '$id'";
            mysqli_query($connect, $sql);
        }
        header('location:../account/');
        exit;
    }
        $_SESSION['error'] = 'Đăng nhập kkhoong thành ccoong';
        header('location:./index.php');
        exit;