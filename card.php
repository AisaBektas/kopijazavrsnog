<?php
//ne koristim ovaj file
include('bootstrap.php');
session_start();
$product_ids = array();
include('database.php');

$query = "SELECT * FROM torteikolaci ORDER BY id ASC";
$result = mysqli_query($connection, $query);

//$product_ids = array();
// session_destroy();
//check if add to Cart button has been submitted
if (filter_input(INPUT_POST, 'add_to_cart')) {
    if (isset($_SESSION['shopping_cart'])) {
        //keep track of how many product are in the shopping cart
        $count = count($_SESSION['shopping_cart']);
        //create sequantial array for matching array keys to product id's
        $product_ids = array_column($_SESSION['shopping_cart'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
            $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'title' => filter_input(INPUT_POST, 'title'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')

            );

        } else {
            //product already exists
            //match array key to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++) {
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                    //add item quantity to the existing product in the array
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');

                }
            }
        }
    } else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, start from key 0 and fill it with values
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'title' => filter_input(INPUT_POST, 'title'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')

        );

    }
}
if (filter_input(INPUT_GET, 'action') == 'delete') {
    //loop through all products
    foreach ($_SESSION['shopping_cart'] as $key => $product) {
        if ($product['id'] == filter_input(INPUT_GET, 'id')) {
            //remove products
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
//pre_r($_SESSION);
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <style>
        .products {
            border: 1px solid #333;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 16px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container pt-4">
    <div class="row">
        <?php

        // include('database.php');
        // include('bootstrap.php');
        include('database.php');


        if ($result):
            if (mysqli_num_rows($result) > 0):
                while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <div class="col-sm-4 col-md-3 mb-4">
                        <form method="post" action="card.php?action=add&id=<?php echo $product['id']; ?>">
                            <div class="products">
                                <img src="<?php echo $product['picture']; ?>" class="img-responsive img-fluid"/>
                                <h4 class="text-info"><?php echo $product['title']; ?></h4>
                                <h4>$ <?php echo $product['price']; ?></h4>
                                <input type="text" name="quantity" class="form-control" value="1"/>
                                <input type="hidden" name="title" value="<?php echo $product['title']; ?>"/>
                                <input type="hidden" name="price" value="<?php echo $product['price']; ?>"/>
                                <input type="submit" name="add_to_cart" class="btn btn-info mt-2" value="Add to Cart"/>
                            </div>
                        </form>
                    </div>
                <?php
                endwhile;
            endif;
        endif;
        ?>
        <div style="clear:both"></div>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th colspan="5"><h3>Order Details</h3></th>
                </tr>
                <tr>
                    <th width="40%">Product Name</th>
                    <th width="10%">Quantity</th>
                    <th width="20%">Price</th>
                    <th width="15%">Total</th>
                    <th width="5%">Action</th>
                </tr>
                <?php


                if (!empty($_SESSION['shopping_cart'])):

                    $total = 0;
                    foreach ($_SESSION['shopping_cart'] as $key => $product):

                        ?>
                        <tr>
                            <td><?php echo $product['title']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td>$ <?php echo $product['price']; ?></td>
                            <td>
                                $ <?php echo number_format((float)$product['quantity'] * (float)$product['price'], 2); ?></td>
                            <td>
                                <a href="card.php?action=delete&id=<?php echo $product['id']; ?>">
                                    <div class="btn btn-danger">Remove</div>
                                </a>
                            </td>
                        </tr>
                        <?php
                        $total = (float)$total + ((int)$product['quantity'] * (float)$product['price']);
                    endforeach;
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right">$ <?php echo number_format($total, 2); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <?php
                            if (isset($_SESSION['shopping_cart'])):
                                if (count($_SESSION['shopping_cart']) > 0):
                                    ?>
                                    <a href="#" class="button">Checkout</a>
                                <?php endif; endif; ?>
                        </td>
                    </tr>
                <?php
                endif;
                ?>
            </table>


        </div>
    </div>
</body>
</html>