<?php
    require '../check_admin_login.php';
    
    $product_id = $_POST['product_id'];
    $image = $_FILES['image'];
    
    require '../root/connect.php';
    $folder = 'sub_img/';
    
    for($i = 0; $i < count($image['name']); $i++){
        if($image['size'][$i] > 0) {
            $file_extention = explode('.',$image['name'][$i])[1];
            $file_name = time() . $i . '.' . $file_extention;
            $path_file = $folder . $file_name;

            move_uploaded_file($image['tmp_name'][$i], $path_file);
            $sql = "update product_sub_images
                    set
                        source = '$file_name'
                    where
                        product_id = '$product_id'";
            mysqli_query($connect, $sql);
        }else {
            header("location:./form_product_detail.php?id=$product_id");
            $_SESSION['error'] = "Cập nhật ảnh không thành công";
            exit;
        }
    }


    $error = mysqli_error($connect);
    if(empty($error)){
        // header('location:./index.php');
        exit;
    } else {
        // header('location:form_product_detail.php?error=2');
        exit;
    }