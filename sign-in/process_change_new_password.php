<?php
    $token = $_POST['token'];
    $password = $_POST['password'];

    require '../admin/root/connect.php';
    $sql = "select customer_id from forgot_password where token = '$token'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) === 0) {
        header('location:../home/index.php');
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
