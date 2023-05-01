<?php
$connection = mysqli_connect('localhost', 'root', '', 'foodblog');

if (!isset($connection)) {
    die('Connection failed ' . $connection->error);
}

$query = 'SELECT * FROM BEITRAG ORDER BY id DESC LIMIT 6;';
$result_newest = mysqli_query($connection, $query);

if (!isset($result_newest)) {
    die('Invalid query: ' . mysqli_error($connection));
}

$query = 'SELECT * FROM BEITRAG ORDER BY id ASC LIMIT 6;';
$result_popular = mysqli_query($connection, $query);

if (!isset($result_popular)) {
    die('Invalid query: ' . mysqli_error($connection));
}

$connection->close();
?>
<html>

<head>
    <link rel="stylesheet" href="styles/index.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <div class="container">

            <div class="blogs sub-container">
                <div class="heading font">
                    Neuste Blogs
                </div>
                <div class="kachel-container">
                    <?php
                    foreach ($result_newest as $blog) {
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
                    ?>
                </div>
            </div>

            <div class="blogs sub-container">
                <div class="heading font">
                    Beliebte Blogs
                </div>
                <div class="kachel-container">
                    <?php
                    foreach ($result_popular as $blog) {
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
                    ?>
                </div>
            </div>
        </div>
    </main>

    <?php include('footer.html'); ?>
</body>

</html>