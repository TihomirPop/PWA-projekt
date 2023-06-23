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
    <?php include '../html/header.html' ?>

    <form enctype="multipart/form-data" action="skripta.php" method="post">
        <label for="naslov">Naslov vijesti:</label><br>
        <input type="text" id="naslov" name="naslov" class="form-control" required><br>
        <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova):</label><br>
        <textarea name="sazetak" id="sazetak" cols="40" rows="3" class="form-control" required></textarea><br>
        <label for="tekst">Sadržaj vijesti:</label><br>
        <textarea name="tekst" id="tekst" cols="40" rows="10" class="form-control" required></textarea><br>
        <label for="tekst">Kategorija:</label><br>
        <select id="kategorija" name="kategorija" class="form-control">
            <option value="SVIJET" class="form-control">Svijet</option>
            <option value="SPORT" class="form-control">Sport</option>
        </select><br>
        <label for="slika">Slika:</label><br>
        <input type="file" name="slika" id="slika" accept="image/*" class="form-control" required /><br>
        <input type="checkbox" name="prikazi" id="prikazi" checked>
        <label for="prikazi"> Prikaži na stranici</label><br><br>

        <button type="reset" value="Poništi" class="btn btn-secondary">Poništi</button>
        <button type="submit" name="submit" value="Prihvati" class="btn btn-primary">Prihvati</button>
    </form>

    <footer>
        Tihomir Popović - tpopovic@tvz.hr - 2023.
    </footer>
</body>

</html>