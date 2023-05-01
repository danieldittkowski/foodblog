<?php
$connection = mysqli_connect("localhost", "root", "", "foodblog");

if (isset($_POST['submit-button'])) {

    if ($_POST['password'] != $_POST['password2']) {
        $fehler['password'] = "Die Passwörter stimmen nicht überein.";
    }

    $query = 'SELECT * FROM USER WHERE USERNAME = "' . $_POST['username'] . '";';
    $result = mysqli_query($connection, $query);

    if (!isset($result)) {
        die('Invalid query: ' . mysqli_error($connection));
    }

    $row = $result->fetch_assoc();

    if (isset($row)) {
        $fehler['username'] = "Dieser Username ist bereits vergeben.";
    }
}

if (!isset($fehler) && isset($_POST['submit-button'])) {
    $query = 'INSERT INTO USER(USERNAME, PASSWORD) VALUES("' . $_POST['username'] . '", "' . $_POST['password'] . '");';

    $result = mysqli_query($connection, $query);

    if (!isset($result)) {
        die('Invalid query: ' . mysqli_error($connection));
    }

    header('Location: anmeldung.php');
}

$connection->close();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/registrierung.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <div class="container">
            <?php
                if(isset($fehler['username'])) {
                    echo('
                    <div class="fehler font" id="fehler-nachricht">
                        <div>'.
                            $fehler['username']
                        .'</div>
                        <button class="fehler-ausblenden">
                            <a href="#fehler-nachricht">
                                <img class="icon" src="../icons/close.svg">
                            </a>
                        </button>
                    </div>');
                }
                if(isset($fehler['password'])) {
                    echo('
                    <div class="fehler font" id="fehler-nachricht">
                        <div>'.
                            $fehler['password']
                        .'</div>
                        <button class="fehler-ausblenden">
                            <a href="#fehler-nachricht">
                                <img class="icon" src="../icons/close.svg">
                            </a>
                        </button>
                    </div>');
                }
            ?>
            <div class="heading font">
                Registrierung
            </div>
            <div class="form-container">
                <form method="post" action=<?php echo ('"' . $_SERVER['PHP_SELF'] . '"') ?>>
                    <div class="form-content">
                        <div>
                            <?php
                            if (isset($fehler['username'])) {
                                echo ('
                                        <input class="input font username" type="text" name="username" placeholder="Username" value="' . $_POST['username'] . '"required>
                                    ');
                            }
                            if (!isset($fehler['username'])) {
                                echo ('
                                        <input class="input font" type="text" name="username" placeholder="Username" required>
                                    ');
                            }
                            ?>
                        </div>
                        <div>
                            <?php
                            if (isset($fehler['username'])) {
                                echo ('
                                        <input class="input font password" type="password" name="password" placeholder="Passwort" required value="' . $_POST['password'] . '">
                                    ');
                            }
                            if (!isset($fehler['username'])) {
                                echo ('
                                        <input class="input font" type="password" name="password" placeholder="Passwort" required>
                                    ');
                            }
                            ?>
                        </div>
                        <div>
                            <?php
                            if (isset($fehler['username'])) {
                                echo ('
                                        <input class="input font password" type="password" name="password2" placeholder="Passwort wiederholen" required value="' . $_POST['password2'] . '">
                                    ');
                            }
                            if (!isset($fehler['username'])) {
                                echo ('
                                        <input class="input font" type="password" name="password2" placeholder="Passwort wiederholen" required>
                                    ');
                            }
                            ?>
                        </div>
                        <div class="button-container">
                            <a class="font anmelden button" href="anmeldung.php">
                                Hier anmelden
                            </a>
                            <input class="font submit button" type="submit" name="submit-button" value="Registrieren">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include('footer.html'); ?>
</body>

</html>