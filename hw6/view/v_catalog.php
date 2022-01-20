<div class="products-wrp" id="wrap">
<?php foreach ($text as $product) { ?>
<div class="product-wrp">
    <img src="<?php echo $product['img_path'];?>" width="300" height="200">
    <h3><?php echo $product['name']; ?></h3>
    <p class="content"><?php echo $product['description']; ?></p>
    <p class="price"><?php echo $product['price'] . ' у.е.'; ?></p>
    <a href="index.php?c=catalog&act=viewOne&id=<?php echo $product['id'] ?>">Подробнее...</a>
</div>
<?php } ?>
</div>
