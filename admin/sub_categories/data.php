<?php
    $manufacturer_id = $_POST['manufacturer_id'];

    require '../root/connect.php';
    
    $sql = "select * from categories where manufacturer_id = '$manufacturer_id'";
    $result = mysqli_query($connect, $sql);

    foreach($result as $each) { ?>
    <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>
<?php }