<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assest/css/grid.css">
    <link rel="stylesheet" href="../assest/css/main.css">
    <link rel="stylesheet" href="../assest/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <?php require '../pages/header.php' ?>
        <div class="container">
            <div class="grid wide">
                <div class="row">
                    <div class="customer-login">
                        <h2 class="customer-login-title text-center">Quên mật khẩu</h2>
                        <form action="./process_forgot_password.php" class="customer-login-form" method="post">
                            <label class="customer-login-label">
                                <span>Email</span>
                                <span><?php 
                                    if (isset($_SESSION['success_forgot_password'])) {
                                        echo $_SESSION['success_forgot_password'];
                                        unset($_SESSION['success_forgot_password']);
                                    }
                                    if (isset($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                ?></span>
                                <span class="error-name-form">
                                    <?php
                                    if (isset($_SESSION['error_email_exist'])) {
                                        echo $_SESSION['error_email_exist'];
                                        unset($_SESSION['error_email_exist']);
                                    }
                                    if (isset($_SESSION['error_email'])) {
                                        echo $_SESSION['error_email'];
                                        unset($_SESSION['error_email']);
                                    }
                                    if (isset($_SESSION['empty_value'])) {
                                        echo $_SESSION['empty_value'];
                                        unset($_SESSION['empty_value']);
                                    }
                                    ?>
                                </span>
                                <input class="customer-login-input" type="email" name="email">
                            </label>
                            <button class="customer-login-btn">Lấy lại mật khẩu</button>
                        </form>
                        <div class="customer-login-wrap">
                            <a class="customer-login-forgot" href="./index.php">Đăng nhập</a>
                            <a class="customer-login-signup" href="../sign-up/index.php">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require '../pages/footer.php' ?>
    </div>
    <?php
        if(isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>
    <form action="./process_forgot_password.php" method="post">
        <label>
            <span>Email: </span>
            <input type="text" name="email">
        </label>
        <button>Quên mật khẩu</button>
    </form>
</body>
</html>