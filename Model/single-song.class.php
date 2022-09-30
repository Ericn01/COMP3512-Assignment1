<?php
  include "database-connection.class.php";
  class SingleSong extends DatabaseConnection{
    // The model for this class is going to retrieve a large query that contains
    // all the song info, the artist name, and the genre name based on the provided song_id
    // All future processing will be done by the controller class
      protected function getSongData($song_id){
        # didn't need to be explicit with every column name, but I want to keep the style the same throughout the query.
        $singleSongSql = "SELECT songs.song_id AS `id`, songs.title AS `title`, songs.year AS `year`,
                          songs.bpm AS `bpm`, songs.energy AS `energy`, songs.danceability AS `danceability`,
                          songs.loudness AS `loudness`, songs.liveness AS `liveness`, songs.valence AS `valence`,
                          songs.duration AS `duration`, songs.acousticness AS `acousticness`, songs.speechiness AS `speechiness`,
                          songs.popularity AS `popularity`, artists.artist_name `artist`, genres.genre_name AS `genre`
                          FROM songs
                          INNER JOIN artists ON artists.artist_id=songs.artist_id
                          INNER JOIN genres ON genres.genre_id = songs.genre_id
                          WHERE songs.song_id = ?";
        $results = $this->databaseConnect()->prepare($singleSongSql);
        $results->execute([$song_id]);
        $rows = $results->fetchAll();
        return $rows;
      }
  }
?>
