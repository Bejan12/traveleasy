<?php
/**
 * Dit is de database class die alle communicatie met de database verzorgt
 */

class Database
{
    private $dbHost = DB_HOST;
    private $dbName = DB_NAME;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;

    private $dbHandler;
    private $statement;

    public function __construct()
    {
        /**
         * Dit is de connectiestring die nodig voor het maken van een
         * nieuw PDO object
         */
        $conn = 'mysql:host=' . $this->dbHost . ';port=3308;dbname=' . $this->dbName;

        /**
         * We geven nog wat options mee voor het PDO-object om 
         * fouten weer te geven
         */
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            /**
             * Maken we een verbinding met de database mysql server
             */
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            /**
             * Wanneer er een error optreedt, wordt er een PDOException object 
             * aangemaakt met informatie over de error
             */
            echo 'Connection failed: ' . $e->getMessage();
            $this->dbHandler = null; // Ensure dbHandler is null on failure
        }
    }

    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    public function resultSet()
    {
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Deze methode bind de waardes aan de parameters in de query
     */
    public function bind($parameter, $value, $type = null)
    {
        $this->statement->bindValue($parameter, $value, $type);
    }

    /**
     * Deze methode voert de query uit
     */
    public function execute()
    {
        return $this->statement->execute();
    }

    public function single()
    {
        $this->statement->execute();
        $result = $this->statement->fetch(PDO::FETCH_OBJ);
        $this->statement->closecursor();
        return $result;
    }
}