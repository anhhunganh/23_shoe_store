<?php
session_start();
require '../admin/root/connect.php';
if (isset($_COOKIE['remember'])) {
    $token = $_COOKIE['remember'];
    $sql = "select * from customers where token = '$token' limit 1";
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    if ($num_row === 1) {
        $each = mysqli_fetch_array($result);
        $_SESSION['customer_id'] = $each['id'];
        $_SESSION['customer_name'] = $each['name'];
    }
}

if (isset($_SESSION['customer_id'])) {
}
?>

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
    <title>Đăng nhập</title>
</head>

<body>
    <div class="main">
        <?php require '../pages/header.php' ?>
        <div class="container">
            <div class="grid wide">
                <div class="row">
                    <div class="customer-login">
                        <h2 class="customer-login-title text-center">Đăng nhập</h2>

                        <span class="error-name-form">
                            <?php
                            if (isset($_SESSION['error_login'])) {
                                echo $_SESSION['error_login'];
                                unset($_SESSION['error_login']);
                            }
                            ?>
                        </span>
                        <form action="./process_signin.php" method="post" class="customer-login-form">
                            <label class="customer-login-label">
                                <span>Email</span>
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
                                    }
                                    ?>
                                </span>
                                <input class="customer-login-input" type="email" name="email">
                            </label>
                            <label class="customer-login-label">
                                <span>Mật khẩu</span>
                                <span class="error-name-form">
                                    <?php
                                    if (isset($_SESSION['empty_value'])) {
                                        echo $_SESSION['empty_value'];
                                        unset($_SESSION['empty_value']);
                                    }
                                    if (isset($_SESSION['error_password'])) {
                                        echo $_SESSION['error_password'];
                                        unset($_SESSION['error_password']);
                                    }
                                    ?>
                                </span>
                                <input class="customer-login-input" type="password" name="password">
                            </label>
                            <label style="margin-top: 12px">
                                <span class="span-remember">Ghi nhớ đăng nhập </span>
                                <input type="checkbox" name="remember" id="">
                            </label>
                            <button class="customer-login-btn">Đăng nhập</button>
                        </form>
                        <div class="customer-login-wrap">
                            <a class="customer-login-forgot" href="./forgot_password.php">Quên mật khẩu?</a>
                            <a class="customer-login-signup" href="../sign-up/index.php">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require '../pages/footer.php' ?>
    </div>
</body>
<script></script>

</html>