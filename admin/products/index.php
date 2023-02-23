<?php
    require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
</head>
<body>
    <?php require '../root/menu.php' ?>
    <?php require '../root/connect.php' ?>
    <?php 
        $search ='';
        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }

        $page = 2;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }

        $number_items_of_page = 20; //Số item trên 1 trang

        $sql_number_items = "select count(*) from products where name like '%$search%'";
        $result_arr_number_items = mysqli_query($connect, $sql_number_items);
        $number_items = mysqli_fetch_array($result_arr_number_items)['count(*)'];
        $number_of_pages = ceil($number_items / $number_items_of_page);

        $skip_number_items = $number_items_of_page * ($page - 1); //

        $sql = "select products.*, categories.name as category_name 
                from products join categories on products.category_id = categories.id
                where products.name like '%$search%' limit $number_items_of_page offset $skip_number_items";
        
                $result = mysqli_query($connect, $sql);
        $num_row = mysqli_num_rows($result);
    ?>

    <div class="main">
        <div><a href="./form_insert.php">Thêm sản phẩm</a></div>
        <div>
            <form action="">
                <input type="text" name="search">
                <button>Search</button>
            </form>
        </div>
        <table>
            <tr>
                <td>Tên sản phẩm</td>
                <td>Giá sản phẩm</td>
                <td>Nhà sản xuất</td>
                <td>Ảnh sản phẩm</td>
                <td>Update</td>
                <?php if($_SESSION['admin_level'] == 1) { ?>
                    <td>Delelte</td>
                <?php } ?>
            </tr>
            <?php foreach($result as $each) { ?> 
            <tr>
                <td><a href="./product_info.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a></td>
                <td><?php echo $each['price'] ?></td>
                <td><?php echo $each['category_name'] ?></td>
                <td><img height="100" src="./img/<?php echo $each['image'] ?>" alt=""></td>
                <td><a href="./form_update.php?id=<?php echo $each['id'] ?>">Update</a></td>
                <?php if($_SESSION['admin_level'] == 1) { ?>
                    <td><a href="./process_delete.php?id=<?php echo $each['id'] ?>">Delete</a></td>
                <?php } ?>
            </tr>    
            <?php } ?>
        </table>
        <div class="page">
            <div class="page__item">
                <a href="./index.php?page=1&search=<?php echo $search ?>" class="page__item-link"> << </a>
            </div>
            <?php for($i = 1; $i <= $number_of_pages; $i++) { ?>
            <div class="page__item">
                <a href="./index.php?page=<?php echo $i ?>&search=<?php echo $search ?>" class="page__item-link"><?php echo $i ?></a>
            </div>
            <?php } ?>
            <div class="page__item">
                <a href="./index.php?page=<?php echo $number_of_pages ?>&search=<?php echo $search ?>" class="page__item-link"> >> </a>
            </div>
        </div>
    </div>
</body>
</html>