<?php
  define('DBHOST', 'localhost');
  define('DBNAME', 'music');
  define('DBUSER', 'root');
  define('DBPASS', '');
  define('DNS', "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";");
  function getConnection($dns, $dbuser, $dbpass){$pdo = new PDO($dns, $dbuser, $dbpass)} ?>
