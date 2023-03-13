<?php 
    session_start();
    if(isset($_SESSION['admin_level'])) {
        header('location:./root/index.php');
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
    <title>Root</title>
</head>
<body>
    <div>
        <?php 
            if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
    </div>
    <form action="./process_login.php" method="post">
        <label>
            <span>Email: </span>
            <input type="email" name="email" id="">
        </label><br>
        <label>
            <span>Password: </span>
            <input type="password" name="password" id="">
        </label><br>
        <button>Đăng nhập</button>
    </form>
</body>
</html>