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
                <a href="blogs.php">
                        <div class="kachel">
                            <img class="preview" src="../icons/add-circle.svg">
                            <div class="title font">
                                Blog 1
                            </div>
                        </div>
                    </a>
                    <a href="blogs.php">
                        <div class="kachel">
                            <img class="preview" src="../icons/add-circle.svg">
                            <div class="title font">
                                Blog 2 mit einem sehr ausführlichen Titel
                            </div>
                        </div>
                    </a>
                    <a href="blogs.php">
                        <div class="kachel">
                            <img class="preview" src="../icons/add-circle.svg">
                            <div class="title font">
                                Blog 3
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="rezepte sub-container">
                <div class="heading font">
                    Beliebte Rezepte
                </div>
                <div class="kachel-container">
                    <a href="rezepte.html">
                        <div class="kachel">
                            <img class="preview" src="../icons/add-circle.svg">
                            <div class="title font">
                                Rezept 1
                            </div>
                        </div>
                    </a>
                    <a href="rezepte.html">
                        <div class="kachel">
                            <img class="preview" src="../icons/add-circle.svg">
                            <div class="title font">
                                Rezept 2
                            </div>
                        </div>
                    </a>
                    <a href="rezepte.html">
                        <div class="kachel">
                            <img class="preview" src="../icons/add-circle.svg">
                            <div class="title font">
                                Rezept 3
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
        </div>
    </main>

    <?php include('footer.html'); ?>
</body>

</html>