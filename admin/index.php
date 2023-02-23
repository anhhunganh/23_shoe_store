<?php 
    session_start();
    if(isset($_SESSION['admin_level']) && $_SESSION['admin_level'] == 1) {
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