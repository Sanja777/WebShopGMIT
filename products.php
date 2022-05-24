<?php include "includes/database.php" ?>
<!doctype html>
<html lang="en">

<head>
    <!-- standard meta tags -->
    <?php include "includes/meta.php" ?>
    <!-- page title -->
    <title>Products - GMIT Web Shop</title>
    <script src="js/products.js"></script>
    <script>
        // function executed when the value of the quantity changes
    </script>
</head>

<body>
    <!-- header menu -->
    <?php include "includes/header.php" ?>
    <!-- page title  -->
    <h1><?php
        $orderCompleted = count($_POST) > 0;
        echo $orderCompleted ? 'Order details' : 'Products'
        ?></h1>
    <!-- lsit of products with "Purchase" button -->
    <?php
    // fetch will get random 3 images as its ordered by rand() and limit is 3
    $products = fetch_data("product", ["ProductID", "Name", "Description", "Price"], "", "");
    $isFirst = true;

    if (is_array($products)) {

    ?>
        <form method="post" id="orderForm">
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <?php
                foreach ($products as $data) {
                    if ($orderCompleted && ($_POST['quantity' . $data['ProductID']] ?? 0) <= 0) {
                        continue;
                    }
                ?>
                    <div class="col<?php echo $orderCompleted ? '-12' : '' ?>">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal"><?php echo $data['Name'] ?? ''; ?></h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title <?php echo $orderCompleted ? 'small' : '' ?>"><span id="price<?php echo $data['ProductID'] ?? ''; ?>"><?php echo $data['Price'] ?? ''; ?></span>€</h1>
                                <p><?php echo $data['Description'] ?? ''; ?></p>
                                <input type="hidden" name="ProductID" value="<?php echo $data['ProductID'] ?? ''; ?>">
                                <?php
                                if ($orderCompleted) {
                                ?>
                                    Quantity: <?php echo $_POST['quantity' . $data['ProductID']] ?? ''; ?><br>
                                    Total: <?php echo (bcmul(($_POST['quantity' . $data['ProductID']] ?? 0), $data['Price'], 2)); ?><br>
                                <?php
                                } else {
                                ?>
                                    <input onchange="onQuantityChange(<?php echo $data['ProductID'] ?? ''; ?>)" name="quantity<?php echo $data['ProductID'] ?? ''; ?>" id="quantity<?php echo $data['ProductID'] ?? ''; ?>" min="0" step="1" type="number" class="form-control" placeholder="Enter quantity">
                                    <div class="row">
                                        <div class="col-6">Total: </div>
                                        <div class="col-6"><label id="total<?php echo $data['ProductID'] ?? ''; ?>">0</label>€</div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php
                    $isFirst = false;
                }
                ?>
            </div>
            <div class="row">
                <input type="hidden" id="OrderTotal" name="OrderTotal" value="0">
                <div class="col-6">
                    <h2>Order total: <span id="orderTotal"><?php echo $_POST['OrderTotal'] ?? '0'; ?></span>€</h2>
                </div>
                <?php
                if ($orderCompleted == false) {
                ?>
                    <div class="col-6">
                        <button type="button" onclick="onShowModal()" class="btn btn-lg btn-outline-primary" data-toggle="modal" data-target="#loginModal">Purchase</button>
                    </div>



                    <!--<div class="text-center">
                        <a href="" onclick="onShowModal()" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Launch
                            Modal Login Form</a>
                    </div>-->
                <?php
                }
                ?>
            </div>
            <hr>
        </form>
    <?php
    }
    ?>

    <div class="modal fade" tabindex="-1" role="dialog" id="loginModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign in to complete purchase</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="username" class="form-control" placeholder="Enter your email" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <p id="error" class="text-danger"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="onLogin()">Sign in</button>
                </div>
            </div>
        </div>
    </div>


    <?php include "includes/js.php" ?>
</body>

</html>