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
    <title>Thêm Thể loại sản phẩm</title>
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
                <h2>
                    <?php if(isset($_SESSION['error'])) { echo $_SESSION['error']; unset($_SESSION['error']); } ?> 
                </h2>
                <form action="./process_insert.php" method="post" enctype="multipart/form-data">
                    <label>
                        <span>Thể loại sản phẩm: </span>
                        <input type="text" name="name" id="">
                    </label><br>
                    <label>
                        Chọn thương hiệu
                        <select name="manufacturer_id" class="manufacturer_id" id="">
                            <option value="">Chọn hãng sản xuất</option>
                            <?php foreach($resul as $each) { ?>
                                <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>
                            <?php } ?>
                        </select>
                    </label><br>
                    <label>
                        Chọn Thể loại sản phẩm
                        <select name="category_id" class="category_id" id="">
                            
                        </select>
                    </label><br>
                    <label>
                        <span>Ảnh thể loại sản phẩm: </span>
                        <input type="file" name="image" id="">
                    </label><br>
                    <button>Thêm loại sản phẩm</button>
                </form>
            </div>

        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $(".manufacturer_id").change(function () {
            var manufacturer_id = $(".manufacturer_id").val();
            $.ajax({
                type: "post",
                url: "./data.php",
                data: {
                    manufacturer_id
                },
            }).done(function (data) {
                $(".category_id").html(data)
            });
        })
    });
</script>
</html>