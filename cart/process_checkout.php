<?php
    session_start();

    if(empty($_SESSION['cart'])) {
        header('location:./index.php');
        exit;
    }

    require '../admin/root/connect.php';

    $name_receiver = $_POST['name_receiver'];
    $phone_number_receiver = $_POST['phone_number_receiver'];
    $address_receiver = $_POST['address_receiver'];
    $note_receiver = $_POST['note_receiver'];
    $shipping_method = $_POST['shipping_method'];
    $payment_method = $_POST['payment_method'];

    // echo $name_receiver . $phone_number_receiver . $shipping_method . $payment_method;
    // die;

    $cart = $_SESSION['cart'];
    $total_price = 0;
    foreach($cart as $each) {
        $total_price += $each['quantity'] * $each['price'];
    }

    $customer_id = $_SESSION['customer_id'];
    $status_id = 1;

    $sql = "insert into orders(customer_id, name_receiver, phone_number_receiver, address_receiver, status_id, total_price, payment_method, shipping_method) 
            values('$customer_id', '$name_receiver', '$phone_number_receiver', '$address_receiver', '$status_id', '$total_price', '$payment_method', '$shipping_method')";
    
    mysqli_query($connect, $sql);

    $order_id = mysqli_insert_id($connect);

    foreach($cart as $each) {
        $quantity = $each['quantity'];
        $product_id = $each['product_id'];
        $sql = "insert into order_product(order_id, product_id, quantity)
                value('$order_id','$product_id' , '$quantity')";
        mysqli_query($connect, $sql);
    }


    unset($_SESSION['cart']);
    // header('location:./checkout_success.php');
