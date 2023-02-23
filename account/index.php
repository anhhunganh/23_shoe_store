<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Thông tin tài khoản</title>
</head>
<body>
    <div class="main">
        <?php require '../pages/header.php' ?>
    </div>
    <h1 style="margin-top: 112px;">
    <?php 
        if(isset($_SESSION['customer_id'])) { 
             echo $_SESSION['customer_name']; ?>
             <a href="../sign-in/process_signout.php">đăng xuất</a>
        <?php } else { ?>
            <a href="../sign-in/index.php">Đăng nhập</a>
            <br>
            <a href="../sign-up/">Đăng ký</a>
        <?php } ?>
    </h1>
</body>
</html>