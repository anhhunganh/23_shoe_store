<?php
    require '../check_super_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Thêm kiểu dáng sản phẩm</title>
</head>
<body>
    <?php if(isset($_GET['error'])){
        $error_name = $_GET['error'];
        echo $error_name;
    } ?>
    <div class="main">
        <?php require '../root/menu.php' ?>
        <div class="container">
            <form action="./process_insert.php" method="post" enctype="multipart/form-data">
                <label>
                    <span>Kiểu dáng sản phẩm: </span>
                    <input type="text" name="name" id="">
                </label><br>
                <label>
                    <span>Ảnh kiểu dáng sản phẩm: </span>
                    <input type="file" name="image" id="">
                </label>
                <button>Thêm kiểu dáng sản phẩm</button>
            </form>
        </div>
    </div>
</body>
</html>