<?php
include_once "config/init.php"; ?>
<?php
$output = [];
if ($_POST) {
    $data = $_POST["data"];
    $item = [];
    parse_str($data, $item);
    $data = [];
    $data["sku"] = $item["sku"];
    $data["name"] = $item["name"];
    $data["price"] = $item["price"];
    $data["product_type"] = $item["product_type"] ?? 0;
    $data["size"] = $item["size"];
    $data["width"] = $item["width"];
    $data["length"] = $item["length"];
    $data["weight"] = $item["weight"];
    $data["height"] = $item["height"];
    if (!$data["product_type"]) {
        $output["message"] = ["Please choose product type"];
        echo json_encode($output);
        return $output;
    }
    switch ($item["product_type"]) {
        case "1":
            $product = new DVD();
            break;
        case "2":
            $product = new Furniture();
            break;
        case "3":
            $product = new Book();
            break;
    } //
    if ($product->save($data) == "success") {
        $output["success"] = true;
    } else {
        $output["message"] = $product->save($data);
    }
    echo json_encode($output);
    return $output;
}
?>
<?php
$template = new Template("templates/product-create.php");
echo $template;

