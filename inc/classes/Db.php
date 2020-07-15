<?php

    namespace Itrust;

class Db {
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "lina";

    private $connection;

    private static $instance = null;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Db();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $this->connection = new \PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function execute($sql) {
        $this->connection->exec($sql);
    }

    public function getResults($sql, $single = false) {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        $results = $stmt->fetchAll();

        if(!$results) {
            return [];
        }

        if($single) {
            return $results[0];
        }

        return $results;
    }
}
