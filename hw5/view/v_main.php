
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title><?=$title?></title>
</head>
<body>
    <div id="header">
        <h1><?=$title?></h1>
    </div>

    <div id="menu">
        <a href="index.php">Читать текст</a> |
        <a href="index.php?c=page&act=edit">Редактировать текст</a> |
        <?php
        if ($user) {
        ?>
            <a href="index.php?act=lk&c=User">Личный кабинет</a> |
            <a href="index.php?act=quit&c=User">Выйти</a>
        <?php } else { ?>
            <a href="index.php?act=auth&c=User">Войти</a> |
            <a href="index.php?act=reg&c=User">Регистрация</a>
        <?php }
        ?>
    </div>

    <div id="content">
        <?=$content?>
    </div>

    <div id="footer">
        Все права защищены. Адрес. Телефон.
    </div>
</body>
</html>
