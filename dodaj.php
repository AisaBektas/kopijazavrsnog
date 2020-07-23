<?php
//radi kako treba samo timer mi nece kako ja hocu 
// ne koristim ovaj
include('database.php');
include('bootstrap.php');
include('style.css');

$title = $ingredients = $price = $picture = '';

// if (isset($_POST['close'])){
//   $title = $ingredients = $price = $picture = '';
//   header('Location: dodaj.php');
// }

if (isset($_POST['submit'])) {


    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $price = $_POST['price'];
    $picture = $_POST['picture'];
    $path = "images/" . $picture;
//create sql
    $sql = "INSERT INTO torteikolaci(title, ingredients, price, picture) VALUES('$title', '$ingredients', '$price', '$path')";
// save to db and check

    if (mysqli_query($connection, $sql)) {
//success
        $title = $ingredients = $price = $picture = '';

    } else {
        //error
        echo 'query error:' . mysqli_error($connection);
    }
//echo 'form is valid';


}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .swal-overlay {
            background-color: rgba(43, 165, 137, 0.45);
        }

        .swal-text {
            background-color: #330000;
            padding: 10px;
            border: 1px solid #330000;
            display: block;
            margin: 10px;
            text-align: center;
            color: #ffe6e6;
        }
    </style>
</head>
<body>

<div class="row text-center pb-3 pt-4">

    <div class="col-lg-4 col-md-4 col-sm-12 col-12 pb-4">
        <h1 class="text-color font-weight-bold fontmenu">Torte i kolači</h1>
        <img src="images/kolacizlog_300x200.jpg" class="bordermenu rounded-pill img-fluid shadow" alt="kolacimenu">

        <h3 class="mt-4">
            <button type="button" name="torteikolaci" class="btn rounded-pill px-5 font-weight-bold dodaj hover"
                    data-toggle="modal" data-target="#dodaj">Dodaj
            </button>
        </h3>
        <a href="pregled.php">
            <h3 class="mt-4">
                <button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal"
                        data-target="#">Pregled
                </button>
            </h3>
        </a>


        <!-- Modal -->
        <div class="modal fade" id="dodaj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-color">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold fontmenu">Torte i kolači</h5>

                    </div>
                    <div class="modal-body font-weight-bold text-left">

                        <form class="needs-validation" novalidate method="post">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Slika</label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="validationCustom01" data-browse="izaberi">Slika</label>
                                        <input type="file" class="custom-file-input form-control"
                                               id="validationCustom01" placeholder="Slika" name="picture"
                                               value="<?php echo htmlspecialchars($picture) ?>"
                                               required>
                                        <div class="valid-feedback">
                                            Prihvaćeno!
                                        </div>
                                        <div class="invalid-feedback">
                                            Unesite sliku.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Naslov</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="naslov"
                                           name="title" value="<?php echo htmlspecialchars($title) ?>"
                                           required>
                                    <div class="valid-feedback">
                                        Prihvaćeno!
                                    </div>
                                    <div class="invalid-feedback">
                                        Unesite naslov.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustomUsername">Sastojci</label>
                                    <div class="input-group">

                                        <input type="text" class="form-control" id="validationCustomUsername"
                                               placeholder="sastojci"
                                               aria-describedby="inputGroupPrepend" required name="ingredients"
                                               value="<?php echo htmlspecialchars($ingredients) ?>">

                                        <div class="valid-feedback">
                                            Prihvaćeno!
                                        </div>
                                        <div class="invalid-feedback">
                                            Unesite sastojke.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom03">Cijena</label>
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="cijena"
                                           required name="price" value="<?php echo htmlspecialchars($price) ?>">
                                    <div class="valid-feedback">
                                        Prihvaćeno!
                                    </div>
                                    <div class="invalid-feedback">
                                        Unesite cijenu.
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer dodaj">
                                <input class="btn btn-primary btn-sm dodaj hover" type="submit" name="submit"
                                       value="Snimi">

                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 pb-4">
        <h1 class="text-color font-weight-bold fontmenu">Pića</h1>
        <img src="images/caj12_300x200.jpg" class="bordermenu rounded-pill img-fluid shadow" alt="picamenu">
        <h3 class="mt-4">
            <button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal"
                    data-target="#dodaj">Dodaj
            </button>
        </h3>
        <a href="pregled.php">
            <h3 class="mt-4">
                <button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal"
                        data-target="#">Pregled
                </button>
            </h3>
        </a>

    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-12 pb-4">
        <h1 class="text-color font-weight-bold fontmenu">Peciva</h1>
        <img src="images/Palacinkathebest_300x200.jpg" class="bordermenu rounded-pill img-fluid shadow"
             alt="palacinkemenu">
        <h3 class="mt-4">
            <button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal"
                    data-target="#dodaj">Dodaj
            </button>
        </h3>
        <a href="pregled.php">
            <h3 class="mt-4">
                <button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover" data-toggle="modal"
                        data-target="#">Pregled
                </button>
            </h3>
        </a>

    </div>


</div>
<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
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
