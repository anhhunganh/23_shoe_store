<?php
    session_start();

    if(!isset($_SESSION['admin_level'])) {
        header('location:../index.php');
    }