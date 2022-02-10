<?php


class M_Catalog
{
    function renderProducts()
    {
        $query = "SELECT * FROM products ";
        $products = DB::Instance() -> SelectAll($query);
        return $products;
    }
    function getProduct($id)
    {
        $query = "SELECT * FROM products WHERE id = '$id'";
        $product = DB::Instance() -> Select($query);
        return $product;
    }
    function addProduct($title, $price, $description)
    {
        $object = [
            'name' => $title,
            'price' => $price,
            'description' => $description
        ];
        $res = DB::Instance() ->Insert('products', $object);
        if (is_numeric($res)) {
            return "Товар успешно добавлен.";
        } else {
            return "Произошла ошибка при добавлении товара";
        }
    }
}
