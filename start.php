<?php
//radi kako treba
session_start();
unset($_SESSION['login']);

include('database.php'); //connection with database
include('bootstrap.php');
// include ('style.css'); //connection with my own css file

$errors = array('username' => '', 'password' => '', 'greska' => '');
if (isset($_POST['login'])) {

    $ime = $_POST['username'];
    $lozinka = $_POST['password'];

    $adminlogin = mysqli_query($connection, 'select * from adminlogin');
    $adminlogin_item = mysqli_fetch_assoc($adminlogin);

    $username = $adminlogin_item['username'];
    $password = $adminlogin_item['password'];

    if ($ime == $username && $lozinka == $password) {

        $_SESSION["login"] = $_POST['username'];
        header('location: index.php');

    } else {
        $errors['greska'] = 'Greska u unosu!<br>Pokušajte ponovo!';
        // echo '<span class="greska">Greska</span>';
    }

}


?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font css-->
    <link href="https://fonts.googleapis.com/css?family=Parisienne&display=swap" rel="stylesheet">
</head>
<style>
    .pozadina {
        background-color: #ffe6e6;
    }

    .okvir {
        margin-top: 20vh;
        background-color: #330000;
        padding: 5vh 10vh;
    }

    .loginform {
        -webkit-box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.75);
        box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.75);
    }

    .bojateksta {
        color: #ffe6e6;
    }

    .greska {
        color: red;
    }

    #font {
        font-family: 'Parisienne', cursive;
    }
</style>
<body class="pozadina">
<div class="container-fluid pozadina d-flex justify-content-center align-items-center">

    <!-- form start -->
    <!-- Default form login -->
    <form novalidate class="needs-validation border border-light okvir loginform" method="POST">


        <p class="h1 mb-4 text-center bojateksta" id="font">Bektaš <br> Slastice</p>

        <div class="greska text-center"><?php echo $errors['greska']; ?></div>
        <!-- Username -->
        <label for="validationCustom01" class="font-weight-bold bojateksta">Ime</label>

        <input type="username" name="username" class="form-control mb-4" placeholder="Ime" id="validationCustom01"
               required>

        <div class="invalid-feedback greska">
            Unesite korisničko ime!
        </div>

        <!-- Password -->
        <label for="validationCustom02" class="font-weight-bold bojateksta">Lozinka</label>

        <input type="password" id="validationCustom02" name="password" class="form-control mb-4" placeholder="Lozinka"
               required>


        <div class="invalid-feedback">
            Unesite lozinku!
        </div>
        <!-- Sign in button -->
        <button class="mt-5 btn btn-success btn-block font-weight-bold" type="submit" name="login">Prijava</button>

        <?php


        ?>
    </form>
</div>
</body>
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
// swal("Snimljeno!",{
//         buttons: false,

// }
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</html>