<?php
    require '../check_super_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhà sản xuất</title>
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
                    <span>Loại sản phẩm: </span>
                    <input type="text" name="name" id="">
                </label><br>
                <label>
                    <span>Ảnh loại sản phẩm: </span>
                    <input type="file" name="image" id="">
                </label>
                <button>Thêm loại sản phẩm</button>
            </form>
        </div>
    </div>
</body>
</html>