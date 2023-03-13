<?php
    session_start();
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_level']);

    header('location:./lgoin.php');