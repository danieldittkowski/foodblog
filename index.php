<html>

<head>
    <link rel="stylesheet" href="styles/index.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('header.html'); ?>

    <main>
        <div class="container">

            <div class="blogs sub-container">
                <div class="heading font">
                    Beliebte Blogs
                </div>
                <div class="kachel-container">
                    <?php 
                            for($i = 1; $i < 4; $i++) {
                            echo('
                            <a href="blog-anzeigen.php">
                                <div class="kachel">
                                    <img class="preview" src="../icons/add-circle.svg">
                                    <div class="title font">
                                        Blog '.$i.'
                                    </div>
                                </div>
                            </a>');
                        }
                    ?>
                </div>
            </div>

            <div class="rezepte sub-container">
                <div class="heading font">
                    Beliebte Rezepte
                </div>
                <div class="kachel-container">
                    <?php 
                        for($i = 1; $i < 4; $i++) {
                            echo('
                            <a href="rezepte.php">
                                <div class="kachel">
                                    <img class="preview" src="../icons/add-circle.svg">
                                    <div class="title font">
                                        Rezept '.$i.'
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