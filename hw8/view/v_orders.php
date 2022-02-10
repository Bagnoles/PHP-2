<?php
if (empty($text)) { ?>
    <p>Заказов нет.</p>
<?php } else {
    foreach ($text as $order) { ?>
        <p>Номер заказа: <?php echo $order['number'] ?></p>
        <p>Статус заказа: <?php echo $order['status'] ?></p>
        <p>Название товара: <?php echo $order['name'] ?></p>
        <p>Количество: <?php echo $order['quantity'] ?></p>
        <?php if ($_SESSION['user_id'] == 1) { ?>
                <p>Заказ сделал: <?php echo $order['user_name'] ?></p>
            <p>Телефон: <?php echo $order['user_phone'] ?></p>
            <a href="index.php?c=order&act=delete&id=<?php echo $order['number'] ?>">Отменить заказ</a>
        <?php       }
  }
} ?>
