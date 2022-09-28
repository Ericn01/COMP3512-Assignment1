<?php
  include '../Model/single-song.class.php';

  /* I'm going to use this class to organize the presentation of
  the data that I want to present (example: x song is #y most [analysis_data]),
  along with formatting it in the proper way (seconds to minutes) for duration.
  The markup is going to be generated here, sent to the view and then CSS styling
  will be applied on top from there. */
  class SingleSongController extends SingleSong{
    public function fetchSongs(){
      $songData = $this->getSongs();

      // // Retrieving the base info (Array1 out of the query result)
      // $songTitle = $songData['title'];
      // $artistName = $songData['Artist Name'];
      // $genre = $songData['genre_id'];
      // $year = $songData['year'];
      // $duration = $songData['duration'];
      // // Retrievign the analysis data (Array2)
      // $bpm = $songData['bpm'];
      // $energy = $songData['energy'];
      // $danceability = $songData['danceability'];
      // $liveness = $songData['liveness'];
      // $valence = $songData['valence'];
      // $acousticness = $songData['acousticness'];
      // $speechiness = $songData['speechiness'];
      // $popularity = $songData['popularity'];
      // // Creating two seperate arrays
      // $baseArr = array($songTitle, $artistName, $genre, $year, $duration);
      // $analysisArr = array($bpm, $energy, $danceability, $liveness, $valence,
      //                 $acousticness, $speechiness, $popularity);
      // // Returning both arrays in a single package
      // return array($baseArr, $analysisArr);
    }
  }
?>
