<?php
    include 'database-connection.class.php';
    class SongSearch extends DatabaseConnection{
        private static $baseSql = "SELECT song_id, title, artist_name, year, genre_name, popularity FROM songs INNER JOIN artists
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

        # =============================== HOME PAGE QUERIES ================================ #
        protected function getTopGenres(){

        }
        # =========================== FAVORITES PAGE CONSTRUCTED QUERY ====================== #
        public function getFavorite($songId){
          $sql = self::$baseSql;
          $sql .= " WHERE song_id = ?";
          $statement = $this->databaseConnect()->prepare($sql);
          $statement-> execute([$songId]);
          $result = $statement->fetch();
          return $result;
        }
        # ========================= SEARCH PAGE CONSTRUCTED QUERIES ======================= #
        // Possible queries from the song search page
        protected function getSongByField($paramName, $value){
          $sql = self::$baseSql;
          $sql .= " WHERE $paramName LIKE CONCAT('%', ?, '%') ORDER BY songs.song_id"; // Append the where clause for single parameter
          $statement = $this->databaseConnect()->prepare($sql);
          $statement-> execute([$value]);
          $results = $statement->fetchAll();
          return $results;
        }
        // Retrieves and return songs based on a greater or less than value
        protected function getSongByFieldLessOrGreater($param, $data){
          $value = $data[0]; // The value within the first index of the data array (slider value)
          $selection = $data[1]; // The user's radio button selection (less or greater)
          $sql = self::$baseSql;
          if ($selection == 'less'){
            $sql .= " WHERE $param < ?";
          }
           else if ($selection == 'greater') {
            $sql .= " WHERE $param > ?";
          }
          echo $sql . ":" . $value;
          $statement = $this->databaseConnect()->prepare($sql);
          $statement->execute([$value]);
          $results = $statement->fetchAll();
          return $results;
        }
        // Retrieves song entries between two year values.
        protected function getSongBetweenValues($paramName, $lowBound, $highBound){
          $sql = self::$baseSql;
          $sql .= " WHERE $paramName BETWEEN ? AND ?";
          $statement = $this->databaseConnect()->prepare($sql);
          $statement->execute([$lowBound, $highBound]);
          $results = $statement->fetchAll();
          return $results;
        }
        protected function getAllSongs(){
          $results = $this->databaseConnect()->query(self::$baseSql);
          return $results;
        }
    }
?>
