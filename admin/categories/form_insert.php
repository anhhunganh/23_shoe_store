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
    <title>Thêm Loại sản phẩm</title>
</head>

<body>
    <?php
        require '../root/connect.php';

        $sql = "select * from manufacturers";
        $resul = mysqli_query($connect, $sql);
        if (isset($_GET['error'])) {
            $error_name = $_GET['error'];
            echo $error_name;
        }
    ?>
    <div class="main">
        <?php require '../root/menu.php' ?>
        <div class="container">
            <?php require '../root/header.php' ?>
            <div class="content">
                <form action="./process_insert.php" method="post" enctype="multipart/form-data">
                    <label>
                        <span>Loại sản phẩm: </span>
                        <input type="text" name="name" id="">
                    </label><br>
                    <label>
                        Chọn thương hiệu
                        <select name="manufacturer_id" id="">
                            <?php foreach($resul as $each) { ?>
                                <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>
                            <?php } ?>
                        </select>
                    </label>
                    <!-- <label>
                        <span>Ảnh loại sản phẩm: </span>
                        <input type="file" name="image" id="">
                    </label> -->
                    <button>Thêm loại sản phẩm</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>