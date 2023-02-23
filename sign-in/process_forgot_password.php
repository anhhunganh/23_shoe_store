<?php 
    session_start();
    require '../admin/root/connect.php';
    
    function generateRandomString($length = 18) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $email = $_POST['email'];


    $sql = "select * from customers where email = '$email'";
    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) === 1) {
        $each = mysqli_fetch_array($result);
        $customer_id = $each['id'];

        $name = $each['name'];
        $email = $each['email'];

        $token = generateRandomString();

        // $sql = "delete from forgot_password where customer_id = '$customer_id'";
        // mysqli_query($connect, $sql);

        $sql = "select forgot_password.* 
                from forgot_password join customers on forgot_password.customer_id = customers.id 
                where forgot_password.customer_id = $customer_id ";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) === 1){
            $_SESSION['error'] = "Bạn vui lòng kiểm tra email";
            header('location:./forgot_password.php');
            exit;
        }

        $sql = "insert into forgot_password(customer_id, token) values('$customer_id', '$token')";
        mysqli_query($connect, $sql);

        $title = "Xác nhận quên mật khẩu!";
        $content = '<meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <div style="display: flex; flex-direction: column;">
            <div class="contet" style="margin: auto; width: 600px;">
                <div style="display: flex; justify-content: center; height: 80px; background-color: black;">
                    <a style="text-decoration: none; margin: auto;" href="http://localhost/23_shoe_store/home/index.php">
                        <h1 style="color: #fff;">23 Shoe Store</h1>
                    </a>
                </div>
                <div style="margin: 0 12px;">
                    <h3 style="font-size: 24px;">Xin chào ' .  $name . ',</h3>
                    <div style="font-size: 20px;">
                        Để xác nhận thay đổi mật khẩu của bạn, vui lòng bấm vào 
                        <a href="http://localhost/23_shoe_store/sign-in/change_new_password.php?token='. $token .'">link này. </a>
                    </div><br>
                    <div style="font-size: 20px;">
                        Cảm ơn bạn đã đến với chùng tôi, bạn có thể thay đổi thông tin của bạn tại
                        <a href="http://localhost/23_shoe_store/account/index.php">đây. </a>
                    </div><br>
                    <div style="font-size: 20px;">
                        Chúc bạn có thể tìm được sản phẩm như ý trong cửa hàng của chúng tôi.
                    </div>
                </div>
                <hr>
                <div>
                    Xem tất cả sản phẩm của chúng tôi <a href="http://localhost/23_shoe_store/collection/index.php">23 shoe store</a>
                </div>
                <br>
                <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: black;">
                    <a style="margin: 8px; text-decoration: none; color: #fff;" href="http://maps.google.com/">
                        <div>
                            <i class="fa-solid fa-location-dot"></i>
                            <span style="margin-left: 8px;">Hai Bà Trưng - Hà Nội - Việt Nam</span>
                        </div>
                    </a>
                    <a style="margin: 8px; text-decoration: none; color: #fff;" href="tel:+84988686868">
                        <div>
                            <i class="fa-solid fa-phone"></i>
                            <span style="margin-left: 8px;">+84 988 686 868</span>
                        </div>
                    </a>
                    <a style="margin: 8px; text-decoration: none; color: #fff;" href="mailto:23shoestore.ha@gmail.com">
                        <div>
                            <i class="fa-solid fa-envelope"></i>
                            <span style="margin-left: 8px;">23shoestore.ha@gmail.com</span>
                        </div>
                    </a>
                </div>
            </div>
            
        </div>';
        require '../PHPMailer-master/send_mail.php';
        send_mail($email, $name, $title, $content);
        
        header('location:./forgot_password.php');
        $_SESSION['error'] = 'Đã gửi email xác nhận quên mật khẩu. Bạn vui lòng kiểm tra email';
        exit;
    }

    header('location:./forgot_password.php');
    $_SESSION['error'] = 'Đã gửi email xác nhận quên mật khẩu. Bạn vui lòng kiểm tra email';
    exit;