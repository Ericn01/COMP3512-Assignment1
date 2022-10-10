<?php
  include "database-connection.class.php";
  /*
  * This class will contain the methods that interact with the DB to fulfill the
  * home page requirements. That is, retrieving the top 10 songs from the given criteria.
  * A lot of the code here is fairly similar, because the mechanism to retrieve the data is always the same.
  * The queries themselves change a lot though.
  */
 class HomeEntries extends DatabaseConnection{
    # Returns the top genres based on the number of songs within the list.
    protected function getTopGenres(){
      $sql = "SELECT genres.genre_name AS `Genre`, COUNT(song_id) AS `Song Count`
              FROM genres
              INNER JOIN songs ON genres.genre_id = songs.genre_id
              GROUP BY genres.genre_id
              ORDER BY `Song Count` DESC
              LIMIT 10";
      $results = $this->databaseConnect()->query($sql);
      return $results;
    }
    # Returns the top artists, based on the number of songs they have in top songs list.
    protected function getTopArtists(){
      $sql = "SELECT artists.artist_name AS `Artist Name`, COUNT(song_id) AS `Song Count`
              FROM artists
              INNER JOIN songs ON artists.artist_id = songs.artist_id
              GROUP BY artists.artist_id
              ORDER BY `Song Count` DESC
              LIMIT 10";
      $results = $this->databaseConnect()->query($sql);
      return $results;
    }

    # Returns the most popular songs on spotify within the list.
    function getMostPopularSongs(){
      $sql = "SELECT songs.title AS `Song Name`, songs.year AS `Year`, artists.artist_name AS `Artist Name`
              FROM artists
              INNER JOIN songs ON artists.artist_id = songs.artist_id
              GROUP BY artists.artist_id
              ORDER BY songs.popularity DESC
              LIMIT 10";
      $results = $this->databaseConnect()->query($sql);
      return $results;
    }
    # Returns artists who only have one song in the DB. Sorted by song popularity.
    # Only way I can think of doing this one is to use a subquery to check the
    # number of appearences of a certain artist,
    protected function getOneHitWonders(){
      $sql = "SELECT artists.artist_name AS `Artist Name`, songs.title AS `Song Title`
              FROM songs
              INNER JOIN artists ON artists.artist_id = songs.artist_id
              GROUP BY songs.artist_id
              HAVING COUNT(songs.song_id) = 1
              ORDER BY songs.popularity DESC
              LIMIT 10";
      $results = $this->databaseConnect()->query($sql);
      return $results;
    }
    # Returns the most acoustic songs with the longest length.
    protected function getLongestAcousticSongs(){
      $sql = "SELECT title AS `Song Title`, acousticness, duration
              FROM songs
              WHERE acousticness > 40
              ORDER BY duration DESC
              LIMIT 10";
      $results = $this->databaseConnect()->query($sql);
      return $results;
    }
    # Best club songs according to danceability -> Calculated field determines Club Suitability score.
    protected function getClubSongs(){
      $sql = "SELECT title AS `Song Title`, (danceability * 1.6 + energy * 1.4) AS `Clubbing Score`
              FROM songs
              WHERE danceability > 80
              ORDER BY `Clubbing Score` DESC
              LIMIT 10";
      $results = $this->databaseConnect()->query($sql);
      return $results;
    }
    # Query to retrieve the best running songs on Spotify according to the given calculation.
    protected function getRunningSongs(){
      $sql = "SELECT title AS `Song Title`, (energy * 1.3 + valence * 1.6) AS `Running Score`
              FROM songs
              WHERE bpm BETWEEN 120 AND 125
              ORDER BY `Running Score` DESC
              LIMIT 10";
      $results = $this->databaseConnect()->query($sql);
      return $results;
    }
    # Query to retrieve the best studying songs on Spotify according to the given calculation, and DB.
    protected function getStudyingSongs(){
      $sql = "SELECT title AS `Song Title`, (acousticness*0.8)+(100-speechiness)+(100-valence) AS `Studying Score`
              FROM songs
              WHERE bpm BETWEEN 100 AND 125
              AND speechiness BETWEEN 1 AND 20
              ORDER BY `Studying Score` DESC
              LIMIT 10";
      $results = $this->databaseConnect()->query($sql);
      return $results;
    }
  }
?>
