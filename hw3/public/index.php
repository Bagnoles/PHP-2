<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');
$twig = new Environment($loader, []);
$images = [
    [
        'id'=>'1', 'src'=>'img/image1.jpg', 'name'=>'Картинка 1'
    ],
    [
        'id'=>'2', 'src'=>'img/image2.jpg', 'name'=>'Картинка 2'
    ],
    [
        'id'=>'3', 'src'=>'img/image3.jpg', 'name'=>'Картинка 3'
    ],
    [
        'id'=>'4', 'src'=>'img/image4.jpg', 'name'=>'Картинка 4'
    ],
];
$template = $_GET['image'] ? 'image.twig' : 'gallery.twig';

try {
    echo $twig->render($template, ['images' => $images, 'image_id' => $_GET['image']]);
} catch (Exception $exception) {
    var_dump($exception);
}
