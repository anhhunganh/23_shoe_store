<?php
    require '../check_admin_login.php';
    
    $product_id = $_POST['product_id'];
    $color = $_POST['color'];
    $material = $_POST['material'];
    $elastic_gusset = $_POST['elastic_gusset'];
    $height_heel = $_POST['height_heel'];
    $logo_signature = $_POST['logo_signature'];
    $shoe_structure = $_POST['shoe_structure'];

    require '../root/connect.php';

    $sql = "insert into product_details(product_id, color, material, elastic_gusset, height_heel, logo_signature, shoe_structure)
            values('$product_id', '$color', '$material', '$elastic_gusset', '$height_heel', '$logo_signature', '$shoe_structure')";

    mysqli_query($connect, $sql);

    $error = mysqli_error($connect);
    if(empty($error)){
        header('location:./index.php');
        exit;
    } else {
        header('location:form_product_detail.php?error=2');
        exit;
    }