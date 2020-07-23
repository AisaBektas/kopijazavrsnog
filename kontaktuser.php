<?php
include('database.php');
include('bootstrap.php');
include('styleuser.css');

// $result = $connection->query("SELECT address, location, telephone, mobilephone, email, id FROM kontakt");
$sql = 'SELECT address, location, telephone, mobilephone, email, id FROM kontakt';

//make query and get result
$result = mysqli_query($connection, $sql);

//fetch the resulting rows as an array
$kontaktuser = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory
mysqli_free_result($result);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<body class="pozadina">

<div id="contactuser" class="container-fluid color pt-5 pb-5">
    <div class="row mt-5 text-left font-weight-bold">
        <div class="text-center col-lg-5 col-xl-5 col-md-12 col-12"><h3 class="text-uppercase">Adresa:</h3>
            <?php foreach ($kontaktuser

            as $kontaktinfo): ?>

            <div class="row">
                <div class="d-none d-sm-block col-md-4">
                </div>
                <div class="col-md-4">
                    <p class="fontuser"><?php echo htmlspecialchars($kontaktinfo['address']); ?></p>
                </div>
                <div class="d-none d-sm-block col-md-4">
                </div>
            </div>
            <h4 class="text-uppercase">Lokacija:</h4>

            <p class="fontuser"><?php echo htmlspecialchars($kontaktinfo['location']); ?></p>

            <h3 class="text-uppercase">Telefon:</h3>

            <p class="fontuser"><?php echo htmlspecialchars($kontaktinfo['telephone']); ?></p>

            <h3 class="text-uppercase">Mobitel:</h3>

            <p class="fontuser"><?php echo htmlspecialchars($kontaktinfo['mobilephone']); ?></p>

            <h3 class="text-uppercase">Email:</h3>

            <p class="fontuser"><?php echo htmlspecialchars($kontaktinfo['email']); ?></p>
        </div>
        <div class="col-lg-7 col-xl-7 col-md-12 col-12 d-flex">
            <iframe class="img-fluid m-auto border border-dark"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2859.0285311256007!2d17.644448315478705!3d44.22707097910571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475efffbad3e469d%3A0xe1087721387b5625!2sInternacionalni%20Univerzitet%20Travnik!5e0!3m2!1shr!2sba!4v1576355617038!5m2!1shr!2sba"
                    frameborder="0" style="height: 350px; width: 100%;" allowfullscreen=""></iframe>
        </div>

        <?php endforeach; ?>
    </div>
</div>
</div>

<div class="container-fluid">
    <div class="row pt-1 pb-1 pl-0 pr-0">
        <div class="col-12"></div>
    </div>
</div>

</body>
</html>