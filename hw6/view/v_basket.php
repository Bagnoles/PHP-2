
<ol>
<?php if (is_string($text)) {
    echo $text;
}  else {
foreach ($text as $product) { ?>
<li><div class="basket-wrp">
    <img src="<?php echo $product['img_path'];?>" width="200">
    <h4><?php echo $product['name']; ?></h4>
    <p><?php echo $product['price'] . ' у.е.'; ?></p>
    <p>Количество: <?php echo $product['quantity'] ?></p>
        <a href="index.php?c=basket&act=delete&id=<?php echo $product['product_id'] ?>">Удалить</a>
</div></li>
<?php } ?>
<a href="index.php?c=basket&act=deleteAll">Очистить корзину</a>
<?php }?>
</ol>
<?php if((isset($_SESSION['user_id']))) { ?>
    <a href="#">Оформить заказ</a>
<?php } else { ?>
    <p>Для оформления заказа нужно зарегистрироваться.</p>
<?php } ?>

