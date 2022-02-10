<?php
if (empty($text)) { ?>
    <p>Заказов нет.</p>
<?php } else {
    foreach ($text as $order) { ?>
        <p>Номер заказа: <?php echo $order['number'] ?></p>
        <p>Статус заказа: <?php echo $order['status'] ?></p>
        <p>Название товара: <?php echo $order['name'] ?></p>
        <p>Количество: <?php echo $order['quantity'] ?></p>
<?php    }
} ?>
