<?php
  class DatabaseConnection{
    # Localhost connection Info
    
    // private $dbHost = 'localhost';
    // private $dbUser = 'root';
    // private $dbPass = '';
    // private $dbName = "music";

    // Connecting to the heroku website
    private $jawsdb_url = parse_url(getenv("JAWSDB_URL"));
    private $dbHost = $jawsdb_url["host"];
    private $dbUser = $jawsdb_url["user"];
    private $dbPass = $jawsdb_url["pass"];
    private $dbName = "bzl6nuctkx4sa2vr";

    $active_group = 'default';
    $query_builder = TRUE;
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
