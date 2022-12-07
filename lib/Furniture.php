<?php

class Furniture extends Product {
    function __construct()
    {
        $this->db = new Database;
        $this->validation = new Validate;

    }

    function save($data) {

        if ($this->validation->validateFurniture($data) != []) {
            return $this->validation->validateFurniture($data);
        }else{
            $this->db->query("INSERT INTO products(sku, name, price, product_type, height, width, length)  VALUES (:sku, :name, :price, :product_type, :height, :width, :length)");
                
                $this->db->bind(':sku',$data['sku']);
                $this->db->bind(':name',$data['name']);
                $this->db->bind(':price',$data['price']);
                $this->db->bind(':product_type', $data['product_type']);
                $this->db->bind(':height',$data['height']);
                $this->db->bind(':width',$data['width']);
                $this->db->bind(':length',$data['length']);
            
                if ($this->db->execute()) {
                    return true;
                }; 
            }
        }
   


};