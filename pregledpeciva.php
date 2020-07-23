<?php
session_start();
if (!isset($_SESSION['login'])) { //ako nisu uneseni podaci nemoguce je pristupiti ovoj stranici
    header("Location: start.php");
}
include('database.php');
include('bootstrap.php');
include('style.css');
$errors = array('greska' => '');
$title = $ingredients = $price = $picture = '';

//radi kako treba i koristim ovaj file

if (isset($_POST['submit'])) {


    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $price = $_POST['price'];
    $type = $_POST['vrsta'];
    $picture = $_POST['picture'];
    $path = "images/" . $picture;
//create sql
    $sql = "INSERT INTO sveslastice (title, ingredients, price, picture, type) VALUES('$title', '$ingredients', '$price', '$path', '$type')";
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
// $result = $connection->query("SELECT title, ingredients, price, picture, id FROM torteikolaci ORDER BY created_at");
$sql = 'SELECT title, ingredients, price, picture, type, id FROM sveslastice WHERE type IN ("peciva i palačinke") ORDER BY id DESC';

//make query and get result
$result = mysqli_query($connection, $sql);

//fetch the resulting rows as an array
$slastice = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory
mysqli_free_result($result);
//close connection
// mysqli_close($connection);
if (isset($_POST['obrisati'])) {
    $id_to_delete = mysqli_real_escape_string($connection, $_POST['id_to_delete']);
    $sql = "DELETE FROM sveslastice WHERE id = $id_to_delete";

    if (mysqli_query($connection, $sql)) {
        //success
        $errors['greska'] = 'Uspješno obrisana slastica!';

        $sql = 'SELECT title, ingredients, price, picture, type, id FROM sveslastice WHERE type IN ("peciva i palačinke") ORDER BY id DESC';

        //make query and get result
        $result = mysqli_query($connection, $sql);

        //fetch the resulting rows as an array
        $slastice = mysqli_fetch_all($result, MYSQLI_ASSOC);

    } else {
        //failure
        echo 'query error:' . mysqli_error($connection);
    }
}
//check GET request id parameters
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    //make sql
    $sql = "SELECT *  FROM sveslastice WHERE id = $id";

    //get the query result
    $result = mysqli_query($connection, $sql);

    //fetch result in array format
    $sweet = mysqli_fetch_assoc($results);
    mysqli_free_result($results);
    mysqli_close($connection);

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body class="pozadina">
<nav class="navbar navbar-expand-sm px-0" id="nazad">
    <a id="hover" class="navbar-brand font-weight-bold px-3 rounded-pill d-none d-md-block" href="index.php">&nbsp;Bektaš<br>Slastice</a>

    <div class="row mx-auto text-center">
        <div class="col-md-12">

            <a class="text-decoration-none" href="index.php" data-toggle="popover" data-placement="left"
               data-trigger="hover" data-content="Početna"><h1 class="font-weight-bold" id="navbarpregleda">Palačinke i
                    peciva</h1></a>
        </div>
    </div>
    <a id="hover" class="navbar-brand font-weight-bold px-3 rounded-pill d-none d-md-block" href="index.php">&nbsp;Bektaš<br>Slastice</a>

</nav>

<div class="col-md-12 text-center mt-1">
    <button type="button" name="torteikolaci" class="btn rounded-pill px-5 font-weight-bold dodaj hover"
            data-toggle="modal" data-target="#dodaj">Dodaj
    </button>
    <div class="modal fade" id="dodaj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-color">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold fontmenu">Slastice</h5>
                </div>
                <div class="modal-body font-weight-bold text-left">

                    <form class="needs-validation" novalidate method="post">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Slika</label>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="validationCustom01" data-browse="izaberi">Slika</label>
                                    <input type="file" class="custom-file-input form-control" id="validationCustom01"
                                           placeholder="Slika" name="picture"
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
                                <label for="validationCustomUsername">Ponuda</label>
                                <div class="input-group">

                                    <input type="text" class="form-control" id="validationCustomUsername"
                                           placeholder="ponuda"
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

                            <div class="col-md-12 mb-3">
                                <input type="radio" id="tortedva" name="vrsta" value="torte" required>
                                <label for="male">Torte</label><br>
                                <input type="radio" id="kolacidva" name="vrsta" value="kolači" required>
                                <label for="male">Kolači</label><br>
                                <input type="radio" id="pip" name="vrsta" value="peciva i palačinke" required>
                                <label for="female">Palačinke i peciva</label><br>
                                <input type="radio" id="p" name="vrsta" value="pića" required>
                                <label for="other">Pića</label>
                                <div class="valid-feedback">
                                    Prihvaćeno!
                                </div>
                                <div class="invalid-feedback">
                                    Odaberite vrstu slastice.
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer dodaj">
                            <input class="btn btn-primary btn-sm dodaj hover" type="submit" name="submit" value="Snimi">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="greska text-center font-weight-bold"><?php echo $errors['greska']; ?></div>
<div class="container mt-2">
    <div class="row">

        <?php foreach ($slastice as $slastica): ?>

            <div class="col-md-4 pb-4">


                <div class="card rounded font-italic pt-4" id="okvirkarticeupregledu">

                    <img id="velicina_slika" class="img-fluid mx-auto d-block rounded-pill shadow okvirslike"
                         src="<?php echo($slastica['picture']); ?>" alt="cokotorta">

                    <div class="card-body velicina_kartice">

                        <h5 class="text-center font-weight-bold"><?php echo htmlspecialchars($slastica['title']); ?></h5>
                        <p class="card-text">Ponuda:</p>
                        <ul>
                            <?php foreach (explode(',', $slastica['ingredients']) as $ing): ?>
                                <li>
                                    <?php echo htmlspecialchars($ing); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                    <div class="card-footer boja_footer">
                        <p class="text-right font-weight-bold"><?php echo htmlspecialchars($slastica['price']); ?>&nbsp;KM</p>

                    </div>
                    <!-- delete form -->
                    <form action="pregledpeciva.php" method="POST" class="text-center mt-3 mb-3">
                        <input type="hidden" name="id_to_delete" value="<?php echo $slastica['id'] ?>">
                        <input type="submit" name="obrisati" value="Obriši"
                               class="btn px-5 text-uppercase font-weight-bold" id="delete">
                    </form>

                </div>

            </div>

        <?php endforeach; ?>


    </div>
</div>
<div class="container text-right">

    <a href="#nazad"><i class="fas fa-sort-up iconzapocetak"></i></a>
</div>

<script src="https://kit.fontawesome.com/98d1cb884c.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
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
