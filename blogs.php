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
                    <div>
                        <a href="blogs.php">
                            <div class="kachel">
                                <img class="preview" src="../icons/add-circle.svg">
                                <div class="title font">
                                    Blog 1
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="blog-anzeigen.php">
                            <div class="kachel">
                                <img class="preview" src="../icons/add-circle.svg">
                                <div class="title font">
                                    Blog 2 mit sehr langem Titel
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="blogs.php">
                            <div class="kachel">
                                <img class="preview" src="../icons/add-circle.svg">
                                <div class="title font">
                                    Blog 3
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="blogs.php">
                            <div class="kachel">
                                <img class="preview" src="../icons/add-circle.svg">
                                <div class="title font">
                                    Blog 4
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="desktop-view">
                        <a href="blogs.php">
                            <div class="kachel">
                                <img class="preview" src="../icons/add-circle.svg">
                                <div class="title font">
                                    Blog 5
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="desktop-view">
                        <a href="blogs.php">
                            <div class="kachel">
                                <img class="preview" src="../icons/add-circle.svg">
                                <div class="title font">
                                    Blog 6
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
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