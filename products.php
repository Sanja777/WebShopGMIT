<?php include "includes/database.php" ?><!doctype html>
<html lang="en">

<head>
    <!-- standard meta tags -->
    <?php include "includes/meta.php" ?>
    <!-- page title -->
    <title>Home - GMIT Web Shop</title>
</head>

<body>
    <!-- header menu -->
    <?php include "includes/header.php" ?>
    <!-- page title  -->
    <h1>Products</h1>
    <!-- lsit of products with "Purchase" button -->
    <?php
    // fetch will get random 3 images as its ordered by rand() and limit is 3
    $products = fetch_data("product", ["ProductID", "Name", "Description", "Price"], "", "");
    $isFirst = true;
    if (is_array($products)) {
        
    ?>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <?php
        foreach($products as $data)
        {
        ?>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><?php echo $data['Title']??''; ?></h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$<?php echo $data['Price']??''; ?></h1>
                    <p><?php echo $data['Description']??''; ?></p>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Add to basket</button>
                </div>
            </div>
        </div>
        <?php
            $isFirst = false;
            }
        ?>
    </div>
    <?php
    }
    ?>
    

    <?php include "includes/js.php" ?>
</body>

</html>