<?php
    require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>

<body>
    <?php require '../root/connect.php' ?>
    <?php require '../root/menu.php' ?>
    <?php $sql = "select * from categories";
    $category = mysqli_query($connect, $sql);
    ?>
    <div class="main">
        <?php 
            if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
        <form action="./process_insert.php" method="post" enctype="multipart/form-data">
            <label>
                <span>Tên sản phẩm</span>
                <input type="text" name="name">
            </label><br>
            <label>
                <span>Giá sản phẩm</span>
                <input type="text" name="price">
            </label><br>
            <label>
                <span>Loại sản phẩm </span>
                <select name="category_id" id="">
                    <option value="">Chọn loại sản phẩm</option>
                    <?php foreach ($category as $category) { ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                    <?php } ?>
                </select>
            </label><br>
            <label>
                <span>Ảnh sản phẩm</span>
                <input type="file" name="image">
            </label><br>
            <button>Thêm sản phẩm</button>
        </form>
    </div>
</body>

</html>