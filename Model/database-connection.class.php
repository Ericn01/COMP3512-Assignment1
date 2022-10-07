<?php
  class DatabaseConnection{
    # Localhost connection Info

    // private $dbHost = 'localhost';
    // private $dbUser = 'root';
    // private $dbPass = '';
    // private $dbName = "music";

    // Connecting to the heroku website -> using JawsDB API
    private $dbHost = "au77784bkjx6ipju.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $dbUser = "p2fhaaxgj3j8u69t";
    private $dbPass = "hi54nvd4jqqaio44";
    private $dbName = "bzl6nuctkx4sa2vr";

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
