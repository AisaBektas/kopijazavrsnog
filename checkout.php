<?php
include('bootstrap.php');
include('styleuser.css');
session_start();
$product_ids = array();
include('database.php');

// $query = "SELECT * FROM torteikolaci ORDER BY id ASC"; ...
// $result = mysqli_query($connection, $query); ...
//$product_ids = array();


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
$errors = array('greska' => '');
$name = $surname = $address = $contact_phone = '';
// if (isset($_POST['submitorder'])){
if (filter_input(INPUT_POST, 'submit')) {
// if(filter_input(INPUT_GET, 'action') == 'submit'){

    foreach ($_SESSION['shopping_cart'] as $key => $product) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $address = $_POST['address'];
        $contact_phone = $_POST['contact_phone'];
        $id_narudzbe = mysqli_thread_id($connection);

        //create sql
        $sql = "INSERT INTO narudzbe(name, surname, address, contact_phone, title, price, quantity, id_narudzbe, details_of_order) VALUES('$name', '$surname', '$address', '$contact_phone', '$product[title]', '$product[price]', '$product[quantity]', '$id_narudzbe', '$product[details_of_order]')";


        if (mysqli_query($connection, $sql)) {
            $errors['greska'] = 'Uspješno poslana narudžba!<br>Očekujte poziv za preuzimanje narudžbe!';
//success
            //show($_SESSION['shopping_cart'][$key]);
            $name = $surname = $address = $contact_phone = '';
            unset($_SESSION['shopping_cart'][$key]);
        } else {
            //error
            echo 'query error:' . mysqli_error($connection);
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
        .r {
            margin-top: 100px;
        }
    </style>
</head>
<body class="pozadinauser d-flex align-items-center justify-content-center">
<div id="navbaruser">
    <?php include('headerkorpa.php'); ?>
</div>

<div class="container color r pt-5 px-5">
    <div class="row">
        <div class="table-responsive">
            <div class="text-center font-weight-bold bojateksta pb-4"><?php echo $errors['greska']; ?></div>

            <form class="needs-validation" novalidate method="post" action="checkout.php?action=submit">
                <table class="table bojateksta">

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="bojateksta" for="validationCustom02">Ime</label>

                            <input type="text" class="form-control" id="validationCustom02" placeholder="ime"
                                   name="name" value="<?php echo htmlspecialchars($name) ?>"
                                   required>
                            <div class="valid-feedback">
                                Prihvaćeno!
                            </div>
                            <div class="invalid-feedback">
                                Unesite vaše ime.
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="bojateksta" for="validationCustomUsername">Prezime</label>


                            <input type="text" class="form-control" id="validationCustomUsername" placeholder="prezime"
                                   aria-describedby="inputGroupPrepend" required name="surname"
                                   value="<?php echo htmlspecialchars($surname) ?>">

                            <div class="valid-feedback">
                                Prihvaćeno!
                            </div>
                            <div class="invalid-feedback">
                                Unesite vaše prezime.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="bojateksta" for="validationCustomUsername">Kontakt telefon</label>
                            <div class="input-group">

                                <input type="text" class="form-control" id="validationCustomUsername"
                                       placeholder="kontakt telefon"
                                       aria-describedby="inputGroupPrepend" required name="contact_phone"
                                       value="<?php echo htmlspecialchars($contact_phone) ?>">

                                <div class="valid-feedback">
                                    Prihvaćeno!
                                </div>
                                <div class="invalid-feedback">
                                    Unesite vaš kontakt telefon.
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="bojateksta" for="validationCustomUsername">Adresa</label>
                            <div class="input-group">

                                <input type="text" class="form-control" id="validationCustomUsername"
                                       placeholder="adresa"
                                       aria-describedby="inputGroupPrepend" required name="address"
                                       value="<?php echo htmlspecialchars($address) ?>">

                                <div class="valid-feedback">
                                    Prihvaćeno!
                                </div>
                                <div class="invalid-feedback">
                                    Unesite vašu adresu.
                                </div>
                            </div>
                        </div>

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
                                        <div class="btn btn-danger px-5">Obriši</div>
                                    </a>
                                </td>
                            </tr>
                            <?php

                            $total = (float)$total + ((int)$product['quantity'] * (float)$product['price']);
                        endforeach;
                        ?>
                        <tr>
                            <td class="text-right" colspan="4">Račun:</td>
                            <td><?php echo number_format($total, 2); ?>&nbsp;KM</td>
                            <td class="text-right"><input type="submit" name="submit"
                                                          class="btn btn-success text_table px-5" value="Naruči"/></td>

                        </tr>
                </table>

            </form>
            <div class="text-center font-weight-bold bojateksta pb-4">Plaćanje pri preuzimanju!</div>
        </div>
    </div>
    <script>
        (function () {
            'use strict';
            window.addEventListener('load', function () {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        if (form.checkValidity() === true) {
                            swal("Snimljeno!", {
                                buttons: false,

                            });
                        }
                        form.classList.add('was-validated');

                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>