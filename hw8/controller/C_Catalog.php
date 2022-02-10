<?php


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
    public function action_add()
    {
        $this->title .= ':: Добавление товара ';
        $text = 'Введите данные о товаре';
        if ($this->isPost()) {
            $catalog = new M_Catalog();
            $text = $catalog->addProduct($_POST['title'], $_POST['price'], $_POST['description']);
            $this->content = $this->Template('view/v_index.php', array('text' => $text));
        }
        $this->content = $this->Template('view/v_addProduct.php', array('text' => $text));
    }
}
