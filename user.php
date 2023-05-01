<?php
session_start();

if (isset($_POST['abmelden-button'])) {
    session_destroy();
    header('Location: anmeldung.php');
}

if (!isset($_SESSION['user_id'])) {
    header('Location: anmeldung.php');
}

if (isset($_SESSION['user_id'])) {
    $connection = mysqli_connect("localhost", "root", "", "foodblog");

    if (!isset($connection)) {
        die("Connection failed: " . $connection->error);
    }

    $query = 'SELECT * FROM USER WHERE ID = "' . $_SESSION['user_id'] . '";';
    $result = mysqli_query($connection, $query);

    if (!isset($result)) {
        die('Invalid query: ' . mysqli_error($connection));
    }

    $row = $result->fetch_assoc();

    $user_information = array();

    $user_information[] = $row['username'];
    $user_information[] = $row['password'];
}
?>

<html>

<head>
    <link rel="stylesheet" href="styles/user.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <div class="container">
            <div class="heading font">
                Userinformationen
            </div>
            <div class="info-container">
                <div class="spalte">
                    <div class="font info">
                        Username:
                    </div>
                    <div class="font info">
                        Passwort:
                    </div>
                </div>
                <div class="spalte">
                    <?php
                    foreach ($user_information as $info) {
                        echo ('
                            <div class="font info">' .
                            $info
                            . '</div>'
                        );
                    }
                    ?>
                </div>
            </div>

            <form method="post" action=<?php echo ('"' . $_SERVER['PHP_SELF'] . '"') ?>>
                <button class="button submit" type="submit" name="abmelden-button">
                    Abmelden
                </button>
            </form>
        </div>
    </main>

    <?php include('footer.html'); ?>
</body>

</html>