<?php
include('database.php');
include('bootstrap.php');
include('style.css');
$errors = array('greska' => '');
$sql = 'SELECT address, location, telephone, mobilephone, email, id FROM kontakt';

//make query and get result
$result = mysqli_query($connection, $sql);

//fetch the resulting rows as an array
$kontakt = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory
mysqli_free_result($result);

if (isset($_POST['promijenikontakte'])) {
    $address = $_POST['address'];
    $location = $_POST['location'];
    $telephone = $_POST['telephone'];
    $mobilephone = $_POST['mobilephone'];
    $email = $_POST['email'];


    $sql = "UPDATE kontakt SET address = '$address', location = '$location', telephone = '$telephone', mobilephone = '$mobilephone', email = '$email'";

    if (mysqli_query($connection, $sql)) {
        //success
        $errors['greska'] = 'Podaci su promijenjeni!';
        $sql = 'SELECT address, location, telephone, mobilephone, email, id FROM kontakt';
        $result = mysqli_query($connection, $sql);
        $kontakt = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        //failure
        echo 'query error:' . mysqli_error($connection);
    }
}
//check GET request id parameters
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    //make sql
    $sql = "SELECT *  FROM kontakt WHERE id = $id";

    //get the query result
    $result = mysqli_query($connection, $sql);

    //fetch result in array format
    $contact = mysqli_fetch_assoc($results);
    mysqli_free_result($results);
    mysqli_close($connection);

}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body class="pozadina">
<div id="kontaktadmina" class="container-fluid pt-5 mb-2 pb-5 pl-5 pr-5">
    <div class="row text-center text-color">
        <div class="col-12">
            <p class="h1 mb-4" id="font">Kontakt informacije</p>

            <div class="greska font-weight-bold text-center"><?php echo $errors['greska']; ?></div>
        </div>
    </div>
    <div class="row mt-2 text-left font-weight-bold">

        <?php foreach ($kontakt as $contact): ?>
            <div class="col-lg-6 col-xl-6 col-md-12 col-12">
                <form action="#kontaktadmina" class="" method="POST">

                    <!-- address -->
                    <label for="address" class="font-weight-bold text-color">Adresa</label>
                    <input type="username" name="address" class="form-control mb-4 text-color" placeholder="Adresa"
                           id="address" value="<?php echo htmlspecialchars($contact['address']); ?>" required>
                    <!-- location -->
                    <label for="location" class="font-weight-bold text-color">Lokacija</label>
                    <input type="" id="location" name="location" class="form-control mb-4 text-color"
                           placeholder="Location" value="<?php echo htmlspecialchars($contact['location']); ?>"
                           required>
                    <!-- telephone -->
                    <label for="telephone" class="font-weight-bold text-color">Telefon</label>
                    <input type="" id="telephone" name="telephone" class="form-control mb-4 text-color"
                           placeholder="Telephone" value="<?php echo htmlspecialchars($contact['telephone']); ?>"
                           required>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-12 col-12">
                <!-- mobile phone -->
                <label for="mobilephone" class="font-weight-bold text-color">Mobitel</label>
                <input type="" id="mobilephone" name="mobilephone" class="form-control mb-4 text-color"
                       placeholder="Mobile phone" value="<?php echo htmlspecialchars($contact['mobilephone']); ?>"
                       required>
                <!-- email -->
                <label for="email" class="font-weight-bold text-color">E-mail</label>
                <input type="" id="email" name="email" class="form-control mb-4 text-color" placeholder="Email"
                       value="<?php echo htmlspecialchars($contact['email']); ?>" required>


                <button class="pt-4 pb-4 btn btn-success btn-block font-weight-bold text-color" type="submit"
                        name="promijenikontakte">Promijeni
                </button>
            </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
