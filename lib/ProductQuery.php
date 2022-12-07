<?php
class ProductQuery
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProducts()
    {
        $this->db->query("SELECT * from products");
        $results = $this->db->resultSet();

        return $results;
    }

    public function delete($del_ids)
    {
        $this->db->query("DELETE FROM products WHERE id IN($del_ids)");
        if ($this->db->execute()) {
            return true;
        } else {
            return true;
        }
    }
}
