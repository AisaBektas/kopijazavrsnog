<?php
include('database.php');
include('bootstrap.php');
include('style.css');
$errors = array('greska' => '');
$sql = 'SELECT username, password, id FROM adminlogin';

//make query and get result
$result = mysqli_query($connection, $sql);

//fetch the resulting rows as an array
$adminlogin = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory
mysqli_free_result($result);

if (isset($_POST['promijeni'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE adminlogin SET username = '$username', password = '$password'";

    if (mysqli_query($connection, $sql)) {
        //success
        $errors['greska'] = 'Podaci su promijenjeni!';
        $sql = 'SELECT username, password, id FROM adminlogin';
        $result = mysqli_query($connection, $sql);
        $adminlogin = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        //failure
        echo 'query error:' . mysqli_error($connection);
    }
}
//check GET request id parameters
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    //make sql
    $sql = "SELECT *  FROM adminlogin WHERE id = $id";

    //get the query result
    $result = mysqli_query($connection, $sql);

    //fetch result in array format
    $cake = mysqli_fetch_assoc($results);
    mysqli_free_result($results);
    mysqli_close($connection);

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .card-footer {

            color: #ffe6e6;
            border-top: double 3px #ffe6e6;
            border-bottom: double 3px #ffe6e6;
        }

    </style>
</head>
<body class="pozadina">

<div class="container-fluid mt-5 mb-5" id="contacts">
    <div class="row color pt-5 pb-4  pl-0 pr-0">
        <div class="col-12"></div>
    </div>
</div>
<div id="contact" class="container-fluid pb-5 pl-5 pr-5">
    <div class="row mt-5  pt-5 mb-5 text-left font-weight-bold">
        <?php foreach ($adminlogin as $admin): ?>
            <div class="col-lg-6 col-xl-6 col-md-12 col-12">
                <form action="#contacts" class="" method="POST">


                    <p class="h1 mb-4 text-center font-weight-bold text-color" id="font">Admin</p>


                    <div class="greska text-center"><?php echo $errors['greska']; ?></div>
                    <!-- Username -->
                    <label for="korisnickoime" class="font-weight-bold text-color">Ime</label>


                    <input type="username" name="username" class="form-control mb-4 text-color" placeholder="Ime"
                           id="korisnickoime" value="<?php echo htmlspecialchars($admin['username']); ?>" required>


                    <!-- Password -->
                    <label for="lozinka" class="font-weight-bold text-color">Lozinka</label>


                    <input type="" id="lozinka" name="password" class="form-control mb-4 text-color"
                           placeholder="Lozinka" value="<?php echo htmlspecialchars($admin['password']); ?>" required>


                    <button class="mt-5 btn btn-success btn-block font-weight-bold text-color" type="submit"
                            name="promijeni">Promijeni
                    </button>

                </form>

            </div>
            <div class="text-center mt-4 col-lg-1 col-xl-1 col-md-12 col-12">
            </div>
            <div class="text-center col-lg-5 col-xl-5 col-md-12 col-12"><img
                        class="img-fluid m-auto shadow-lg rounded-pill shadow" style="height: 370px; width: auto;"
                        src="images/slasticarna.jpg" alt="...">
            </div>
        <?php endforeach; ?>
    </div>
</div>


<script src="https://kit.fontawesome.com/98d1cb884c.js" crossorigin="anonymous"></script>
</body>
</html>