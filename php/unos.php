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
    <?php include '../html/header.html' ?>

    <form enctype="multipart/form-data" action="skripta.php" method="post" id="form">
        <label for="naslov">Naslov vijesti:</label><br>
        <input type="text" id="naslov" name="naslov" class="form-control">
        <span id="naslovError" class="error"></span><br>
        <label for="sazetak">Kratki sadržaj vijesti (do 100 znakova):</label><br>
        <textarea name="sazetak" id="sazetak" cols="40" rows="3" class="form-control"></textarea>
        <span id="sazetakError" class="error"></span><br>
        <label for="tekst">Sadržaj vijesti:</label><br>
        <textarea name="tekst" id="tekst" cols="40" rows="10" class="form-control"></textarea>
        <span id="tekstError" class="error"></span><br>
        <label for="tekst">Kategorija:</label><br>
        <select id="kategorija" name="kategorija" class="form-control">
            <option value="" class="form-control">Odabir Kategorije</option>
            <option value="SVIJET" class="form-control">Svijet</option>
            <option value="SPORT" class="form-control">Sport</option>
        </select>
        <span id="kategorijaError" class="error"></span><br>
        <label for="slika">Slika:</label><br>
        <input type="file" name="slika" id="slika" accept="image/*" class="form-control" />
        <span id="slikaError" class="error"></span><br>
        <input type="checkbox" name="prikazi" id="prikazi" checked>
        <label for="prikazi"> Prikaži na stranici</label><br><br>

        <button type="reset" value="Poništi" class="btn btn-secondary">Poništi</button>
        <button type="submit" name="submit" value="Prihvati" class="btn btn-primary">Prihvati</button>
    </form>

    <footer>
        Tihomir Popović - tpopovic@tvz.hr - 2023.
    </footer>

    <script src="../js/unos.js"></script>
</body>

</html>