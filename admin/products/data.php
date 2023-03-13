<?php 
    require '../root/connect.php';
    if(isset($_POST['manufacturer_id'])) {
        $manufacturer_id = $_POST['manufacturer_id'];

    $sql_manufacturer = "select * from categories where manufacturer_id = '$manufacturer_id' order by id desc";
    // die($sql_manufacturer);
    $result_manufacturer = mysqli_query($connect, $sql_manufacturer);
    ?> <option value="">Chọn Danh mục sản phẩm</option> <?php
    foreach($result_manufacturer as $each_manufacturer) { ?>
        <option value="<?php echo $each_manufacturer['id'] ?>"><?php echo $each_manufacturer['name'] ?></option>
    <?php } 

    }
    

    if(isset($_POST['category_id'])){
        $category_id = $_POST['category_id'];
        $sql_categories = "select * from sub_categories where category_id = '$category_id'";
        $result_category = mysqli_query($connect, $sql_categories);
        ?> <option value="">Chọn Thể loại Sản phẩm</option> <?php
        foreach($result_category as $each_category) { ?>
            <option value="<?php echo $each_category['id'] ?>"><?php echo $each_category['name'] ?></option>
        <?php } }


    