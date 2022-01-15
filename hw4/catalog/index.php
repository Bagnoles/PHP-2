<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Каталог товаров</title>
</head>
<body>
    <h1>Каталог товаров</h1>
    <div class="products-wrp" id="wrap">
        <?php
        require_once 'ajax.php';
        while($row = $products->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="product-wrp">
                <img src="<?php echo $row['img_path'];?>" width="300" height="200">
                <h3><?php echo $row['name']; ?></h3>
                <p class="content"><?php echo $row['description']; ?></p>
                <p class="price"><?php echo $row['price'] . 'у.е.'; ?></p>
            </div>
        <?php }
        ?>
    </div>
    <button data-page="<?php echo $page; ?>" data-max="<?php echo $maxPages; ?>" id="showmore-button">Показать еще</button>
    <script src="script.js"></script>
</body>
</html>