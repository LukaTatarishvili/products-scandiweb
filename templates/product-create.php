<?php include 'inc/header.php' ?>
<div class="container pt-5">

<?php 
    if(isset($products)){
?>

        <div class="alert alert-info" role="alert">
            
            <?php $products?>
        </div>

    <?php 
    }
    ?>

    
    
    <span id="validation-alert" class="text-danger" ></span>
       
    <div class="float-left">


        <div class="form-group row">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="sku" id="sku" placeholder="SKU">
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="price" id="price" placeholder="Price">
            </div>
        </div>
        <div class="form-group row">
            <label for="productType" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
                <select class="form-control" name="product_type" id="productType">
                    <option value="0" selected disabled hidden>Select type</option>
                    <option id="dvd" value="1">DVD</option>
                    <option id="furniture" value="2">furniture</option>
                    <option id="book" value="3">Book</option>
                </select>
            </div>
        </div>

        <div id="dvd-container">
            <div class="form-group row">
                <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="size" id="size" placeholder="Size">
                </div>
            </div>
        </div>
        <div class="furniture-row" id="furniture-container">
            <div class="form-group row">
                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="height" id="height" placeholder="Height">
                </div>
            </div>

            <div class="form-group row">
                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="width" id="width" placeholder="Width">
                </div>
            </div>

            <div class="form-group row">
                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="length" id="length" placeholder="Length">
                </div>
            </div>
        </div>

        <div id="book-container">
            <div class="form-group row">
                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight">
                </div>
            </div>
        </div>


    </div>




    </form>
    <!-- end create form -->




</div>
<script>
$("#productType").change(function() {
    // console.log($("#productType option:selected").attr("id"))
    let container_id = $(this).find('option:selected').attr('id');
    $('*[id*=-container]').hide();
    $("#" + container_id + "-container").show();
});



$(document).on('click', '.store-product-btn', function() {

    var action = "store";
    let data = $("#create-form").serialize()
    if (data) {
        
    }
    $.ajax({
        url: "create.php",
        method: "POST",
        data: {
            data: data,
            action: action
        },
        success: function(response) {
            response = jQuery.parseJSON(response);

            if (response) {
                let message = "";
                $.map(response.message, function(val, key) { message += val + "<br>" });
                $("#validation-alert").html(message)
            }
            if (response.success) {
                document.location.href="./";
            }
            
            


        }
    });
});




</script>
<?php include 'inc/footer.php' ?>