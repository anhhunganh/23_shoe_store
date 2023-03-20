<?php
session_start();
if (isset($_SESSION['admin_level'])) {
    header('location:../root/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../root/grid.css">
    <link rel="stylesheet" href="../root/style.css">
    <title>Root</title>
</head>

<body>
    <div class="main">
        <?php require '../root/menu.php' ?>
        <div class="container">
            <?php require '../root/header.php' ?>
            <div class="grid">
                <div class="content">
                    <?php
                    if (isset($_SESSION['error'])) { ?>
                        <h2 class="content-error">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                        </h2>
                    <?php } ?>
                    <div class="row">
                        <div class="wrap-form">
                            <div class="form-login__heading">Admin login</div>
                            <form action="./process_login.php" method="post" class="form-login">
                                <label class="form-login__label">
                                    <span class="form-login__span">Email</span>
                                    <input class="form-login__input" type="email" name="email" id="" placeholder="Enter your Email">
                                </label>
                                <label class="form-login__label">
                                    <span class="form-login__span">Password</span>
                                    <input class="form-login__input" type="password" name="password" id="" placeholder="Enter your Password">
                                </label>
                                <button class="form-login__btn">Đăng nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php require '../root/footer.php' ?>
        </div>
    </div>
</body>

</html>