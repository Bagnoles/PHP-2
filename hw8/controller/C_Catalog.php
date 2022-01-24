<?php
include_once 'model/M_Catalog.php';

class C_Catalog extends C_Base
{
    public function action_viewAll()
    {
        $this->title .= ':: Каталог товаров ';
        $catalog = new M_Catalog();
        $products = $catalog->renderProducts();
        $this->content = $this->Template('view/v_catalog.php', array('text' => $products));
    }
    public function action_viewOne()
    {
        $this->title .= ':: Карточка товара ';
        $catalog = new M_Catalog();
        $product = $catalog->getProduct($_GET['id']);
        $this->content = $this->Template('view/v_product.php', array('text' => $product));
    }
}
