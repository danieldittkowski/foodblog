<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'foodblog');

if (!isset($connection)) {
    die('Connection failed ' . $connection->error);
}

if (isset($_POST['submit-create-button'])) {
    $zielverzeichnis = '../uploads/';
    $bildpfad = $zielverzeichnis . basename($_FILES['bild']['name']);

    move_uploaded_file($_FILES['bild']['tmp_name'], $bildpfad);

    $query = 'INSERT INTO BEITRAG(TITEL, TEXT, BILDPFAD, AUTOR) VALUES("' . $_POST['titel'] . '", "' . $_POST['text'] . '", "' . $bildpfad . '", "' . $_SESSION['user_id'] . '");';

    $result = mysqli_query($connection, $query);

    if (!isset($result)) {
        die('Invalid query: ' . mysqli_error($connection));
    }
    $id_query = 'SELECT MAX(ID) AS id FROM BEITRAG;';
    $beitrag_id = mysqli_query($connection, $id_query)->fetch_assoc()['id'];
}

if (isset($_POST['submit-edit-button'])) {
    if ($_FILES['bild']['error'] !== UPLOAD_ERR_NO_FILE) {
        print_r($_FILES['bild']);
        $zielverzeichnis = '../uploads/';
        $bildpfad = $zielverzeichnis . basename($_FILES['bild']['name']);

        move_uploaded_file($_FILES['bild']['tmp_name'], $bildpfad);

        $beitrag_id = $_POST['beitrag_id'];

        $query = 'UPDATE BEITRAG SET TITEL = "' . $_POST['titel'] . '", TEXT = "' . $_POST['text'] . '", BILDPFAD = "' . $bildpfad . '" WHERE ID = ' . $beitrag_id . ';';

        $result = mysqli_query($connection, $query);

        if (!isset($result)) {
            echo ('Invalid query: ' . mysqli_error($connection));
        }
    } else {

        $beitrag_id = $_POST['beitrag_id'];

        $query = 'UPDATE BEITRAG SET TITEL = "' . $_POST['titel'] . '", TEXT = "' . $_POST['text'] . '" WHERE ID = ' . $beitrag_id . ';';

        $result = mysqli_query($connection, $query);

        if (!isset($result)) {
            echo ('Invalid query: ' . mysqli_error($connection));
        }
    }
}

if (isset($_GET['id'])) {
    $beitrag_id = $_GET['id'];
}

if (isset($_POST['submit-delete-button'])) {

    $query = 'DELETE FROM BEITRAG WHERE ID = "' . $_POST['beitrag_id'] . '";';

    $result = mysqli_query($connection, $query);

    if (!isset($result)) {
        die('Invalid query: ' . mysqli_error($connection));
    }

    header('Location: blogs.php');
}

$query = 'SELECT * FROM BEITRAG WHERE ID = ' . $beitrag_id . ';';
$result = mysqli_query($connection, $query);

if (!isset($result)) {
    die('Invalid query: ' . mysqli_error($connection));
}

$row = $result->fetch_assoc();

$titel = $row['titel'];
$text = $row['text'];
$bild = $row['bildpfad'];
$autor = $row['autor'];

$connection->close();
?>

<html>

<head>
    <link rel="stylesheet" href="styles/blog-anzeigen.css">
    <meta charset="utf-8>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <div class="container">
            <?php
            if (isset($_POST['submit-create-button'])) {
                echo ('
                    <div class="nachricht font" id="nachricht">
                        <div>
                            Der Beitrag wurde erfolgreich erstellt.
                        </div>
                        <button class="nachricht-ausblenden">
                            <a href="#nachricht">
                                <img class="icon" src="../icons/close.svg">
                            </a>
                        </button>
                    </div>');
            }
            ?>
            <?php
            if (isset($_POST['submit-edit-button'])) {
                echo ('
                    <div class="nachricht font" id="nachricht">
                        <div>
                            Der Beitrag wurde erfolgreich bearbeitet.
                        </div>
                        <button class="nachricht-ausblenden">
                            <a href="#nachricht">
                                <img class="nachricht-icon" src="../icons/close.svg">
                            </a>
                        </button>
                    </div>');
            }
            ?>
            <div class="top sub-container">
                <image class="image" src=<?php echo ($bild); ?>>
            </div>

            <hr>

            <div class="mid sub-container">
                <div class="heading font">
                    <?php echo ($titel) ?>
                </div>
                <div class="interactions">
                    <div class="like">
                        <a>
                            <img class="icon" src="../icons/heart-circle-dark-red.svg">
                        </a>
                    </div>
                    <?php
                    if ($_SESSION['user_id'] === $autor) {
                        echo ('
                        <div class="edit">
                            <a href="blog-bearbeiten.php?id=' . $beitrag_id . '">
                                <img class="icon" src="../icons/create-dark-green.svg">
                            </a>
                        </div>
                        <div class="delete">
                            <form method="post" action="' . $_SERVER['PHP_SELF'] . '" onsubmit="return confirm(\'Sind Sie sich sicher, dass Sie den Beitrag löschen möchten?\')">
                                <button class="delete-button" type="submit" name="submit-delete-button">
                                    <img class="icon" src="../icons/trash.svg">
                                </button>
                                <input type="hidden" name="beitrag_id" value='.$beitrag_id.'>
                            <form>
                        </div>
                    ');
                    }
                    ?>
                </div>

            </div>

            <div class="bottom sub-container font">
                <div class="text">
                    <?php echo (nl2br($text)) ?>
                    <hr>
                </div>
                <div>
                    <?php echo ('geschrieben von ' . $autor) ?>
                </div>
            </div>
        </div>
    </main>

    <?php include('footer.html'); ?>
</body>

</html>