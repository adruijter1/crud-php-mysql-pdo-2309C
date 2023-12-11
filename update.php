<?php
    /**
     * Voeg de inloggegevens toe
     */
    include('config/config.php');

    /**
     * Maak een datasourcename string
     */
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";

    /**
     * We hebben nu verbinding met de MySQL-server
     */
    $pdo = new PDO($dsn, $dbUser, $dbPass);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "UPDATE Persoon
                SET    Voornaam = :voornaam
                      ,Tussenvoegsel = :tussenvoegsel
                      ,Achternaam = :achternaam
                      ,Woonplaats = :woonplaats
                      ,Geboortedatum = :geboortedatum
                      ,Lichaamslengte = :lichaamslengte
                WHERE Id = :id";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(':voornaam', $_POST['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':tussenvoegsel', $_POST['infix'], PDO::PARAM_STR);
        $statement->bindValue(':achternaam', $_POST['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':woonplaats', $_POST['city'], PDO::PARAM_STR);
        $statement->bindValue(':geboortedatum', $_POST['date'], PDO::PARAM_STR);
        $statement->bindValue(':lichaamslengte', $_POST['length'], PDO::PARAM_INT);
        $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);

        $statement->execute();

        echo "Het record is geupdate";

        header("Refresh:2; read.php");
        exit();
    }

    /**
     * Maak een select-query om het record dat je wilt updaten te 
     * selecteren.
     */
    $sql = "SELECT Voornaam
                  ,Tussenvoegsel
                  ,Achternaam
                  ,Woonplaats
                  ,Geboortedatum
                  ,Lichaamslengte
            FROM  Persoon
            WHERE Id = :id";
    /**
     * Maak de query klaar voor het PDO-object
     */
    $statement = $pdo->prepare($sql);

    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_OBJ);

    // var_dump($result);

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <title>CRUD</title>
    </head>
    <body>
        <h3>Update</h3>

        <!-- Maak een formulier met HTML5 -->
    <form action="update.php" method="post">
        <label for="firstname">Voornaam:</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $result->Voornaam; ?>"><br><br>

        <label for="tussenvoegsel">Tussenvoegsel:</label>
        <input type="text" name="infix" id="infix" value="<?php echo $result->Tussenvoegsel; ?>"><br><br>

        <label for="lastname">Achternaam:</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $result->Achternaam; ?>"><br><br>

        <!-- Maak een nieuw formulierveld voor het opslaan van de woonplaats in de database -->

        <label for="city">Woonplaats: </label>
        <input type="text" name="city" id="city" value="<?php echo $result->Woonplaats; ?>"><br><br>

        <!-- Maak een nieuw formulierveld voor het opslaan van de geboortedatum in de database -->

        <label for="">Geboortedatum: </label>
        <input type="date" name="date" id="date" value="<?php echo $result->Geboortedatum; ?>"><br><br>

        <!-- Maak een nieuw formulierveld Lichaamslengte voor het opslaan in de database -->

        <label for="length">Lichaamslengte (cm): </label>
        <input type="number" name="length" id="length" value="<?php echo $result->Lichaamslengte; ?>"><br><br>

        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <input type="submit" value="Verzend">

        <!-- Maak twee andere input-tags waarin je een tussenvoegsel en achternaam kunt invullen -->


    </form>

    </body>
    </html>

