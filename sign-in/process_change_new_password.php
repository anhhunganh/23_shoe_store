<?php
    session_start();

    $token = addslashes($_POST['token']);
    $password = addslashes($_POST['password']);

    require '../admin/root/connect.php';
    $sql = "select customer_id from forgot_password where token = '$token'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) == 0) {
        // header('location:../home/index.php');
        // exit;
    }

    if(empty($password)) {
        $_SESSION['empty_value'] = '(*) Thông tin không được để trống';
        header('location:./change_new_password.php?token=' . $token);
        exit;
    }

    $regex_password = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
    if(!preg_match($regex_password, $password)) {
        $_SESSION['error_password'] = '(*) Mật khẩu ít nhất 8 ký tự chứa 1 số 1 chữ cái.';
        header('location:./change_new_password.php?token=' . $token);
        exit;
    }


    $customer_id = mysqli_fetch_array($result)['customer_id'];
    $sql = "update customers
            set
                password = '$password'
            where
                customers.id = '$customer_id'";
    mysqli_query($connect, $sql);

    $sql = "delete from forgot_password where customer_id = '$customer_id' and token = '$token'";
    mysqli_query($connect, $sql);

    header('location:./index.php');
    exit;
