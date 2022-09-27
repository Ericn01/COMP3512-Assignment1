<?php
  include "database-connection.class.php";
  class HomeEntries extends DatabaseConnection{
    private $songLimit = 10;

    function getTopGenres(){
      $sql = "SELECT genres.genre_name AS `Genre`, COUNT(song_id) AS `Song Count`
              FROM genres
              INNER JOIN songs ON genres.genre_id = songs.genre_id
              GROUP BY genres.genre_id
              ORDER BY `Song Count` DESC
              LIMIT 10";
      $results = $this->databaseConnect()->query($sql);
      return $results;
    }
    function getTopArtists(){

    }
    function getMostPopularSongs(){

    }

    function getOneHitWonders(){

    }

    function getLongestAcousticSongs(){

    }

    function getClubSongs(){

    }

    function getRunningSongs(){

    }

    function getStudyingSongs(){

    }

  }


?>
