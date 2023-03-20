<?php
    require '../check_admin_login.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    // $email = $_POST['email'];
    // $address = $_POST['address'];
    $image = $_FILES['image'];

    require '../root/connect.php';

    if ($image['size'] > 0) {
        $folder = 'img/';
        $file_extension = explode('.', $image['name'])[1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name;

        move_uploaded_file($image['tmp_name'], $path_file);
    } else {
        $file_name = $_POST['image_old'];
    }
    $sql = "update manufacturers
                    set
                        name = '$name',
                        image = '$file_name'
                    where
                        id = '$id'";
                        // die($sql);
    mysqli_query($connect, $sql);
    header('location:./index.php');
    exit;

    mysqli_close($connect);
    