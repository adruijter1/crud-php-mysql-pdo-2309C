<?php
    // In het configuratiebestand staan alle inloggegevens van de database
    include('config/config.php');

    /**
     * Het array $_POST wordt schoongemaakt (spaties en quotejes weg)
     */
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    /**
     * Maak een datasourcename string met inloggegevens 
     */
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";

    /**
     * Maak een nieuw PDO-Object aan en geeft de connectiestring, gebruiker en password mee
     */
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    /**
     * Maak een insert-query en gebruik placeholders in plaats van het $_POST-array
     */
    $sql = "INSERT INTO Persoon (Voornaam
                                ,Tussenvoegsel
                                ,Achternaam
                                ,Woonplaats
                                ,Geboortedatum
                                ,Lichaamslengte)
            VALUES              (:firstname
                                ,:infix
                                ,:lastname
                                ,:city
                                ,:date
                                ,:length)";

    /**
     * Prepareer de query
     */
    $statement = $pdo->prepare($sql);

    /**
     * Bind de $_POST waarden aan de placeholders
     */
    $statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
    $statement->bindValue(':infix', $_POST['infix'], PDO::PARAM_STR);
    $statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
    $statement->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
    $statement->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
    $statement->bindValue(':length', $_POST['length'], PDO::PARAM_INT);

    /**
     * Voer de query uit
     */
    $statement->execute();

    /** 
     * Wacht 3 seconden op deze pagina en ga dan naar index.php
     */
    header('Refresh:3; index.php');

    /**
     * Zet deze tekst gedurende 3 seconden op het scherm
     */
    echo "De gegevens zijn opgeslagen in de database";


    
?>