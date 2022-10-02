<?php
    include 'database-connection.class.php';
    class SongSearch extends DatabaseConnection{
        private static $baseSql = "SELECT title, artist_name, year, genre_name, popularity FROM songs INNER JOIN artists
                                   ON artists.artist_id = songs.artist_id INNER JOIN genres ON genres.genre_id = songs.genre_id";
        protected function getgenres(){
            $sql = "SELECT genre_name AS `Genre Name` FROM genres ORDER BY genre_name";
            $result = $this->databaseConnect()->query($sql);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
        protected function getartists(){
            $sql = "SELECT artist_name AS `Artist Name` FROM artists ORDER BY artist_name ";
            $result = $this->databaseConnect()->query($sql);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }

        // Possible queries from the song search page
        protected function getSongByField($paramName, $value){
          $sql = self::$baseSql;
          if ($paramName == "year"){

          }
          $sql .= " WHERE $paramName LIKE CONCAT('%', ?, '%') ORDER BY songs.song_id"; // Append the where clause for single parameter
          $statement = $this->databaseConnect()->prepare($sql);
          $statement-> execute([$value]);
          $results = $statement->fetchAll();
          return $results;
        }
        protected function getSongByFieldLessOrGreater($param, $data){
          $val = $data[0];
          $selection = $data[1];
          $sql = self::$baseSql;
          if ($selection == 'less'){
            $sql .= " WHERE $param < ?";
          }
           else if ($selection == 'greater') {
            $sql .= " WHERE $param > ?";
          }
          $statement = $this->databaseConnect()->prepare($sql);
          $statement->execute([$val]);
          $results = $statement->fetchAll();
        }

        protected function getSongBetweenValues($paramName, $lowBound, $highBound){
          $sql = $this->appendInnerJoins(self::$baseSql);
          $sql .= "WHERE $paramName BETWEEN ? AND ?";
          $statement = $this->databaseConnect()->prepare($sql);
          $statement->execute([$lowBound, $highBound]);
          $results = $statement->fetchAll();
        }
    }
?>
