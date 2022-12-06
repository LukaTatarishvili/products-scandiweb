<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav float-right">
                    <?php 
            if (strpos(URL,'create') == false) {
            ?>

                    <a href="create.php" class="btn btn-primary mr-3">Add</a>
                    <button id="delete-product-btn" class="btn btn-danger">Mass Delete</button>

                    <?php 
            }else{ 
            ?>
                    <form id="create-form" method="POST">
                        <div>
                            <input type="button" class="btn btn-primary mr-3 store-product-btn" value="Save" name="submit">
                            <a href="./" class="btn btn-secondary">Cancel</a>
                        </div>

                        <?php } ?>



                </ul>
            </nav>
            <h3 class="text-muted"><?php echo SITE_TITLE; ?></h3>
        </div>
<?php displayMessage();?>