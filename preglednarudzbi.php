<?php
// session_start();
// $product_ids = array();
session_start();
if (!isset($_SESSION['login'])) { //ako nisu uneseni podaci nemoguce je pristupiti ovoj stranici
    header("Location: start.php");
}
include('database.php');
include('bootstrap.php');
include('style.css');
$errors = array('greska' => '');

$result = $connection->query("SELECT id, name, surname, address, contact_phone, quantity, price, id_narudzbe, details_of_order, GROUP_CONCAT(quantity, ' ', title SEPARATOR ', ') as 'narudzba', GROUP_CONCAT(title, ': ', details_of_order SEPARATOR '; ') as 'detalji', SUM(price*quantity) as 'Cijena' FROM narudzbe GROUP BY id_narudzbe ORDER BY created_at DESC");
// $sql = 'SELECT name, surname, address, contact_phone, GROUP_CONCAT(quantity, title SEPARATOR ", ",) as "narudzba" FROM narudzbe GROUP BY name, surname, address, contact_phone, created_at';

//make query and get result


//fetch the resulting rows as an array
$narudzbeadminu = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory
mysqli_free_result($result);
//close connection
// mysqli_close($connection);
if (isset($_POST['obrisatinarudzbu'])) {
    $id_to_delete = mysqli_real_escape_string($connection, $_POST['id_to_delete']);
    $sql = "DELETE FROM narudzbe WHERE id_narudzbe = $id_to_delete";

    if (mysqli_query($connection, $sql)) {
        //success
        $errors['greska'] = 'Uspješno obrisana narudžba!';

        $result = $connection->query("SELECT id, name, surname, address, contact_phone, id_narudzbe, details_of_order, GROUP_CONCAT(quantity,' ', title SEPARATOR ', ') as 'narudzba', GROUP_CONCAT(title, ': ', details_of_order SEPARATOR '; ') as 'detalji', SUM(price*quantity) as 'Cijena' FROM narudzbe GROUP BY id_narudzbe ORDER BY created_at DESC");

        //make query and get result
        //fetch the resulting rows as an array
        $narudzbeadminu = mysqli_fetch_all($result, MYSQLI_ASSOC);

    } else {
        //failure
        echo 'query error:' . mysqli_error($connection);
    }
}

//check GET request id parameters
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    //make sql
    $sql = "SELECT *  FROM narudzbe WHERE id = $id";

    //get the query result
    $result = mysqli_query($connection, $sql);

    //fetch result in array format
    $narudzbe = mysqli_fetch_assoc($results);
    mysqli_free_result($results);
    mysqli_close($connection);

}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

</head>

<body class="pozadina">
<nav class="navbar navbar-expand-sm px-0" id="nazad">
    <a id="hover" class="navbar-brand font-weight-bold px-3 rounded-pill d-none d-md-block" href="index.php">&nbsp;Bektaš<br>Slastice</a>

    <div class="row mx-auto text-center">
        <div class="col-md-12">

            <a class="text-decoration-none" href="index.php" data-toggle="popover" data-placement="left"
               data-trigger="hover" data-content="Početna"><h1 class="font-weight-bold" id="navbarpregleda">
                    Narudžbe</h1></a>
        </div>
    </div>
    <a id="hover" class="navbar-brand font-weight-bold px-3 rounded-pill d-none d-md-block" href="index.php">&nbsp;Bektaš<br>Slastice</a>

</nav>
<div class="greska text-center font-weight-bold"><?php echo $errors['greska']; ?></div>

<?php


?>
<div class="container mt-2">
    <div class="row d-flex justify-content-center">

        <?php foreach ($narudzbeadminu as $narudzba):
            $total = 0; ?>

            <div class="col-10 mb-2">


                <div class="card rounded pt-4" id="okvirkarticeupregledu">

                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-md-3">
                                <h5 class="font-weight-bold font-italic">Ime:</h5>
                            </div>
                            <div class="col-12 col-md-9">
                                <h5 class="font-weight-bold"><?php echo htmlspecialchars($narudzba['name']); ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <h5 class="font-weight-bold font-italic">Prezime:</h5>
                            </div>
                            <div class="col-12 col-md-9">
                                <h5 class="font-weight-bold"><?php echo htmlspecialchars($narudzba['surname']); ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <h5 class="font-weight-bold font-italic">Adresa:</h5>
                            </div>
                            <div class="col-12 col-md-9">
                                <h5 class="font-weight-bold"><?php echo htmlspecialchars($narudzba['address']); ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <h5 class="font-weight-bold font-italic">Telefon:</h5>
                            </div>
                            <div class="col-12 col-md-9">
                                <h5 class="font-weight-bold"><?php
                                    echo htmlspecialchars($narudzba['contact_phone']);

                                    ?></h5>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <h5 class="font-weight-bold font-italic">Cijena:</h5>
                            </div>
                            <div class="col-12 col-md-9">
                                <h5 class="font-weight-bold"><?php echo htmlspecialchars($narudzba['Cijena']); ?>&nbsp;KM</h5>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer boja_footer">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <h5 class="font-weight-bold font-italic">Narudžba:</h5>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="text-left font-weight-bold"><?php echo htmlspecialchars($narudzba['narudzba']); ?></p>
                            </div>
                            <div class="col-12 col-md-3">
                                <h5 class="font-weight-bold font-italic">Detalji narudžbe:</h5>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="text-left font-weight-bold"><?php echo htmlspecialchars($narudzba['detalji']); ?></p>
                            </div>

                        </div>

                    </div>


                    <!-- delete form -->
                    <div class="row mt-3 mb-3 mx-auto">
                        <div class="col-12 col-md-6">
                            <form action="preglednarudzbi.php" method="POST" class="text-center">

                                <input type="hidden" name="id_to_delete" value="<?php echo $narudzba['id_narudzbe'] ?>">
                                <input type="submit" name="obrisatinarudzbu" value="Obriši"
                                       class="btn  text-uppercase font-weight-bold" id="delete">

                            </form>
                        </div>

                        <div class="col-12 col-md-6 text-center">

                            <a href="printnarudzbe.php?narudzba=<?php echo $narudzba['id_narudzbe']; ?>"
                               target="_blank">
                                <button class="btn text-uppercase font-weight-bold" id="print">Ispis</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>

    </div>
</div>

<div class="container text-right px-0">

    <a href="#nazad"><i class="fas fa-sort-up iconzapocetak"></i></a>
</div>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>
</body>
</html>