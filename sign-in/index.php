<?php 
    session_start();
    require '../admin/root/connect.php';
    if(isset($_COOKIE['remember'])) {
        $token = $_COOKIE['remember'];
        $sql = "select * from customers where token = '$token' limit 1";
        $result = mysqli_query($connect, $sql);
        $num_row = mysqli_num_rows($result);
        if($num_row === 1) {
            $each = mysqli_fetch_array($result);
            $_SESSION['customer_id'] = $each['id'];
            $_SESSION['customer_name'] = $each['name'];
        }

    }

    if(isset($_SESSION['customer_id'])) {
         
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <?php 
        if(isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>
    <form action="./process_signin.php" method="post">
        <label>
            <span>Email</span>
            <input type="email" name="email">
        </label><br>
        <label>
            <span>Password</span>
            <input type="password" name="password">
        </label><br>
        <label>
            <span>Remember me: </span>
            <input type="checkbox" name="remember" id="">
        </label>
        <button>Đăng nhập</button>
    </form>
    <a href="./forgot_password.php">Quên mật khẩu</a>
</body>
</html>