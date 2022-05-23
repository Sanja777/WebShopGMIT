<?php include "includes/database.php" ?><!doctype html>
<html lang="en">

<head>
    <!-- standard meta tags -->
    <?php include "includes/meta.php" ?>
    <!-- page title -->
    <title>Products - GMIT Web Shop</title>
    <script>
        // function executed when the value of the quantity changes
        function onQuantityChange(productID){
            var price = document.getElementById("price" + productID).innerText;
            var elQuantity = document.getElementById("quantity" + productID);
            var elTotal = document.getElementById("total" + productID)
            var elOrderTotal = document.getElementById("orderTotal")
            quantity = Math.abs(Math.trunc(elQuantity.value));
            if(quantity != elQuantity.value){
                // we need to fix the quantity value, this will trigger another changee event
                elQuantity.value = quantity;
                return;
            } else {
                // we don't need to fix the value 
                elTotal.innerText = parseFloat(quantity * price).toFixed(2);
            }
            // calculcate the order total
            // get the array of all the total label elements
            var orderTotal = 0;
            var arElTotal = document.querySelectorAll("label[id^='total']");
            for(var i=0;i<arElTotal.length;i++){
                var productTotal = parseFloat(arElTotal[i].innerText);
                if( productTotal > 0){
                    orderTotal += productTotal;
                }
            }
            elOrderTotal.innerText = parseFloat(orderTotal).toFixed(2);
            document.getElementById("OrderTotal").value = elOrderTotal.innerText;
        }
    </script>
</head>

<body>
    <!-- header menu -->
    <?php include "includes/header.php" ?>
    <!-- page title  -->
    <h1><?php 
    $orderCompleted = count($_POST)>0;
    echo $orderCompleted?'Order details':'Products' 
    ?></h1>
    <!-- lsit of products with "Purchase" button -->
    <?php
    // fetch will get random 3 images as its ordered by rand() and limit is 3
    $products = fetch_data("product", ["ProductID", "Name", "Description", "Price"], "", "");
    $isFirst = true;
    
    if (is_array($products)) {
        
    ?>
    <form method="post">
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <?php
        foreach($products as $data)
        {
            if( $orderCompleted && ($_POST['quantity' . $data['ProductID']]??0) <= 0 ){
                continue;
            }
        ?>
        <div class="col<?php echo $orderCompleted?'-12':'' ?>">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><?php echo $data['Name']??''; ?></h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title <?php echo $orderCompleted?'small':'' ?>"><span id="price<?php echo $data['ProductID']??''; ?>"><?php echo $data['Price']??''; ?></span>€</h1>
                    <p><?php echo $data['Description']??''; ?></p>
                    <input type="hidden" name="ProductID" value="<?php echo $data['ProductID']??''; ?>">
                    <?php 
                    if ($orderCompleted) {
                    ?>
                    Quantity: <?php echo $_POST['quantity' . $data['ProductID']]??''; ?><br>
                    Total: <?php echo ( bcmul (($_POST['quantity' . $data['ProductID']]??0), $data['Price'], 2) ); ?><br>
                    <?php 
                    }
                    else {
                    ?>
                    <input onchange="onQuantityChange(<?php echo $data['ProductID']??''; ?>)" name="quantity<?php echo $data['ProductID']??''; ?>" id="quantity<?php echo $data['ProductID']??''; ?>" min="0" step="1" type="number" class="form-control" placeholder="Enter quantity">
                    <div class="row">
                        <div class="col-6">Total: </div>
                        <div class="col-6"><label id="total<?php echo $data['ProductID']??''; ?>">0</label>€</div>
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
        <div class="col-6"><h2>Order total: <span id="orderTotal"><?php echo $_POST['OrderTotal']??'0'; ?></span>€</h2></div>
        <?php
        if($orderCompleted == false)
        {
        ?>
        <div class="col-6"><button type="submit" class="btn btn-lg btn-outline-primary">Purchase</button></div>
        <?php
        }
        ?>
    </div>
    <hr>
    </form>
    <?php
    }
    ?>
    

    <?php include "includes/js.php" ?>
</body>

</html>