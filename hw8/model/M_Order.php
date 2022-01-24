<?php
include_once 'PDO.php';

class M_Order
{
    public function setOrder($user_id) {
        //должна быть транзакция

        $object = [
            'user_id'=> $user_id,
            'status'=> 1
        ];
        $orderId = DB::Instance()->Insert('orders', $object);

        $query = "SELECT * FROM products_in_basket WHERE session_id = " . $_SESSION['basket_id'];
        $productsInBasket = DB::Instance()->SelectAll($query);

        foreach ($productsInBasket as $product) {
            $object = [
                'order_id' => $orderId,
                'product_id' => $product['product_id'],
                'amount' => $product['quantity']
            ];
            DB::Instance()->Insert('products_in_order', $object);
            DB::Instance()->Delete('products_in_basket', '`session_id` = ' . $_SESSION['basket_id'] . ' AND `product_id` = ' . $product['product_id']);
        }
    }

    public function getOrders($user_id) {
        $query = "SELECT orders.id AS number, order_status.name AS status, products.name AS name, products_in_order.amount AS quantity FROM orders JOIN products_in_order ON orders.id = products_in_order.order_id JOIN products ON products_in_order.product_id = products.id JOIN order_status ON orders.status = order_status.id WHERE orders.user_id = " . $user_id;
        $orders = DB::Instance() -> SelectAll($query);
        return $orders;
    }
}
