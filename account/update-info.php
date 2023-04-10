<?php
    session_start();

    if(isset($_SESSION['customer_id'])) {
        $customer_id = $_SESSION['customer_id'];
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $phone_number = $_POST['phone_number'];

        if(empty($name) || empty($phone_number)) {
            $_SESSION['empty_value'] = '(*) Thông tin không được để trống';
            header('location:./index.php?view=info');
            exit;
        }

        
        $regex_name = '/^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*)*$/';
        $regex_phone_number = '/^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/';

        if(!preg_match($regex_name, $name)) {
            $_SESSION['error_name'] = '(*) Họ tên không hợp lệ vui lòng thử lại.';
            header('location:./index.php?view=info');
            exit;
        }
        if(!preg_match($regex_phone_number, $phone_number)) {
            $_SESSION['error_phone_number'] = '(*) Số điện thoại không hợp lệ vui lòng thử lại.';
            header('location:./index.php?view=info');
            exit;
        }
        require '../admin/root/connect.php';
        $sql = "update customers
                set
                    name = '$name',
                    birthday = '$birthday',
                    phone_number = '$phone_number'
                where
                    id = '$customer_id'";
        mysqli_query($connect, $sql);
        header('location:./index.php?view=info');
    } else {
        header('location:../sign-in.php');
        $_SESSION['error'] = "Bạn cầm phải đăng nhập trước!";
        exit;
    }