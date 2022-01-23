<?php
include_once 'model/M_Order.php';

class C_Order extends C_Base
{
    public function action_set()
    {
        $order = new M_Order();
        $order->setOrder($_SESSION['user_id']);
        $text = 'Заказ оформлен';
        $this->content = $this->Template('view/v_index.php', array('text' => $text));
    }
    public function action_get()
    {
        $order = new M_Order();
        $text = $order->getOrders($_SESSION['user_id']);
        $this->content = $this->Template('view/v_orders.php', array('text' => $text));
    }
}
