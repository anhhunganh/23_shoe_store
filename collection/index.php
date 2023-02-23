<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../grid.css">
    <title>Document</title>
</head>
<body>

    <div class="main">
        <?php 
        require '../pages/header.php';
        if(isset($_GET['type'])){
            $type = $_GET['type'];
        } 
        ?>
        <div class="background <?php echo $type ?>">

        </div>
        <?php
        require '../admin/root/connect.php';

        $search = '';
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        $page = 1;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        $number_items_of_page = 12;
        if(isset($_GET['style_id'])){
            $style_id = $_GET['style_id'];
            $sql_number_items = "select count(*) from products 
            join style on products.stylee_id = style.id  
            where style.id = '$style_id' and products.name like '%$search%'";
            // die($sql_number_items);
        } else {
            $sql_number_items = "select count(*) from products where products.name like '%$search%'";
        }

        $result_arr_number_items = mysqli_query($connect, $sql_number_items);
        $number_items = mysqli_fetch_array($result_arr_number_items)['count(*)'];
        $number_of_page = ceil($number_items / $number_items_of_page);

        $skip_number_items = $number_items_of_page * ($page -1);
        
        if(isset($_GET['style_id'])){
            $sql = "select products.* from products 
            join style on products.stylee_id = style.id  
            where style.id = '$style_id' limit $number_items_of_page offset $skip_number_items";
            // die($sql);
        } else {
            $sql = "select * from products limit $number_items_of_page offset $skip_number_items";
        }
        $result = mysqli_query($connect, $sql);

        
        ?>
        <div class="container" style="padding: 0 12px; margin-top: 112px;">
            <div class="grid">
                <div class="row">
                <?php foreach($result as $each) { ?>
                <div class="col l-4" style="display: flex; flex-direction: column; justify-content: center; align-items:center">
                    <a href="./product_detail.php?id=<?php echo $each['id'] ?>">
                        <div><img style="max-height: 600px" src="../admin/products/img/<?php echo $each['image'] ?>" alt=""></div>
                    </a>
                    <a  href="./product_detail.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a>
                    <div><?php echo $each['price'] ?></div>
                </div>
                <?php } ?>
                </div>
            </div>
            <div style="display: flex; justify-content: center; margin-top: 20px">
                <div class="page__item" style="margin: 0 12px;">
                    <a href="./index.php?style_id=<?php echo $style_id ?>&page=1&search=<?php echo $search ?>" class="page__item-link"> << </a>
                </div>
                <div class="page__item">
                <?php for($i = 1; $i <= $number_of_page; $i++) { ?>
                    <a href="./index.php?style_id=<?php echo $style_id ?>&page=<?php echo $i ?>&search=<?php echo $search ?>" class="page__item-link"><?php echo $i ?></a>
                <?php } ?>
                </div>
                <div class="page__item" style="margin: 0 12px;">
                    <a href="./index.php?style_id=<?php echo $style_id ?>&page=<?php echo $number_of_page ?>&search=<?php echo $search ?>" class="page__item-link"> >> </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>