<?php

class Product{
    public $sku;
    public $name;
    public $price;
    public $size;
    function __construct($sku, $name, $price, $size)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
    }
}

class DVD extends Product{
    function dimension($size)
    {
        $this->size = "Size: ". $size . " MB";
    }
}

class Book extends Product{
    function dimension($size)
    {
        $this->size = "Weight: ". $size . "KG";
    }
}

class Furniture extends Product{
    function dimension($size)
    {
        $this->size = "Dimension: ". $size;
    }
}

?>