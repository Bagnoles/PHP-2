<p>Добро пожаловать, <?=$text?>!</p>
<a href="index.php?c=order&act=get">Мои заказы</a>
<?php if ($_SESSION['user_id'] == 1) { ?>
<p>Панель администратора сайта</p>
<a href="index.php?c=order&act=getAll">Просмотреть все оформленные заказы</a><br>
    <a href="index.php?c=catalog&act=add">Добавить товар</a><br>
<?php } ?>
