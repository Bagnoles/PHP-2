<?php
class Product
{
    protected $id;
    protected $title;
    protected $description;
    protected $price;
    protected $imagePath;

    public function __construct ($id, $title, $description, $price, $imagePath) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->imagePath = $imagePath;
    }

    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getImagePath() {
        return $this->imagePath;
    }

    public function setNewPrice($price) {
        $this->price = $price;
    }
    public function setDiscountPrice($discountPercent) {
        $this->price = $price - ($price * $discountPercent) / 100;
    }
}

class ProductInCart extends Product
{
    private $quantity;
    private $availableInStock;

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    public function checkAvailable() {
        // проверка доступности на складе
    }
}

