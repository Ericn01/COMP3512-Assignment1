<?php
    include 'database-connection.class.php';
    class SongSearch extends DatabaseConnection{
        protected function getGenreOptions(){
            $sql = "SELECT genre_name FROM genres ORDER BY genre_name";
            $result = $this->databaseConnect()->query($sql);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }

        protected function getArtistOptions(){
            $sql = "SELECT artist_name FROM artists ORDER BY artist_name";
            $result = $this->databaseConnect()->query($sql);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
    }
?>