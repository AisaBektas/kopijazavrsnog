<?php
session_start();
if (!isset($_SESSION['login'])) { //ako nisu uneseni podaci nemoguce je pristupiti ovoj stranici
    header("Location: start.php");
}
include('database.php');
include('bootstrap.php');
include('style.css');

//query za sve torte i kolace
$sql = 'SELECT title, ingredients, price, picture, id FROM torteikolaci ORDER BY created_at';

//make query and get result
$result = mysqli_query($connection, $sql);

//fetch the resulting rows as an array
//$torteikolaci = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory
//mysqli_free_result($result);
//close connection
mysqli_close($connection);
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
<html>
<body class="pozadina">
<?php include('get.php'); ?>

<div id="menu" class="container-fluid pt-5">
    <p class="h1 mb-1 text-center font-weight-bold text-color" id="font">Menu</p>
    <div class="row text-center pb-5 pt-5">

        <div class="col-lg-3 col-md-3 col-sm-6 col-12 pb-4">
            <h1 class="text-color font-weight-bold fontmenu">Kolači</h1>
            <img src="images/kolacizlog_300x200.jpg" class="bordermenu rounded-pill img-fluid shadow" alt="kolacimenu">


            <a href="pregledkolaca.php">
                <h3 class="mt-4">
                    <button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover">Pregled</button>
                </h3>
            </a>
            <?php //include ('dodaj.php'); ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12 pb-4">
            <h1 class="text-color font-weight-bold fontmenu">Torte</h1>
            <img src="images/ferero_300x200.jpg" class="bordermenu rounded-pill img-fluid shadow" alt="tortemenu">

            <a href="pregledtorti.php">
                <h3 class="mt-4">
                    <button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover">Pregled</button>
                </h3>
            </a>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12 pb-4">
            <h1 class="text-color font-weight-bold fontmenu">Pića</h1>
            <img src="images/caj12_300x200.jpg" class="bordermenu rounded-pill img-fluid shadow" alt="picamenu">

            <a href="pregledpica.php">
                <h3 class="mt-4">
                    <button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover">Pregled</button>
                </h3>
            </a>

        </div>


        <div class="col-lg-3 col-md-3 col-sm-6 col-12 pb-4">
            <h1 class="text-color font-weight-bold fontmenu">Peciva</h1>
            <img src="images/Palacinkathebest_300x200.jpg" class="bordermenu rounded-pill img-fluid shadow"
                 alt="palacinkemenu">

            <a href="pregledpeciva.php">
                <h3 class="mt-4">
                    <button type="button" class="btn rounded-pill px-5 font-weight-bold dodaj hover">Pregled</button>
                </h3>
            </a>

        </div>
    </div>
</div>
<!-- <div class="container-fluid mt-5 mb-5" id="profil">
			<div class="row color pt-5 pb-4  pl-0 pr-0">
				<div class="col-12"></div>
			</div>
		</div> -->
<div id="profil">
    <?php include('profiladmina.php'); ?>
</div>
<div class="container-fluid mt-5 mb-5" id="adminkontaktinfo">
    <div class="row color pt-5 pb-4  pl-0 pr-0">
        <div class="col-12"></div>
    </div>
</div>
<?php include('kontaktadmin.php'); ?>
<div class="footer"><?php include('footer.php'); ?></div>

</body>
</html>

	

	