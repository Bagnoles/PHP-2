<?php
include_once 'PDO.php';

class M_Basket
{
    function renderBasket($basket)
    {
        $query = "SELECT * FROM products_in_basket JOIN products ON products_in_basket.product_id = products.id WHERE products_in_basket.session_id = " . $basket;
        $products = DB::Instance() -> SelectAll($query);
        return $products;
    }

    function addToBasket($id)
    {
        if (isset($_SESSION['user_id'])) {
            $_SESSION['basket_id'] = $_SESSION['user_id'];
        }
        if (!isset($_SESSION['basket_id'])) {
            $_SESSION['basket_id'] = time(); // пока думаю как сделать случайное и неповторяющееся с другими незарегистрированными пользователями число
        }
        $query = "SELECT * FROM products_in_basket WHERE product_id = " . $id . " AND session_id = " . $_SESSION['basket_id'];
        $res = DB::Instance()->Select($query);
        if (empty($res)) {
            $object = [
                'session_id' => $_SESSION['basket_id'],
                'product_id' => $id,
                'quantity' => 1
            ];
            DB::Instance() -> Insert('products_in_basket', $object);
        } else {
            $object = [
                'session_id' => $_SESSION['basket_id'],
                'product_id' => $id,
                'quantity' => $res['quantity'] + 1
            ];
            DB::Instance()->Update('products_in_basket', $object, '`session_id` = ' . $_SESSION['basket_id'] . ' AND `product_id` = ' . $id);
        }
    }

    function deleteFromBasket($id)
    {
        DB::Instance() -> Delete('`products_in_basket`', '`session_id` = ' . $_SESSION['basket_id'] . ' AND `product_id` = ' . $id);
    }

    function clearBasket($user_id)
    {
        DB::Instance() -> Delete('products_in_basket', '`session_id` = ' . $user_id);
    }
}

