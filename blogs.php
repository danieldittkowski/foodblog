<html>

<head>
    <link rel="stylesheet" href="styles/blogs.css">
    <meta charset="utf-8>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('header.html'); ?>

    <main>
        <div class="container">

            <div class="button sub-container smartphone-view">
                <a href="blog-anlegen.php">
                    <button class="font">
                        Neuen Blog posten
                    </button>
                </a>
            </div>

            <div class="blogs sub-container">
                <div class="heading font">
                    Neuste Blogs
                </div>

                <div class="kachel-container">
                    <?php
                        for ($i = 1; $i < 5; $i++) {
                            echo ('
                                    <div>
                                        <a href="blog-anzeigen.php">
                                            <div class="kachel">
                                                <img class="preview" src="../icons/add-circle.svg">
                                                <div class="title font">
                                                    Blog '.$i.'
                                                </div>
                                            </div>
                                        </a>
                                    </div>');
                        }
                    ?>
                    <?php
                    for ($i = 5; $i < 7; $i++) {
                        echo ('
                                <div class="desktop-view">
                                    <a href="blog-anzeigen.php">
                                        <div class="kachel">
                                            <img class="preview" src="../icons/add-circle.svg">
                                            <div class="title font">
                                                Blog '.$i.'
                                            </div>
                                        </div>
                                    </a>
                                </div>');
                    }
                    ?>
                </div>
                <div class="button sub-container desktop-view">
                    <a href="blog-anlegen.php">
                        <button class="font">
                            Neuen Blog posten
                        </button>
                    </a>
                </div>
            </div>
    </main>

    <?php include('footer.html'); ?>
</body>

</html>