<?php
if (is_string($text) || empty($text)) { ?>
    <p>В корзине пусто.</p>
<?php } else { ?>
<ol>
<?php foreach ($text as $product) {
    @$sum += $product['price']*$product['quantity']; ?>
        <li><div class="basket-wrp">
                <img src="<?php echo $product['img_path'];?>" width="200">
                <h4><?php echo $product['name']; ?></h4>
                <p><?php echo $product['price'] . ' у.е.'; ?></p>
                <p>Количество: <?php echo $product['quantity'] ?></p>
                <p>Общая стоимость: <?php echo $product['price']*$product['quantity'] ?> у.е.</p>
                <a href="index.php?c=basket&act=delete&id=<?php echo $product['product_id'] ?>">Удалить</a>
            </div></li>
    <?php } ?>
    </ol>
    <p>Стоимость корзины: <?php echo $sum ?> у.е.</p>
    <a href="index.php?c=basket&act=deleteAll">Очистить корзину</a>

<?php }
if((isset($_SESSION['user_id']))) { ?>
    <a href="index.php?c=order&act=set">Оформить заказ</a>
<?php } else { ?>
    <p>Для оформления заказа нужно зарегистрироваться.</p>
<?php } ?>
