<?php include 'inc/header.php' ?>


<div class="flex-parent">
    <form id="delete-form" action="delete-product.php" method="post">
        <?php foreach($products as $product): ?>

        <div class="card box">
            <div class="card-body">
                <input type="checkbox" name="delete-checkbox" value="<?php echo $product->id ?>"
                    class="delete-checkbox">
                <div><?php echo $product->sku; ?></div>
                <div><?php echo $product->name; ?></div>
                <div><?php echo $product->price; ?></div>
                <?php 
                  if ($product->size) {
                    echo "Size: $product->size";
                  }elseif ($product->weight) {
                    echo "Weight: $product->weight";
                  }elseif ($product->height && $product->width && $product->length){
                    echo "Dimensions: $product->height X $product->width X $product->length";
                  }
                ?>
            </div>
        </div>

        <?php endforeach; ?>
    </form>

</div>

<script>
$(document).on('click', '#delete-product-btn', function() {

    var action = "Delete";
    const product_ids = [];

    $('input[name="delete-checkbox"]:checked').each(function() {
        product_ids.push(this.value);
    });

    $.ajax({
        url: "delete-product.php",
        method: "POST",
        data: {
            product_ids: product_ids,
            action: action
        },
        success: function(response) {
            response = jQuery.parseJSON(response);
            response.ids.forEach(element => {
                console.log(element)
                $(":checkbox[value=" + element + "]").closest(".card").hide();
            });


        }
    });
});
</script>

<?php include 'inc/footer.php' ?>