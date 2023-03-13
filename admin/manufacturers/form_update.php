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
    <link rel="stylesheet" href="../root/grid.css">
    <link rel="stylesheet" href="../root/style.css">
    <title>Cập nhật thông tin Nhà sản xuất</title>
</head>

<body>
    <?php if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('location:./index.php?error=Loi id không tồn tại');
        exit;
    } ?>
    <?php require '../root/connect.php' ?>
    <?php $sql = "select * from manufacturers where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    if ($num_row === 1) {
        $each = mysqli_fetch_array($result);
    ?>
        <div class="main">
            <?php require '../root/menu.php' ?>
            <div class="container">
                <?php require '../root/header.php' ?>
                <div class="content">
                    <form action="./process_update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
                        <label>
                            <span>Tên Nhà sản xuất</span>
                            <input type="text" name="name" value="<?php echo $each['name'] ?>">
                        </label><br>
                        <!-- <label>
                            <span>Email Nhà sản xuất</span>
                            <input type="email" name="email" value="<?php //echo $each['email'] ?>">
                        </label><br>
                        <label>
                            <span>Địa chỉ Nhà sản xuất</span>
                            <input type="text" name="address" value="<?php //echo $each['address'] ?>">
                        </label><br>
                        <label>
                            <span>Ảnh cũ Nhà sản xuất</span>
                            <input type="hidden" name="image_old" value="<?php //echo $each['image'] ?>">
                            <img height="200" src="img/<?php //echo $each['image'] ?>" alt="">
                        </label><br>
                        <label>
                            <span>Thay ảnh mới: </span>
                            <input type="file" name="image">
                        </label><br> -->
                        <button>Sửa thông tin Nhà sản xuất</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } else {
        header('location:./index.php?error=Loi');
        exit;
    } ?>
</body>

</html>