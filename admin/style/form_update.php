<?php
    require '../check_super_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật Kiểu dáng sản phẩm</title>
</head>
<body>
    <?php require '../root/connect.php' ?>
    <?php require '../root/menu.php' ?>
    <?php 
        if(!isset($_GET['id'])){
            header('location:./index.php');
            exit;
        }
        $id = $_GET['id'];
        $sql = "select * from style where id = '$id'";
        $result = mysqli_query($connect, $sql);
        $num_row = mysqli_num_rows($result);
        $each = mysqli_fetch_array($result);
        if($num_row === 1) { 
    ?>
    <div class="main">
        <?php require '../root/menu.php' ?>
        <div class="container">
            <form action="./process_update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
                <label>
                    <span>Tên kiểu dáng sản phẩm: </span>
                    <input type="text" name="name" id="" value="<?php echo $each['name'] ?>">
                </label><br>
                <label>
                    <span>Ảnh cũ kiểu dáng sản phẩm: </span>
                    <img height="200" src="img/<?php echo $each['image'] ?>" alt="">
                    <input type="hidden" name="image_old" value="<?php echo $each['image'] ?>">
                </label><br>
                <label>
                    <span>Thay ảnh kiểu dáng sản phẩm: </span>
                    <input type="file" name="image" id="">
                </label><br>
                <button>Sửa kiểu dáng sản phẩm</button>
            </form>
        </div>
    </div>
    <?php } else {
        header('location:./index.php');
    } ?>
</body>
</html>