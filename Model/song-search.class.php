<?php
    include 'database-connection.class.php';
    class SongSearch extends DatabaseConnection{
        private static $baseSql = "SELECT title, artist, genre, popularity FROM songs";
        protected function getgenres(){
            $sql = "SELECT genre_name AS `Genre Name` FROM genres ORDER BY genre_name";
            $result = $this->databaseConnect()->query($sql);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
        protected function getartists(){
            $sql = "SELECT artist_name AS `Artist Name` FROM artists ORDER BY artist_name";
            $result = $this->databaseConnect()->query($sql);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }

        // Possible queries from the song search page
        protected function getSongByField($paramName, $value){
          $sql = self::$baseSql .= " WHERE $paramName LIKE %?%";
          $statement = $this->databaseConnect()->prepare($sql);
          $statement->execute([$value]);
          $results = $statement->fetchAll();
        }
        protected function getSongByYearLess($year){
          $sql = self::$baseSql .= ' WHERE year < ?';
          $statement = $this->databaseConnect()->prepare($sql);
          $statement->execute([$year]);
          $results = $statement->fetchAll();
        }
        protected function getSongByYearGreater($year){
          $sql = self::$baseSql .= ' WHERE year > ?';
          $statement = $this->databaseConnect()->prepare($sql);
          $statement->execute([$year]);
          $results = $statement->fetchAll();
        }
        protected function getSongBetweenValues($paramName, $lowBound, $highBound){
          $sql = self::$baseSql .= "WHERE $paramName BETWEEN ? AND ?";
          $statement = $this->databaseConnect()->prepare($sql);
          $statement->execute([$lowBound, $highBound]);
          $results = $statement->fetchAll();
        }

    }
?>
