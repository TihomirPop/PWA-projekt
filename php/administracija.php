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
    <header>
        <h1>debate</h1>
        <img src="../assets/logo.webp" alt="debate">
        <nav>
            <a href="index.php">HOME</a>
            <a href="kategorija.php?id=svijet">SVIJET</a>
            <a href="kategorija.php?id=sport">SPORT</a>
            <a href="administracija.php">ADMINISTRACIJA</a>
            <a href="unos.php">UNOS</a>
        </nav>
    </header>

    <?php
    include 'connect.php';

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
                <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
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
        if ($row['prikazi'] == 1) {
            echo '<input type="checkbox" name="prikazi" id="prikazi" checked/> <label> Prikaži na stranici</label>';
        } else {
            echo '<input type="checkbox" name="prikazi" id="prikazi"/> <label> Prikaži na stranici</label>';
        }
        echo '
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
    }

    ?>

    <footer>
        Tihomir Popović - tpopovic@tvz.hr - 2023.
    </footer>
</body>

</html>