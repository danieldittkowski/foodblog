<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'foodblog');

if (!isset($connection)) {
    die('Connection failed ' . $connection->error);
}

$query = 'SELECT * FROM BEITRAG WHERE AUTOR = '.$_SESSION['user_id'].';';
$result_user = mysqli_query($connection, $query);

if (!isset($result_user)) {
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
    <link rel="stylesheet" href="styles/blogs.css">
    <meta charset="utf-8>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <div class="container">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo ('
                    <div class="button sub-container smartphone-view">
                    <a href="blog-anlegen.php">
                        <button class="font">
                            Neuen Blog posten
                        </button>
                    </a>
                </div>
                    ');
            }
            ?>
            <?php
                if (mysqli_num_rows($result_user)>0) {
                echo('
                <div class="blogs sub-container">
                    <div class="heading font">
                        Meine Blogs
                    </div>

                    <div class="kachel-container">');
                    foreach ($result_user as $blog) {
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
            <div class="blogs sub-container">
                <div class="heading font">
                    Neuste Blogs
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
                <?php

                if (isset($_SESSION['user_id'])) {
                    echo ('
                    <div class="button sub-container desktop-view">
                    <a href="blog-anlegen.php">
                        <button class="font">
                            Neuen Blog posten
                        </button>
                    </a>
                </div>
                    ');
                }
                ?>
            </div>
        </div>
    </main>

    <?php include('footer.html'); ?>
</body>

</html>