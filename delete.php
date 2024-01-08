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
     * Maak een delete-query
     */
    $sql = "DELETE FROM Persoon WHERE Id = :id";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

    $statement->execute();

    echo "Het record is succesvol verwijderd";

    header("Refresh: 3; read.php");