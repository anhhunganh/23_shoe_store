<?php 
    session_start();
    if(!isset($_SESSION['admin_level'])) {
        header('location:../index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../root/style.css">
    <title>Thông tin tài khoản</title>
</head>
<body>
    <div class="main">
    <?php
        require '../root/menu.php'
    ?>
        <div class="container">
            <?php require '../root/header.php' ?>
            <?=$_SESSION['admin_name'] ?>
        </div>
    </div>
</body>
</html>