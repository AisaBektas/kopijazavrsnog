<?php
include('bootstrap.php');
include('styleuser.css');
session_start();
$product_ids = array();
include('database.php');

$query = "SELECT * FROM sveslastice ORDER BY id ASC";
$result = mysqli_query($connection, $query);

//$product_ids = array();if($result):


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
                'quantity' => filter_input(INPUT_POST, 'quantity'),
                'details_of_order' => filter_input(INPUT_POST, 'details_of_order')
            );

        } else {
            //product already exists
            //match array key to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++) {
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                    //add item quantity to the existing product in the array
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                    $_SESSION['shopping_cart'][$i]['details_of_order'] .= ', ' . filter_input(INPUT_POST, 'details_of_order');
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
            'quantity' => filter_input(INPUT_POST, 'quantity'),
            'details_of_order' => filter_input(INPUT_POST, 'details_of_order')
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
if (filter_input(INPUT_GET, 'action') == 'submit') {
    //loop through all products
    foreach ($_SESSION['shopping_cart'] as $key => $product) {
        if ($product['id'] == filter_input(INPUT_GET, 'id')) {
            //remove products
            show($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
//za svaki ulaz u korpu, korpa treba da bude prazna
if (filter_input(INPUT_GET, 'action') == 'gate') {


    if (filter_input(INPUT_POST, 'ulaz')) {
        if (isset($_SESSION['shopping_cart'])) {
            foreach ($_SESSION['shopping_cart'] as $key => $product) {

                unset($_SESSION['shopping_cart'][$key]);
            }
        }
    }
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
<body class="pozadinauser">
<div id="navbaruser">
    <?php include('headerkorpa.php'); ?>
</div>
<div style="clear:both"></div>
<br/>
<div class="container mt-5 pt-5">
    <div class="row">

        <div class="table-responsive">
            <table class="table text_table">
                <tr>
                    <th colspan="6"><h3>Detalji narudžbe</h3></th>
                </tr>
                <tr>
                    <th class="col w-50">Naziv poslastice</th>
                    <th class="col w-50">Izbor kupca</th>
                    <th class="col">Količina</th>
                    <th class="col">Cijena</th>
                    <th class="col">Ukupno</th>
                    <th class="col">Mogućnost</th>
                </tr>
                <?php


                if (!empty($_SESSION['shopping_cart'])):

                    $total = 0;
                    foreach ($_SESSION['shopping_cart'] as $key => $product):

                        ?>
                        <tr>
                            <td><?php echo $product['title']; ?></td>
                            <td><?php echo $product['details_of_order']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td><?php echo $product['price']; ?>&nbsp;KM</td>
                            <td><?php echo number_format((float)$product['quantity'] * (float)$product['price'], 2); ?>
                                &nbsp;KM
                            </td>
                            <td>
                                <a href="korpa.php?action=delete&id=<?php echo $product['id']; ?>">
                                    <div class="btn btn-danger">Obriši</div>
                                </a>
                            </td>
                        </tr>
                        <?php
                        $total = (float)$total + ((int)$product['quantity'] * (float)$product['price']);
                    endforeach;
                    ?>
                    <tr>
                        <td colspan="4" align="right">Račun:</td>
                        <td align="right"><?php echo number_format($total, 2); ?>&nbsp;KM</td>
                        <td></td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="6">

                            <?php
                            if (isset($_SESSION['shopping_cart'])):
                                if (count($_SESSION['shopping_cart']) > 0):
                                    ?>
                                    <a href="checkout.php" class="btn btn-success text_table px-5">Pošalji</a>

                                <?php endif; endif; ?>
                        </td>
                    </tr>

                <?php
                endif; ?>
            </table>
        </div>
        <div>
        </div>

        <div class="container pt-4">
            <div class="row">

                <?php


                if ($result):
                    if (mysqli_num_rows($result) > 0):
                        while ($product = mysqli_fetch_assoc($result)):
                            ?>
                            <div class="col-sm-6 col-md-3 mb-4 text-center">
                                <form method="post" action="korpa.php?action=add&id=<?php echo $product['id']; ?>">
                                    <div class="textcard bojatekstakartice font-italic color p-2">
                                        <img class="img-responsive img-fluid mx-auto d-block rounded-pill shadow p-1"
                                             id="velicina_slika_user" src="<?php echo $product['picture']; ?>"/>
                                        <h4 class="text-center font-weight-bold"><?php echo $product['title']; ?></h4>
                                        <h5 class="text-center font-weight-bold pt-3"><?php echo $product['price']; ?>
                                            &nbsp;KM</h5>
                                        <input type="text" name="quantity" class="form-control" value="1"/>
                                        <textarea type="text" name="details_of_order" class="form-control"
                                                  placeholder="unesite i količinu i ponudu koju ste odabrali"></textarea>
                                        <input type="hidden" name="title" value="<?php echo $product['title']; ?>"/>
                                        <input type="hidden" name="price" value="<?php echo $product['price']; ?>"/>
                                        <input type="submit" name="add_to_cart"
                                               class="btn rounded-pill font-weight-bold dodaj hover mt-2"
                                               value="Naruči"/>
                                    </div>
                                </form>
                            </div>
                        <?php
                        endwhile;
                    endif;
                endif;
                ?>


            </div>
        </div>
</body>
</html>