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

    <?php
    include 'connect.php';
    define('IMGPATH', '../images/');
    ?>

    <section>
        <h2>
            <img src="../assets/bullet.webp" alt="">
            <span>SVIJET</span>
        </h2>
        <div class="articleWrapper">
            <?php
            $query = "SELECT * FROM vijesti WHERE prikazi = 1 AND kategorija = 'SVIJET' LIMIT 4";
            $result = mysqli_query($dbc, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "
                <article>
                    <img src='" . IMGPATH . $row['slika'] . "' alt='" . $row['slika'] . "'>
                    <p class='about'>" . $row['sazetak'] . "</p>
                    <h3>
                        <a href='clanak.php?id=" . $row['id'] . "'>" . $row['naslov'] . "</a>
                    </h3>
                    <p class='author'>" . $row['datum'] . "</p>
                </article>
                ";
            }
            ?>
        </div>
    </section>
    <hr>
    <section>
        <h2>
            <img src="../assets/bullet.webp" alt="">
            <span>SPORT</span>
        </h2>
        <div class="articleWrapper">
            <?php
            $query = "SELECT * FROM vijesti WHERE prikazi = 1 AND kategorija = 'SPORT' LIMIT 4";
            $result = mysqli_query($dbc, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "
                <article>
                    <img src='" . IMGPATH . $row['slika'] . "' alt='" . $row['slika'] . "'>
                    <p class='about'>" . $row['sazetak'] . "</p>
                    <h3>
                        <a href='clanak.php?id=" . $row['id'] . "'>" . $row['naslov'] . "</a>
                    </h3>
                    <p class='author'>" . $row['datum'] . "</p>
                </article>
                ";
            }
            ?>
        </div>
    </section>
    <hr>

    <footer>
        Tihomir Popović - tpopovic@tvz.hr - 2023.
    </footer>
</body>

</html>