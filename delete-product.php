<?php include_once 'config/init.php'; ?>

<?php 

$product = new ProductQuery;
$output = [];
if($_POST["action"] == "Delete")  
{  
	$ids = $_POST['product_ids'];
	$del_ids = implode(',', $ids);
	if ($product->delete($del_ids)) {
		$output['success'] = true;
		$output['ids'] = $ids;
	}else{
		$output['success'] = false;
	}

	
	echo json_encode($output);
	return $output;
} 


?>

