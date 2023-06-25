<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>debate</title>
</head>

<body>
    <?php session_start() ?>
    <?php include '../html/header.html' ?>

    <?php
    include 'connect.php';

    if(isset($_POST['submit'])){
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $username = $_POST['username'];
        $lozinka = $_POST['pass'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
        $razina = 0;
        $registriranKorisnik = false;

        $sql = "SELECT korisnickoIme FROM korisnici WHERE korisnickoIme = ?";
        $stmt = mysqli_stmt_init($dbc);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }

        if(mysqli_stmt_num_rows($stmt) > 0){
            $msg='Korisničko ime već postoji!';
        } else{
            $sql = "INSERT INTO korisnici (ime, prezime, korisnickoIme, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik = true;

                $_SESSION['korisnickoIme'] = $username;
                $_SESSION['razina'] = $razina;

                header("Location: administracija.php");
                exit;
            }
        }
    }

    mysqli_close($dbc);
    ?>

    <section role="main">
        <form enctype="multipart/form-data" action="" method="POST" class="signInUpForm" id="form">
            <?php echo isset($msg) ? "<p class='pError'>$msg<p>" : '' ?>
            <label for="ime">Ime: </label>
            <input type="text" name="ime" id="ime" class="form-control">
            <span id="imeError" class="error"></span><br>
            <label for="prezime">Prezime: </label>
            <input type="text" name="prezime" id="prezime" class="form-control">
            <span id="prezimeError" class="error"></span><br>
            <label for="username">Korisničko ime:</label>
            <input type="text" name="username" id="username" class="form-control">
            <span id="usernameError" class="error"></span><br>
            <label for="pass">Lozinka: </label>
            <input type="password" name="pass" id="pass" class="form-control">
            <span id="passError" class="error"></span><br>
            <label for="passRep">Ponovite lozinku: </label>
            <input type="password" name="passRep" id="passRep" class="form-control">
            <span id="passRepError" class="error"></span><br><br>

            <button type="submit" name="submit" id="slanje" class="btn btn-primary signInUpButton">Registriraj se</button>
        </form>
    </section>

    <footer>
        Tihomir Popović - tpopovic@tvz.hr - 2023.
    </footer>
    <script src="../js/registracija.js"></script>
</body>

</html>