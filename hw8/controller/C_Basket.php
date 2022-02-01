<?php


class C_Basket extends C_Base
{
    public function action_basket()
    {
        $this->title .= ':: Корзина ';
        $text = 'В корзине пусто.';
        if (isset($_SESSION['basket_id'])) {
            $basket = new M_Basket();
            $text = $basket->renderBasket($_SESSION['basket_id']);
        }
        $this->content = $this->Template('view/v_basket.php', array('text' => $text));
    }

    public function action_buy()
    {
        $basket = new M_Basket();
        $basket->addToBasket($_GET['id']);
        $text = "Товар добавлен в корзину.";
        $this->content = $this->Template('view/v_index.php', array('text' => $text));
    }

    public function action_delete()
    {
        $basket = new M_Basket();
        $basket->deleteFromBasket(($_GET['id']));
        $text = $basket->renderBasket($_SESSION['basket_id']);
        $this->content = $this->Template('view/v_basket.php', array('text' => $text));
    }

    public function action_deleteAll()
    {
        $basket = new M_Basket();
        $basket->clearBasket($_SESSION['basket_id']);
        $text = 'В корзине пусто.';
        $this->content = $this->Template('view/v_basket.php', array('text' => $text));
    }
}