<?php
$connection = mysqli_connect('localhost', 'root', '', 'foodblog');

if (!isset($connection)) {
    die('Connection failed ' . $connection->error);
}

$query = 'SELECT * FROM BEITRAG WHERE TITEL LIKE "%'.$_POST['sucheingabe'].'%" OR TEXT LIKE "%'.$_POST['sucheingabe'].'%";';
$result = mysqli_query($connection, $query);

if (!isset($result)) {
    die('Invalid query: ' . mysqli_error($connection));
}

$connection->close();
?>

<html>

<head>
    <link rel="stylesheet" href="styles/suche.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <div class="container">
            <form method="post" action=<?php echo('"'.$_SERVER['PHP_SELF'].'"'); ?>>
                <input class=" suche font" type="text" name="sucheingabe" placeholder="Suche" value=<?php echo($_POST['sucheingabe']); ?>>
                <button class="button" type="submit" name="submit-search-button">
                    <img class="icon" src="../icons/search-dark-green.svg">
                </button>
            </form>
            <?php
                if (!isset($_POST['sucheingabe'])) {
                echo('
                <div class="blogs sub-container">
                    <div class="heading font">
                        Alle Beiträge
                    </div>

                    <div class="kachel-container">');
                    foreach ($result as $blog) {
                        echo ('
                            <a href="blog-anzeigen.php?id=' . $blog['id'] . '">
                                <div class="kachel">
                                    <img class="preview" src=' . $blog['bildpfad'] . '>
                                    <div class="title font">
                                    ' . $blog['titel'] . ' 
                                    </div>
                                </div>
                            </a>');
                    }
                }
                if (isset($_POST['sucheingabe'])) {
                    echo('
                    <div class="blogs sub-container">
                        <div class="heading font">
                            Suchergebnisse
                        </div>
    
                        <div class="kachel-container">');
                        foreach ($result as $blog) {
                            echo ('
                                <a href="blog-anzeigen.php?id=' . $blog['id'] . '">
                                    <div class="kachel">
                                        <img class="preview" src=' . $blog['bildpfad'] . '>
                                        <div class="title font">
                                        ' . $blog['titel'] . ' 
                                        </div>
                                    </div>
                                </a>');
                        }
                    }
            ?>
        </div>
    </main>

    <?php include('footer.html'); ?>
</body>

</html>