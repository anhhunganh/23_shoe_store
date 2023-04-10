<?php
    session_start();

    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    require '../admin/root/connect.php';

    if(empty($email) || empty($password)) {
        $_SESSION['empty_value'] = '(*) Thông tin không được để trống';
        header('location:./index.php');
        exit;
    }

    $regex_email = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    $regex_password = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

    if(!preg_match($regex_email, $email)) {
        $_SESSION['error_email'] = '(*) Email không hợp lê vui lòng thử lại.';
        header('location:./index.php');
        exit;
    }

    if(!preg_match($regex_password, $password)) {
        $_SESSION['error_password'] = '(*) Mật khẩu ít nhất 8 ký tự chứa 1 số 1 chữ cái.';
        header('location:./index.php');
        exit;
    }

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
        header('location:../account/index.php?view=main');
        exit;
    }
        $_SESSION['error_login'] = 'Đăng nhập không thành công!!!';
        header('location:./index.php');
        exit;