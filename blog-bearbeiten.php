<?php
session_start();
if (isset($_GET['id'])) {
    $connection = mysqli_connect("localhost", "root", "", "foodblog");

    if (!isset($connection)) {
        die('Connection failed ' . $connection->error);
    }

    $beitrag_id = $_GET['id'];
    $query = 'SELECT * FROM beitrag WHERE ID = "' . $beitrag_id . '";';
    $result = mysqli_query($connection, $query);
    $row = $result->fetch_assoc();

    $autor = $row['autor'];
    $titel = $row['titel'];
    $text = $row['text'];
    $bild = $row['bildpfad'];

    $query = 'SELECT * FROM user WHERE ID = ' . $autor . ';';
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Invalid query: ' . mysqli_error($connection));
    }

    $row = $result->fetch_assoc();

    $zielverzeichnis = "../uploads/" . $row['username'] . '/';
    $_SESSION['vorherige_seite'] = $_SERVER['PHP_SELF'];
}

$connection->close();

$breaks = array("<br />","<br>","<br/>");  
    $text = str_replace('<br />', "\n", $text); 
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/blog-bearbeiten.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('header.html'); ?>

    <main>
        <div class="container">
            <div class="heading font">
                Blog bearbeiten
            </div>
            <div class="form-container">
                <form method="post" action="blog-anzeigen.php" enctype="multipart/form-data">
                    <div class="form-content">
                        <div class="file">
                            <div>
                                <div class="upload-title font">
                                    <div>
                                        Das Bild kannst du ändern:
                                    </div>
                                    <img class="icon" src="../symbols/chevron-down-circle-dark-green.svg">
                                </div>
                            </div>
                            <div>
                                <image class="image" src=<?php echo ('"' . $zielverzeichnis . $bild . '"'); ?>>
                                    <input class="input font file-upload" type="file" name="bild">
                            </div>
                        </div>
                        <div>
                            <input class="input font titel" type="text" name="titel" value=<?php echo ('"' . $titel . '"') ?> placeholder="Blogtitel" required>
                        </div>
                        <div>
                            <input type="hidden" name="beitrag_id" value=<?php echo ($beitrag_id); ?>>
                        </div>
                        <div>
                            <textarea class="input font textfeld" name="text" placeholder="Blogtext" required><?php echo $text ?></textarea>
                        </div>
                        <div class="button-container">
                            <input class="font reset button" type="reset" name="reset-button" value="Zurücksetzen">
                            <input class="font submit button" type="submit" name="submit-edit-button" value="Bestätigen">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include('footer.html'); ?>
</body>

</html>