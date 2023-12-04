<?php

    /**
     * Maak een verbinding met de de mysql-server en database
     */

    /**
     * Haal de inloggegevens binnen met een include
     */
     include('config/config.php');

    /**
     * Maak een datasourcename-string voor het maken van een PDO-Object
     */
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";

    /**
     * Maak een nieuw PDO-object aan 
     */
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    /**
     * Maak een nieuwe SELECT-query voor het opvragen van de data uit de database-tabel
     */
    $sql = "SELECT Voornaam
                  ,Tussenvoegsel
                  ,Achternaam
                  ,Woonplaats
                  ,Geboortedatum
                  ,Lichaamslengte
            FROM   Persoon";

    /**
     * Prepareer de query
     */
    $statement = $pdo->prepare($sql);

    /**
     * Voer de query uit op de database
     */
    $statement->execute();

    /**
     * Haal de geselecteerde records binnen
     */
    $result = $statement->fetchAll(PDO::FETCH_OBJ);

    /**
     * Laat de opgehaalde records uit de database zien
     */
    var_dump($result);


?>

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

    <table>
        <thead>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Woonplaats</th>
            <th>Geboortedatum</th>
            <th>Lichaamslengte</th>
        </thead>
        <tbody>
            <tr>
                <td>Fred</td>
                <td>de</td>
                <td>Bakker</td>
                <td>Amsterdam</td>
                <td>30-08-1967</td>
                <td>193</td>
            </tr>
        </tbody>    
    </table>

</body>
</html>
    
