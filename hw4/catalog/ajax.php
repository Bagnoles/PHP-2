<?php
require_once 'db.php';
$limit = 3;
$page = intval(@$_GET['page']);
$page = (empty($page)) ? 1 : $page;
$start = ($page != 1) ? $page * $limit - $limit : 0;
$products = $db->query("SELECT * FROM products LIMIT $start, $limit");
$sumRows = ($db->query("SELECT * FROM products")->rowCount());
$maxPages = ceil($sumRows / $limit);
while($row = $products->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class="product-wrp">
        <img src="<?php echo $row['img_path'];?>" width="300">
        <h3><?php echo $row['name']; ?></h3>
        <p class="content"><?php echo $row['description']; ?></p>
        <p class="price"><?php echo $row['price']; ?></p>
    </div>
<?php }
