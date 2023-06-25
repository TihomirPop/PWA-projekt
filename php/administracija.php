<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/icon.ico">
    <title>debate</title>
</head>

<body>
    <?php session_start(); ?>
    <?php include '../html/header.html' ?>

    <section>
        <?php
        include 'connect.php';

        if(isset($_POST['prijava'])){
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            $sql = "SELECT korisnickoIme, lozinka, razina FROM korisnici WHERE korisnickoIme = ?";

            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
            mysqli_stmt_bind_result($stmt, $username, $lozinka, $razina);
            mysqli_stmt_fetch($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0 && password_verify($pass, $lozinka)) {
                $_SESSION['razina'] = $razina;
                $_SESSION['korisnickoIme'] = $username;
                echo "<meta http-equiv='refresh' content='0'>";
            } else {
                echo '
                <br><br><p class="pError">Krivo korisničko ime ili lozinka. <a href="registracija.php">Registriraj se.</a></p>';
            }
        }
        
        if(!isset($_SESSION['razina'])){
            echo '
            <form enctype="multipart/form-data" action="" method="POST" class="signInUpForm">
                <div class="form-item">
                    <span id="porukaUsername" class="bojaPoruke"></span>
                    <label for="username">Korisničko ime:</label>
                    <div class="form-field">
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                </div><br>
                <div class="form-item">
                    <span id="porukaPass" class="bojaPoruke"></span>
                    <label for="pass">Lozinka: </label>
                    <div class="form-field">
                        <input type="password" name="pass" id="pass" class="form-control" required>
                    </div>
                </div><br>
                <br>
                <div class="form-item">
                    <button type="submit" name="prijava" id="slanje" class="btn btn-primary signInUpButton">Prijavi se</button>
                </div>
            </form>
            <a href="registracija.php">
                <button class="btn btn-primary signInUpButton">Registriraj se</button>
            </a>';
        }
        else if($_SESSION['razina'] == 0){
            echo '<p class="userMsg">Bok ' . $_SESSION['korisnickoIme'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
            echo '
            <form action="" method="post">
                <button type="submit" name="logout" class="btn btn-primary signInUpButton">Logout</button>
            </form>';

            if(isset($_POST['logout'])){
                unset($_SESSION['razina']);
                unset($_SESSION['korisnickoIme']);
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
        else if($_SESSION['razina'] == 1){
            echo '<p class="userMsg">Bok ' . $_SESSION['korisnickoIme'] . '!</p>';

            echo '
            <form action="" method="post">
                <button type="submit" name="logout" class="btn btn-primary signInUpButton">Logout</button>
            </form>';

            if(isset($_POST['logout'])){
                unset($_SESSION['razina']);
                unset($_SESSION['korisnickoIme']);
                echo "<meta http-equiv='refresh' content='0'>";
            }

            $query = "SELECT * FROM vijesti";
            $result = mysqli_query($dbc, $query);
            while ($row = mysqli_fetch_array($result)) {

                echo '
                <form enctype="multipart/form-data" action="" method="POST" class="administracijaForm">
                    <div class="form-item">
                        <label for="title">Naslov vjesti:</label>
                        <div class="form-field">
                            <input type="text" name="title" class="form-control" value="' . $row['naslov'] . '">
                        </div>
                    </div>
                    <br>
                    <div class="form-item">
                        <label for="about">Kratki sadržaj vijesti (do 100 znakova):</label>
                        <div class="form-field">
                            <textarea name="about" id="" cols="30" rows="3" class="form-control">' . $row['sazetak'] . '</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-item">
                        <label for="content">Sadržaj vijesti:</label>
                        <div class="form-field">
                            <textarea name="content" id="" cols="30" rows="10" class="form-control">' . $row['tekst'] . '</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-item">
                        <label for="pphoto">Slika:</label>
                        <div class="form-field">
                            <input type="file" class="form-control" id="pphoto" accept="image/*" value="' . $row['slika'] . '" name="pphoto"/> <br>
                            <img src="../images/' . $row['slika'] . '" width=100px>
                        </div>
                    </div>
                    <br>
                    <div class="form-item">
                        <label for="category">Kategorija vijesti:</label>
                        <div class="form-field">
                            <select name="category" id="category" class="form-control" value="' . $row['kategorija'] . '">
                                <option value="SVIJET" class="form-control"' . (($row['kategorija'] == 'SVIJET') ? 'selected' : '') . '>Svijet</option>
                                <option value="SPORT" class="form-control"' . (($row['kategorija'] == 'SPORT') ? 'selected' : '') . '>Sport</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-item">
                        <div class="form-field">';
                            if ($row['prikazi'] == 1)
                                echo '<input type="checkbox" name="prikazi" id="prikazi' . $row['id'] . '" checked/>';
                            else
                                echo '<input type="checkbox" name="prikazi" id="prikazi' . $row['id'] . '"/>';
                            echo '
                            <label for="prikazi' . $row['id'] . '"> Prikaži na stranici</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-item">
                        <input type="hidden" name="id" class="form-control" value="' . $row['id'] . '">
                        <button type="reset" value="Poništi" class="btn btn-secondary">Poništi</button>
                        <button type="submit" name="update" value="Prihvati" class="btn btn-primary">Izmjeni</button>
                        <button type="submit" name="delete" value="Izbriši" class="btn btn-danger">Izbriši</button>
                    </div>
                    <hr>
                </form>';
            }

            if (isset($_POST['delete'])) {
                $id = $_POST['id'];
                $query = "DELETE FROM vijesti WHERE id=$id ";
                $result = mysqli_query($dbc, $query);

                echo "<meta http-equiv='refresh' content='0'>";
            } else if (isset($_POST['update'])) {
                $title = $_POST['title'];
                $about = $_POST['about'];
                $content = $_POST['content'];
                $category = $_POST['category'];
                $id = $_POST['id'];

                if (isset($_POST['prikazi']))
                    $prikazi = 1;
                else
                    $prikazi = 0;


                if (strlen($_FILES['pphoto']['name']) > 0) {
                    $picture = $_FILES['pphoto']['name'];
                    move_uploaded_file($_FILES["pphoto"]["tmp_name"], '../images/' . $picture);
                    $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', prikazi='$prikazi' WHERE id=$id ";
                    $result = mysqli_query($dbc, $query);
                } else {
                    $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', kategorija='$category', prikazi='$prikazi' WHERE id=$id ";
                    $result = mysqli_query($dbc, $query);
                }

                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
        ?>
    </section>

    <footer <?php echo (!isset($_SESSION['razina']) || $_SESSION['razina'] == 0 ? 'class="absoluteFooter"' : ''); ?> >
        Tihomir Popović - tpopovic@tvz.hr - 2023.
    </footer>
</body>

</html>