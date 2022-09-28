<?php
  class DatabaseConnection{
    private $dbHost = 'localhost';
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "music";

    # Establishing a connection with the database
    # We only want classes that extend this class to be able to access the DB, hence protected.
    protected function databaseConnect(){
      $dsn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
      $pdo = new PDO($dsn, $this->dbUser, $this->dbPass);
      // Setting the default fetch attribute to be associative arrays.
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
    }
  }
?>
