<?php
    session_start();

    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $address = addslashes($_POST['address']);
    $phone_number = addslashes($_POST['phone_number']);

    require '../admin/root/connect.php';

    if(empty($name) || empty($email) || empty($password) || empty($phone_number)) {
        $_SESSION['empty_value'] = '(*) Thông tin không được để trống';
        header('location:./index.php');
        exit;
    }

    $regex_name = '/^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*)*$/';
    $regex_email = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    $regex_password = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
    $regex_phone_number = '/^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/';

    if(!preg_match($regex_name, $name)) {
        $_SESSION['error_name'] = '(*) Họ tên không hợp lệ vui lòng thử lại.';
        header('location:./index.php');
        exit;
    }

    if(!preg_match($regex_phone_number, $phone_number)) {
        $_SESSION['error_phone_number'] = '(*) Số điện thoại không hợp lệ vui lòng thử lại.';
        header('location:./index.php');
        exit;
    }

    if(!preg_match($regex_email, $email)) {
        $_SESSION['error_email'] = '(*) Email không hợp lê vui lòng thử lại.';
        header('location:./index.php');
        exit;
    }

    if(!preg_match($regex_password, $password)) {
        $_SESSION['error_password'] = '(*) Mật khẩu ít nhất 8 ký tự chứa 1 số 1 chữ cái.';
        header('location:./index.php');
        exit;
    }

    
    $sql = "select count(*) from customers where email = '$email'";
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_fetch_array($result)['count(*)'];

    if($num_row == 1) {
        $_SESSION['error_email_exist'] = '(*) Email đã tồn tại.';
        header('location:./index.php');
        exit;
    }

    $sql = "insert into customers(name, email, password, address, phone_number)
            values('$name', '$email', '$password', '$address', '$phone_number')";

    mysqli_query($connect, $sql);

    $id = mysqli_insert_id($connect);
    $_SESSION['customer_name'] = $name;
    $_SESSION['customer_id'] = $id;
    require '../PHPMailer-master/send_mail.php';
    $title = "Chúc mừng bạn đã đăng ký tài khoản thành công!";
    $content = '<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <div style="display: flex; flex-direction: column;">
        <div class="contet" style="margin: auto; width: 600px;">
            <div style="display: flex; justify-content: center; height: 80px; background-color: black;">
                <a target=”_blank” style="text-decoration: none; margin: auto;" href="http://localhost/23_shoe_store/home/index.php">
                    <h1 style="color: #fff;">23 Shoe Store</h1>
                </a>
            </div>
            <div style="margin: 0 12px;">
                <h3 style="font-size: 24px;">Xin chào ' .  $name . ',</h3>
                <div style="font-size: 20px;">
                    Cảm ơn bạn đã đến với chùng tôi, bạn có thể thay đổi thông tin của bạn tại
                    <a target=”_blank” href="http://localhost/23_shoe_store/account/index.php">đây. </a>
                </div><br>
                <div style="font-size: 20px;">
                    Chúc bạn có thể tìm được sản phẩm như ý trong cửa hàng của chúng tôi.
                </div>
            </div>
            <hr>
            <div>
                Xem tất cả sản phẩm của chúng tôi <a target=”_blank” href="http://localhost/23_shoe_store/collection/index.php">23 shoe store</a>
            </div>
            <br>
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: black;">
                <a target=”_blank” style="margin: 8px; text-decoration: none; color: #fff;" href="http://maps.google.com/">
                    <div>
                        <i class="fa-solid fa-location-dot"></i>
                        <span style="margin-left: 8px;">Hai Bà Trưng - Hà Nội - Việt Nam</span>
                    </div>
                </a>
                <a target=”_blank” style="margin: 8px; text-decoration: none; color: #fff;" href="tel:+84988686868">
                    <div>
                        <i class="fa-solid fa-phone"></i>
                        <span style="margin-left: 8px;">+84 988 686 868</span>
                    </div>
                </a>
                <a target=”_blank” style="margin: 8px; text-decoration: none; color: #fff;" href="mailto:23shoestore.ha@gmail.com">
                    <div>
                        <i class="fa-solid fa-envelope"></i>
                        <span style="margin-left: 8px;">23shoestore.ha@gmail.com</span>
                    </div>
                </a>
            </div>
        </div>
        
    </div>';
    send_mail($email, $name, $title, $content);



    header('location:../collection/index.php');
    exit;



