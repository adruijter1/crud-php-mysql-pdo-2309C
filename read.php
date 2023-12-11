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
    $sql = "SELECT Id
                  ,Voornaam
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
    // var_dump($result);

    /**
     * We zetten de gegevens uit de database in een html structuur
     */
    $tableRows = "";

    foreach ($result as $personInfo) {
        $date = date_format(date_create($personInfo->Geboortedatum), 'd-m-Y');
        $tableRows .= "<tr>
                            <td>$personInfo->Voornaam</td>
                            <td>$personInfo->Tussenvoegsel</td>
                            <td>$personInfo->Achternaam</td>
                            <td>$personInfo->Woonplaats</td>
                            <td>$date</td>
                            <td>$personInfo->Lichaamslengte</td>
                            <td>
                                <a href='update.php?id=$personInfo->Id'><img src='img/b_edit.png' alt='pencil'></a>
                            </td>
                       </tr>";
    } 


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
    <h3>Persoonsgegevens</h3>
    <table>
        <thead>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Woonplaats</th>
            <th>Geboortedatum</th>
            <th>Lichaamslengte</th>
            <th>Wijzigen</th>
        </thead>
        <tbody>
            <?php echo $tableRows; ?>
        </tbody>    
    </table>

</body>
</html>
    
