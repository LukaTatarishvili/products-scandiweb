<?php 
include_once 'config/init.php'; ?>
<?php 
$product = new ProductQuery;
?>
<?php 

$template = new Template('templates/frontpage.php');
$template->title = 'Latest Products';
$template->products = $product->getAllProducts(); 

echo $template;
session_unset();
?>
