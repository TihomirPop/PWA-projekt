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