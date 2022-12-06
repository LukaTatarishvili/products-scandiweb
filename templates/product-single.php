<?php include 'inc/header.php' ?>
<h2 class="page-header"><?php echo $product->product_title; ?>  - City: (<?php echo $product->location; ?>) </h2>

<small>Posted By <?php echo $product->contact_user; ?> on <?php echo $product->post_date; ?></small>
<hr>
<p class="lead"><?php echo $product->description; ?></p>
<ul class="list-group">
	<li class="list-group-item"><strong>Company:</strong> <?php echo $product->company; ?></li>
	<li class="list-group-item"><strong>Salary:</strong> <?php echo $product->salary; ?></li>
	<li class="list-group-item"><strong>Email:</strong> <?php echo $product->contact_email; ?></li>


</ul>
<br><br>
<a href="index.php">Go Back</a>
<div class="well">
	<a  class="btn btn-primary" href="edit.php?id=<?php echo $product->id; ?>" >Edit</a>
	<form style="display: inline;" method="post" action="product.php">
		<input type="hidden" name="del_id" value="<?php echo $product->id; ?>">
		<input type="submit" class="btn btn-danger" value="Delete">
	</form>
</div>

<?php include 'inc/footer.php' ?>
