<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>debate</title>
</head>

<body>
    <header>
        <h1>debate</h1>
        <img src="assets/logo.webp" alt="debate">
        <nav>
            <a href="index.html">HOME</a>
            <a href="">MUNDO</a>
            <a href="">DEPORTE</a>
            <a href="">ADMINISTRACIJA</a>
            <a href="unos.html">UNOS</a>
        </nav>
    </header>
    <main>

        <?php
        $title = '';
        $about = '';
        $content = '';
        $category = '';

        if (isset($_POST['naslov'], $_POST['sazetak'], $_POST['tekst'], $_POST['slika'], $_POST['submit'], )) {
            $title = $_POST['naslov'];
            $about = $_POST['sazetak'];
            $content = $_POST['tekst'];
            $category = $_POST['kategorija'];
        }
        ?>

        <p class="category">
            <?php echo $category; ?>
        </p>
        <h1 class="title">
            <?php echo $title; ?>
        </h1>
        <p>AUTOR:</p>
        <p>OBJAVLJENO:</p>
        </div>
        <?php echo "<img src='images/1.webp'"; ?>
        <br>
        <p>
            <?php echo $about; ?>
        </p>
        <p>
            <?php echo $content; ?>
        </p>
    </main>
    <footer>
        Tihomir Popović - tpopovic@tvz.hr - 2023.
    </footer>
</body>

</html>