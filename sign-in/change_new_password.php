<?php 
    require '../admin/root/connect.php';
    $token = $_GET['token'];
    $sql = "select * from forgot_password where token = '$token'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) === 0) {
        header('location:../home/index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <title>Đổi mật khẩu mới</title>
</head>
<body>
    <div class="main">
        <?php require '../pages/header.php' ?>
        <div class="main">
            <form action="./process_change_new_password.php" method="post">
                <input type="hidden" name="token" value="<?php echo $token ?>">
                <label>
                    <span>password: </span>
                    <input type="password" name="password">
                </label>
                <button>Đổi mật khẩu</button>
            </form>
        </div>
    </div>
</body>
</html>