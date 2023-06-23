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

    <main>

        <?php
        include 'connect.php';

        $id = $_GET['id'];
        $query = "SELECT * FROM vijesti WHERE id = $id";
        $result = mysqli_query($dbc, $query) or die('Error querying databese.');
        $row = mysqli_fetch_array($result);

        $title = $row['naslov'];
        $about = $row['sazetak'];
        $content = $row['tekst'];
        $category = $row['kategorija'];
        $picture = $row['slika'];
        $date = $row['datum'];
        $prikazi = $row['prikazi'];

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