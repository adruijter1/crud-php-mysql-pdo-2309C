<?php
    var_dump($_POST);
    include('config/config.php');

    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";

    $pdo = new PDO($dsn, $dbUser, $dbPass);

    $sql = "INSERT INTO Persoon (Id
                                ,Voornaam
                                ,Tussenvoegsel
                                ,Achternaam
                                ,Woonplaats)
            VALUES              (NULL
                                ,'" . $_POST['firstname'] . "'
                                ,'" . $_POST['infix'] . "'
                                ,'" . $_POST['lastname'] . "'
                                ,'" . $_POST['city'] . "')";

    echo $sql;
    $statement = $pdo->prepare($sql);
    $statement->execute();


    //echo "Mijn naam is: " . $_POST['firstname'] . " " . $_POST['infix'] . " " . $_POST['lastname'];

    //echo "Mijn geboortedatum is:"; 
?>