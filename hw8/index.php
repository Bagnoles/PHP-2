<?php
include_once 'autoload.php';

session_start();
$action = 'action_';
$action .=(isset($_GET['act'])) ? $_GET['act'] : 'index';

switch (@$_GET['c'])
{
    case 'catalog':
        $controller = new C_Catalog();
        break;
    case 'order':
        $controller = new C_Order();
        break;
    case 'basket':
        $controller = new C_Basket();
        break;
    case 'User':
        $controller = new C_User();
        break;
    default:
        $controller = new C_Page();
}

$controller->Request($action);