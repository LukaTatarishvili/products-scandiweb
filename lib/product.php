<?php

abstract class Product
{
    private $db;

    protected $sku = "";
    protected $name = "";
    protected $price = 0;
    protected $type = "";

    public function __construct()
    {
        $this->db = new Database();
    }
    protected function setFields($product)
    {
        $this->sku = $product["sku"];
        $this->name = $product["name"];
        $this->price = $product["price"];
        $this->type = $product["type"];
    }

    protected function getField($name)
    {
        return $this->$name;
    }

    abstract protected function save($data);
}

?>
