<?php

class Book extends Product
{
    function __construct()
    {
        $this->db = new Database();
        $this->validation = new Validate();
    }

    function save($data)
    {
        if ($this->validation->validateBook($data) != []) {
            return $this->validation->validateBook($data);
        } else {
            $this->db->query(
                "INSERT INTO products(sku, name, price, product_type, weight)  VALUES (:sku, :name, :price, :product_type, :weight)"
            );

            $this->db->bind(":sku", $data["sku"]);
            $this->db->bind(":name", $data["name"]);
            $this->db->bind(":price", $data["price"]);
            $this->db->bind(":product_type", $data["product_type"]);
            $this->db->bind(":weight", $data["weight"]);

            if ($this->db->execute()) {
                return "success";
            }
        }
    }
}
