<?php
include_once 'PDO.php';

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
}
