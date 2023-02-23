<ul>
    <li><a href="../root/index.php">Home</a></li>
    <li><a href="../categories/">Categories</a></li>
    <li><a href="../style/">Style</a></li>
    <li><a href="../products/">Products</a></li>
    <li><a href="../orders/">Orders</a></li>
</ul>
<div>
    <?php if(isset($_SESSION['admin_level'])){ ?>
        <?php echo $_SESSION['admin_name']; ?>
        <a href="../process_logout.php">Đăng xuất</a>
    <?php } ?>
</div>