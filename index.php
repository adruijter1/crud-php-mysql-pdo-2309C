<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>CRUD PHP</title>
</head>
<body>
    <h3>CRUD met PHP en PDO</h3>

    <!-- Maak een formulier met HTML5 -->
    <form action="create.php" method="post">
        <label for="firstname">Voornaam:</label>
        <input type="text" name="firstname" id="firstname"><br><br>

        <label for="tussenvoegsel">Tussenvoegsel:</label>
        <input type="text" name="infix" id="infix"><br><br>

        <label for="lastname">Achternaam:</label>
        <input type="text" name="lastname" id="lastname"><br><br>

        <!-- Maak een nieuw formulierveld voor het opslaan van de woonplaats in de database -->

        <label for="city">Woonplaats: </label>
        <input type="text" name="city" id="city"><br><br>

        <!-- Maak een nieuw formulierveld voor het opslaan van de geboortedatum in de database -->

        <label for="">Geboortedatum: </label>
        <input type="date" name="date" id="date"><br><br>

        <input type="submit" value="Verzend">

        <!-- Maak twee andere input-tags waarin je een tussenvoegsel en achternaam kunt invullen -->


    </form>
</body>
</html>