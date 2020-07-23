<?php
include('database.php');
include('bootstrap.php');
include('styleuser.css');
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        #navbaruser {
            /* margin-top: 30px; */
        }
    </style>
</head>
<body class="pozadinauser">
<div id="navbaruser">
    <?php include('headeruser.php'); ?>
</div>
<div id="carouserluser">
    <?php include('carouseluser.php'); ?>
</div>
<div id="onamauser">
    <?php include('razmak.php'); ?>
    <!--koristila klase jummbtron u svom css da ih sredim -->
    <div class="jumbotron mt-5 ml-3 mr-3 rounded-0">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-7">
                <h1 class="display-4 text-center font-weight-bold fontuser">Naša priča</h1>
                <p class="lead text-justify">
                    Bektaš Slastice je slastičarna smještena u vezirskom gradu Travniku. Počela je sa radom davne 1970.
                    godine. Nakon skoro pet decenija tradicije i iskustva "Bektaš Slastice" je i dalje omiljeno mjesto
                    za okupljanje
                    svih generacija, onih koji žele da uživaju u otmjenom i prijatnom ambijentu slatkih mirisa i okusa.
                    <br/>
                    Široki asortiman toplih, hladnih, čokoladnih napitaka, prirodnih i osvježavajućih sokova, frapea,
                    kupova i specijaliteta od sladoleda, te mnogobrojnih vrsta torti, kolača, slanih i slatkih peciva je
                    dovoljan da
                    ugodi svačijem ukusu. Sve poslastice koje se nalaze na našem meniju su ručno i sa ljubavlju rađene u
                    „Bektaš Slastici“ po tradicionalnim receptima, kao i po receptima koji su plod inovacije vlasnika i
                    možete ih
                    pronaći samo u našoj slastičarnoj. Materijali od kojih pravimo sve proizvode su pažljivo i pomno
                    birani jer vaše povjerenje je ono što nam je najbitnije.<br/>
                    Osnivač i vlasnik "Bektaš Slastice", čitav život je posvetio poslastičarstvu. Slastičarsku i
                    poslovnu karijeru počeo je kao učenik, a kasnije i kao vodeći majstor u nekad čuvenoj slastičarni
                    «Oloman» u Sarajevu.
                    Nakon godinu mukotrpnog rada i truda odlučio je da otvori svoju slastičarnu i tu čarolija „Bektaš
                    Slastice“ počinje.
                </p>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-5 d-flex"><img
                        class="img-fluid m-auto shadow-lg rounded-pill shadow slikanasaprica"
                        src="images/slasticarna.jpg" alt="..."/></div>
        </div>
    </div>
</div>
<div id="menuuser">
    <?php include('razmak.php'); ?>
    <div id="menu" class="container-fluid mt-5 pt-5">
        <div class="row text-center pb-3">
            <div class="col-12"><h1 class="pb-4 font-weight-bold fontuser bojazatekstmenu">Bektaš Slastice</h1></div>
            <div class="col-md-4 col-sm-6 col-12 pb-4">
                <a href="kolac.php" target="_blank" class="text-decoration-none bojazatekstmenu">
                    <img src="images/kolacizlog_300x200.jpg" class="rounded-pill img-fluid shadow" alt="kolacimenu"/>
                    <h1 class="fontuser">Kolači</h1>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-12 pb-4">
                <a href="torte.php" target="_blank" class="text-decoration-none bojazatekstmenu">
                    <img src="images/tortaizlog_300x200.jpg" class="rounded-pill img-fluid shadow" alt="tortemenu"/>
                    <h1 class="fontuser">Torte</h1>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-12 pb-4">
                <a href="palacinkeipeciva.php" target="_blank" class="text-decoration-none bojazatekstmenu">
                    <img src="images/Palacinkathebest_300x200.jpg" class="rounded-pill img-fluid shadow"
                         alt="palacinkemenu"/>
                    <h1 class="fontuser">Palačinke</h1>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-12 pb-4">
                <a href="picauser.php" target="_blank" class="text-decoration-none bojazatekstmenu">
                    <img src="images/pice_300x200.jpg" class="rounded-pill img-fluid shadow" alt="hladnapicamenu"/>
                    <h1 class="fontuser">Hladna pića</h1>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-12 pb-4">
                <a href="palacinkeipeciva.php" target="_blank" class="text-decoration-none bojazatekstmenu">
                    <img src="images/pecivaizlog_300x200.jpg" class="rounded-pill img-fluid shadow" alt="pecivamenu"/>
                    <h1 class="fontuser">Peciva</h1>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-12 pb-4">
                <a href="picauser.php" target="_blank" class="text-decoration-none bojazatekstmenu">
                    <img src="images/caj12_300x200.jpg" class="rounded-pill img-fluid shadow" alt="toplapicamenu"/>
                    <h1 class="fontuser">Topla pića</h1>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include("kontaktuser.php"); ?>
<?php include("footeruser.php"); ?>
</body>
</html>
