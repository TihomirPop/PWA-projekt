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

    <main>

        <?php
        include 'connect.php';

        $title = '';
        $about = '';
        $content = '';
        $category = '';

        if (isset($_POST['naslov'], $_POST['sazetak'], $_POST['tekst'], $_POST['submit'], $_FILES['slika']['name'])) {
            $title = $_POST['naslov'];
            $about = $_POST['sazetak'];
            $content = $_POST['tekst'];
            $category = $_POST['kategorija'];
            $picture = $_FILES['slika']['name'];
            $date = date('d.m.Y.');
            if (isset($_POST['prikazi']))
                $prikazi = 1;
            else
                $prikazi = 0;

            move_uploaded_file($_FILES["slika"]["tmp_name"], '../images/' . $picture);

            $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, prikazi ) VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$prikazi')";
            $result = mysqli_query($dbc, $query) or die('Error querying databese.');
        }
        mysqli_close($dbc);

        ?>

        <section class="aboveImg">
            <p class="category">
                <?php echo $category; ?>
            </p>
            <h1 class="title">
                <?php echo $title; ?>
            </h1>
            <p class="about">
                <?php echo $about; ?>
            </p>
            <p class="time">
                <?php echo $date; ?>
            </p>
        </section>
        <?php echo "<img src='../images/" . $picture . "'"; ?>
        <br>

        <p class="content">
            <?php echo $content; ?>
        </p>
    </main>

    <footer>
        Tihomir Popović - tpopovic@tvz.hr - 2023.
    </footer>
</body>

</html>