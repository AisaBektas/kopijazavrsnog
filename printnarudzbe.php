<?php
session_start();
if (!isset($_SESSION['login'])) { //ako nisu uneseni podaci nemoguce je pristupiti ovoj stranici
    header("Location: start.php");
}
include('database.php');
include('bootstrap.php');
include('style.css');
$pid = $_GET['narudzba'];
$sql = "SELECT id, name, surname, address, contact_phone, quantity, price, id_narudzbe, GROUP_CONCAT(quantity,' ', title SEPARATOR ', ') as 'narudzba', GROUP_CONCAT(title,': ', details_of_order SEPARATOR ', ') as 'detalji', SUM(price*quantity) as 'Cijena' FROM narudzbe WHERE id_narudzbe='$pid' GROUP BY id_narudzbe";
$rs = $connection->query($sql);
while ($row = $rs->fetch_assoc())
{
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        print();

    </script>
</head>
<body>
<h3 class="text-center fontmenu">Bektaš Slastice</h3>


<div class="col-12 mt-3">


    <div class="card rounded pt-4" id="okvirkarticeupregledu">

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-2">
                    <h5 class="font-weight-bold">Ime:</h5>
                </div>
                <div class="col-12 col-md-10">
                    <h5 class="font-weight-bold"><?php echo htmlspecialchars($row['name']); ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-2">
                    <h5 class="font-weight-bold">Prezime:</h5>
                </div>
                <div class="col-12 col-md-10">
                    <h5 class="font-weight-bold"><?php echo htmlspecialchars($row['surname']); ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-2">
                    <h5 class="font-weight-bold">Adresa:</h5>
                </div>
                <div class="col-12 col-md-10">
                    <h5 class="font-weight-bold"><?php echo htmlspecialchars($row['address']); ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-2">
                    <h5 class="font-weight-bold">Telefon:</h5>
                </div>
                <div class="col-12 col-md-10">
                    <h5 class="font-weight-bold"><?php echo htmlspecialchars($row['contact_phone']); ?></h5>

                </div>
            </div>

        </div>
        <div class="card-footer boja_footer">
            <div class="row">
                <div class="col-12 col-md-2">
                    <h5 class="font-weight-bold">Narudžba:</h5>
                </div>
                <div class="col-12 col-md-10">
                    <p class="text-left font-weight-bold"><?php echo htmlspecialchars($row['narudzba']); ?></p>
                </div>
                <div class="col-12 col-md-2">
                    <h5 class="font-weight-bold">Detalji narudžbe:</h5>
                </div>
                <div class="col-12 col-md-10">
                    <p class="text-left font-weight-bold"><?php echo htmlspecialchars($row['detalji']); ?></p>
                </div>
                <div class="col-12 col-md-2">
                    <h5 class="font-weight-bold">Cijena:</h5>
                </div>
                <div class="col-12 col-md-10">
                    <p class="text-left font-weight-bold"><?php echo htmlspecialchars($row['Cijena']); ?>KM</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
</body>
</html>