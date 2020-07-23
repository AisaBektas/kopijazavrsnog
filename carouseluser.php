<?php
include('bootstrap.php');
include('styleuser.css');
?>
<!DOCTYPE html>
<html>
<head>
    <style>

    </style>
</head>
<body>
<!-- CAROUSEL za pocetnu stranicu-->
<div class="container-fluid mt-5 pt-5 mb-1 pb-1 text-center maliekran">
    <div id="reklama" class="carousel slide mt-3 pt-3 mb-3 pb-3 " data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#reklama" data-slide-to="0" class="active"></li>
            <li data-target="#reklama" data-slide-to="1"></li>
            <li data-target="#reklama" data-slide-to="2"></li>
            <li data-target="#reklama" data-slide-to="3"></li>
            <li data-target="#reklama" data-slide-to="4"></li>
            <li data-target="#reklama" data-slide-to="5"></li>
        </ul>

        <!-- The slideshow
              klasa opacity za smanjenje i boju caption-->

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block img-fluid mx-auto prikaz_slike" src="images/izlogodg.jpg" alt="Bektaš">
                <div class="carousel-caption rounded opacity font-weight-bold d-none d-sm-block">
                    <h3>Bektaš</h3>
                    <p>Dođite i uživajte u slatkim zalogajima!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid mx-auto prikaz_slike" src="images/torteodg.jpg" alt="Torta">
                <div class="carousel-caption rounded opacity font-weight-bold d-none d-sm-block">
                    <h3>Torte</h3>
                    <p>Čokoladne, voćne, kremaste, sirne...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid mx-auto prikaz_slike" src="images/kolacodg.jpg" alt="Kolac">
                <div class="carousel-caption opacity rounded font-weight-bold d-none d-sm-block">
                    <h3>Kolači</h3>
                    <p>Tradicionalni, čokoladni, voćni, medeni...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid mx-auto prikaz_slike" src="images/palacinkeodg.jpg" alt="Palacinke">
                <div class="carousel-caption opacity rounded font-weight-bold d-none d-sm-block">
                    <h3>Palačinke</h3>
                    <p>Američke, grčke, bosanske, obične...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid mx-auto prikaz_slike " src="images/pecivaodg.jpg" alt="Peciva">
                <div class="carousel-caption opacity rounded font-weight-bold d-none d-sm-block">
                    <h3>Peciva</h3>
                    <p>Krofne, krosane, kiflice, pletenice...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid mx-auto prikaz_slike" src="images/picaodg.jpg" alt="Pica">
                <div class="carousel-caption opacity rounded font-weight-bold d-none d-sm-block">
                    <h3>Pića</h3>
                    <p>Sokovi, čajevi, kahve,...</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#reklama" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#reklama" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>

</body>
</html>