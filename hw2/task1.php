<?php
abstract class Product {
    protected $price;
    abstract public function countPrice();
    public function setPrice($price)
    {
        $this->price = $price;
    }
}

class DigitalProduct extends Product {
    protected $quantity;
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function countPrice()
    {
        return $this->quantity * ($this->price / 2);
    }

}

class ItemProduct extends Product {
    protected $quantity;
    protected function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function countPrice()
    {
        return $this->price * $this->quantity;
    }
}

class WeightProduct extends Product {
    protected $weight;
    protected function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function countPrice()
    {
        return $this->weight * $this->price;
    }
}


