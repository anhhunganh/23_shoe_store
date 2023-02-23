<?php
    require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require '../root/connect.php';
        $sql = "select * from products";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
    ?>
    <?php
        require '../root/menu.php';

        if(isset($_GET['id'])){
            $product_id = $_GET['id'];
        }
    ?>
    <div class="">
        <form action="process_insert_product_detail.php" method="post">
            <select name="product_id" id="">
            <?php foreach($result as $each) { ?>
                <option value="<?php echo $each['id'] ?>" <?php if($each['id'] == $product_id){?> selected <?php } ?>>
                    <?php echo $each['name'] ?>
                </option>
            <?php } ?>
            </select><br>
            <label>
                <span>Màu sắc: </span>
                <input type="text" name="color">
            </label><br>
            <label>
                <span>Chất liệu da: </span>
                <input type="text" name="material">
            </label><br>
            <label>
                <span>Thun: </span>
                <input type="text" name="elastic_gusset">
            </label><br>
            <label>
                <span>Chiều cao đế: </span>
                <input type="text" name="height_heel">
            </label><br>
            <label>
                <span>Logo Signature: </span>
                <input type="text" name="logo_signature">
            </label><br>
            <label>
                <span>Cấu trúc giày: </span>
                <input type="text" name="shoe_structure">
            </label><br>
            <button>Thêm thông tin sản phẩm</button>
        </form>
    </div>
</body>
</html>