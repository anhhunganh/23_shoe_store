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
    <title>Categories</title>
</head>
<body>
    <?php require '../root/connect.php' ?>
    <?php require '../root/menu.php' ?>
    <?php 
        $sql = "select * from style";
        $result = mysqli_query($connect, $sql);
    ?>
    <div class="main">
        <div><a href="./form_insert.php">Thêm kiểu sản phẩm</a></div>
        <div>
            <form action="">
                <input type="text" name="search">
            </form>
        </div>
        <table>
            <tr>
                <td>Name</td>
                <td>Image</td>
                <td>Update</td>
                <td>Delete</td>
            </tr>
            <?php foreach($result as $each) { ?>
            <tr>
                <td><?php echo $each['name'] ?></td>
                <td><img height="200" src="img/<?php echo $each['image'] ?>" alt=""></td>
                <td><a href="./form_update.php?id=<?php echo $each['id'] ?>">Update</a></td>
                <td><a href="./process_delete.php?id=<?php echo $each['id'] ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>