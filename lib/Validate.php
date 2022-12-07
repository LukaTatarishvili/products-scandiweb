<?php

class Validate
{

    protected $error = [];

    public function __construct()
    {
        $this->db = new Database();
    }

    public function validateSKU($data)
    {
        return !preg_match("/\s/", $data["sku"]) && strlen($data["sku"]) > 0;
    }

    public function validateName($data)
    {
        return strlen($data["name"]) > 0;
    }

    public function validatePrice($data)
    {
        return !(
            filter_var($data["price"], FILTER_VALIDATE_FLOAT) &&
            strlen($data["price"]) > 0 &&
            floatval($data["price"] >= 0)
        );
    }

    public function validateType($data)
    {
        return !(
            preg_match("/[1-3]/", $data["product_type"]) &&
            strlen($data["product_type"]) > 0
        );
    }

    public function validateSize($data)
    {
        return is_numeric($data["size"]) && floatval($data["size"] >= 0);
    }

    public function validateFurnitureSizes($data)
    {
        return is_numeric($data["height"]) &&
            is_numeric($data["width"]) &&
            is_numeric($data["length"]) &&
            floatval($data["height"] >= 0) &&
            floatval($data["width"] >= 0) &&
            floatval($data["length"] >= 0);
    }

    public function validateWeight($data)
    {
        return is_numeric($data["weight"]) && floatval($data["weight"] >= 0);
    }

    //

    public function validateBook($data)
    {
        if (!$this->validateSKU($data)) {
            $this->error["sku"] = "Invalid sku";
        }

        if (!$this->validateName($data)) {
            $this->error["name"] = "Invalid name";
        }

        if ($this->validatePrice($data)) {
            $this->error["price"] = "Invalid price";
        }

        if ($this->validateType($data)) {
            $this->error["type"] = "Invalid type";
        }
        if (!$this->validateWeight($data)) {
            $this->error["weight"] = "Invalid weight";
        }

        return $this->error;
    }

    public function validateDVD($data)
    {
        if (!$this->validateSKU($data)) {
            $this->error["sku"] = "Invalid sku";
        }

        if (!$this->validateName($data)) {
            $this->error["name"] = "Invalid name";
        }

        if ($this->validatePrice($data)) {
            $this->error["price"] = "Invalid price";
        }

        if ($this->validateType($data)) {
            $this->error["type"] = "Invalid type";
        }
        if (!$this->validateSize($data)) {
            $this->error["size"] = "Invalid Size";
        }

        return $this->error;
    }

    public function validateFurniture($data)
    {
        if (!$this->validateSKU($data)) {
            $this->error["sku"] = "Invalid sku";
        }

        if (!$this->validateName($data)) {
            $this->error["name"] = "Invalid name";
        }

        if ($this->validatePrice($data)) {
            $this->error["price"] = "Invalid price";
        }

        if ($this->validateType($data)) {
            $this->error["type"] = "Invalid type";
        }
        if (!$this->validateFurnitureSizes($data)) {
            $this->error["furniture"] = "Invalid Furniture sizes";
        }

        return $this->error;
    }
}
