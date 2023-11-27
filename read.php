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
