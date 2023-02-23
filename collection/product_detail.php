
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <?php require '../pages/header.php' ?>
        <div class="container">
        <?php 
        if(isset($_GET['id'])){
            $product_id = $_GET['id'];
        }
        require '../admin/root/connect.php';
        $sql = "select products.name as product_name, products.image as product_image, products.price as product_price, product_details.*
        from products join product_details on products.id = product_details.product_id
        where products.id = '$product_id'";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) !==1) {
            header('location:./index.php');
            exit;
        }
        $each = mysqli_fetch_array($result);
        ?>
        <div>
            <div><?php echo $each['product_name'] ?></div>
            <div><?php echo $each['product_price'] ?></div>
        </div>
        <div>
            <div><img height="500" src="../admin/products/img/<?php echo $each['product_image'] ?>" alt=""></div>
        </div>
        <div>
            <div>Màu sắc: <?php echo $each['color'] ?></div>
            <div>Chất liệu da: <?php echo $each['material'] ?></div>
            <div>Chất liệu đế: <?php echo $each['material_sole'] ?></div>
            <div>Lót trong: <?php echo $each['socklining'] ?></div>
            <?php if(isset($each['elastic_gusset'])) { ?>
                <div><?php echo $each['elastic_gusset'] ?> </div>
            <?php } ?>
            <div>Chiều cao đế: <?php echo $each['height_heel'] ?></div>
            <?php if(isset($each['logo_signature'])) { ?>
                <div><?php echo $each['logo_signature'] ?> </div>
            <?php } ?>
            <?php if(isset($each['shoe_structure'])) { ?>
                <div><?php echo $each['shoe_structure'] ?> </div>
            <?php } ?>
            <form action="../cart/add_to_cart.php" method="post">
                <input type="hidden" name="id" value="<?php echo $product_id ?>">
                <label>
                    <select name="size_id" id="">
                        <?php 
                        $sql = "select size.* from product_size join size on product_size.size_id = size.id where product_id = '$product_id' order by size.value asc";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <?php foreach($result as $each) { ?>
                            <option value="<?php echo $each['id'] ?>"><?php echo $each['value'] ?></option>
                        <?php } ?>
                    </select>
                </label>
                <button>Thêm sản phẩm vào giỏ hàng</button>
            </form>
        </div>
        </div>
    </div>
</body>
</html>