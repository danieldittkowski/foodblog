<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/blog-anlegen.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <div class="container">
            <div class="heading font">
                Blog anlegen
            </div>
            <div class="form-container">
                <form method="post" action="blog-anzeigen.php" enctype="multipart/form-data">
                    <div class="form-content">
                        <div>
                            <input class="input font titel" type="text" name="titel" placeholder="Blogtitel" required>
                        </div>
                        <div>
                            <textarea class="input font textfeld" name="text" placeholder="Blogtext" required></textarea>
                        </div>
                        <div class="file">
                            <div>
                                <div class="upload-title font">
                                    <div>
                                        Hier Blogbild hochladen
                                    </div>
                                    <img class="icon" src="../icons/chevron-down-circle-dark-green.svg">
                                </div>
                            </div>
                            <div>
                                <input class="input font file-upload" type="file" name="bild" required>
                            </div>
                        </div>
                        <div class="button-container">
                            <input class="font reset button" type="reset" name="reset-button" value="Zurücksetzen">
                            <input class="font submit button" type="submit" name="submit-create-button" value="Blog erstellen">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include('footer.html'); ?>
</body>

</html>