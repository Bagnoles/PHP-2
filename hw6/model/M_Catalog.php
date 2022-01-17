<?php
include_once 'PDO.php';

class M_Catalog
{
    function renderProducts()
    {
        $query = "SELECT * FROM products WHERE id < 5";
        $products = DB::Instance() -> Select($query);
        return $products->fetchAll();
    }
    function getProduct($id)
    {
        $query = "SELECT * FROM products WHERE id = '$id'";
        $product = DB::Instance() -> Select($query);
        return $product->fetch();
    }
}
