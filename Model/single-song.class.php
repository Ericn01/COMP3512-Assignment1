<?php
  include "database-connection.class.php";
  class SingleSong extends DatabaseConnection{
      protected function getSongBaseInfo(){
        $sql = "SELECT title, artists.artist_name AS `Artist Name`,


                FROM songs
                INNER JOIN artists ON artists.artist_id = songs.artist_id
                ";
        $songs = $this->databaseConnect()->query($sql);
        return $songs;
      }

      protected function
  }
?>
