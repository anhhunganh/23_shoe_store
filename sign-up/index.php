<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Đăng ký</title>
</head>
<body>
    <?php 
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>
    <form action="./process_signup.php" method="post">
        <label>
            <span>Họ tên</span>
            <input type="text" name="name">
        </label><br>
        <label>
            <span>Số điện thoại: </span>
            <input type="text" name="phone_number">
        </label><br>
        <label>
            <span>Email</span>
            <input type="text" name="email">
        </label><br>
        <label>
            <span>Password</span>
            <input type="password" name="password">
        </label><br>
        <label>
            <span>Address</span>
            <input type="text" name="address">
        </label><br>
        <button>Đăng ký</button>
    </form>
</body>
</html>