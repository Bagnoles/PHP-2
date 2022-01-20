<img src="<?php echo $text['img_path'];?>" width="500">
<h3><?php echo $text['name']; ?></h3>
<p class="content"><?php echo $text['description']; ?></p>
<p class="price"><?php echo $text['price'] . ' у.е.'; ?></p>
<a href="index.php?c=basket&act=buy&id=<?php echo $text['id'] ?>">Купить</a>