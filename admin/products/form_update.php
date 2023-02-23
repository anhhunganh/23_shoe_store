<?php
    require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin sản phẩm</title>
</head>

<body>
    <?php if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('location:./index.php?error=Loi id không tồn tại');
        exit;
    } ?>
    <?php require '../root/connect.php' ?>
    <?php require '../root/menu.php' ?>
    <?php $sql = "select * from products where id = '$id'";
        $result = mysqli_query($connect, $sql);

        $sql = "select * from categories";
        $category = mysqli_query($connect, $sql);

        $num_row = mysqli_num_rows($result);
        if($num_row === 1) {   
        $each = mysqli_fetch_array($result);  
    ?>
    <div class="main">
        <form action="./process_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
            <label>
                <span>Tên sản phẩm</span>
                <input type="text" name="name" value="<?php echo $each['name'] ?>">
            </label><br>
            <label>
                <span>Giá sản phẩm</span>
                <input type="text" name="price" value="<?php echo $each['price'] ?>">
            </label><br>
            <label>
                <span>Nhà sản xuất </span>
                <select name="category_id" id="">
                    <option value="">Chọn nhà sản xuất</option>
                    <?php foreach ($category as $category) { ?>
                        <option value="<?php echo $category['id']?>"<?php if($category['id'] == $each['category_id']) { ?> selected <?php } ?>><?php echo $category['name'] ?></option>
                    <?php } ?>
                </select>
            </label><br>
            <label>
                <span>Ảnh cũ sản phẩm</span>
                <input type="hidden" name="image_old" value="<?php echo $each['image'] ?>">
                <img height="200" src="img/<?php echo $each['image'] ?>" alt="">
            </label><br>
            <label>
                <span>Thay ảnh mới: </span>
                <input type="file" name="image">
            </label><br>
            <label>
                <span>Thông tin chi tiết</span>
                <a href="./process_product_detail.php?id=<?php echo $id ?>">Sửa thông tin về sản phẩm</a>
            </label><br>
            <button>Sửa thông tin sản phẩm</button>
        </form>
    </div>
    <?php } else {
        header('location:./index.php?error=Loi');
        exit;
    } ?>
</body>

</html>