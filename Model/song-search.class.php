<?php
    include 'database-connection.class.php';
    class SongSearch extends DatabaseConnection{

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
    }
?>
