<?php

class DVD extends Product {
    function __construct()
    {
        $this->db = new Database;
        $this->validation = new Validate;

    }

    function save($data) {
        if ($this->validation->validateDVD($data) != []) {
            return $this->validation->validateDVD($data);
        }else{

            $this->db->query("INSERT INTO products(sku, name, price, product_type, size)  VALUES (:sku, :name, :price, :product_type, :size)");
                
                $this->db->bind(':sku',$data['sku']);
                $this->db->bind(':name',$data['name']);
                $this->db->bind(':price',$data['price']);
                $this->db->bind(':product_type', $data['product_type']);
                $this->db->bind(':size',$data['size']);
            
                if ($this->db->execute()) {
                    return true;
                }; 
            }
        }


};