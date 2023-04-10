<?php
    session_start();

    unset($_SESSION['customer_name']);
    unset($_SESSION['customer_id']);
    setcookie('remember', '', -1);

    header('location:../home/index.php');

