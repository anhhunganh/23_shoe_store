<?php
    session_start();
    // echo json_encode(array_values($_SESSION['cart']));
    // die;

    try {
        if(empty($_POST['id'])){
            throw new Exception("Khong ton tai id", 1);
        }
        $id = $_POST['id'];
        unset($_SESSION['cart'][$id]);
        // header('location:./index.php');
        echo 1;
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
    