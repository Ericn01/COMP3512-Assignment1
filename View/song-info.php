<?php
  include '../Controller/singles-controller.class.php';

  $songController = new SingleSongController('1150');
  $songObj = $songController->singleSong();

  // Song info title
  $title = $songObj->getTitle();
  $year = $songObj->getYear();
  $artist = $songObj->getArtist();
  // Song Info Basic
  $genre = $songObj->getGenre();
  $duration = $songObj->getDurationMinutes();
  // Song info analysis
  $bpm = $songController->interpretBpm($songObj->getBpm());
  $energy = $songController->interpretEnergy($songObj->getEnergy());
  $danceability = $songController->interpretDanceability($songObj->getDanceability());
  $liveness = $songObj->getLiveness();
  $valence = $songController->interpretValence($songObj->getValence());
  $acousticness = $songObj->getAcousticness();
  $speechiness = $songController->interpretSpeechiness($songObj->getSpeechiness());
  $popularity = $songController->interpretPopularity($songObj->getPopularity());

  function makeSongInfoTop($title, $year, $artist){
    echo "<div class='song-info top'>";
      echo "<h1> $title [$year] </h1>";
      echo "<h3 class='artist-name'> Produced by $artist </h3>";
    echo "</div>";
  }
  function makeSongInfoBasic($genre, $duration){
    echo "<div class='song-info basic'>";
      echo "<h3> Song genre: $genre </h3>";
      echo "<h3> Duration: $duration minutes </h3>";
    echo "</div>";
  }
  function makeSongInfoAnalysis($bpm, $energy, $danceability, $liveness, $valence, $acousticness, $speechiness, $popularity){
    echo "<div class='song-info analysis'>";
      echo "<h3> Analysis Data </h3>";
      echo "<p> Popularity: $popularity </p>";
      echo "<p> BPM: $bpm </p>";
      echo "<p> Energy: $energy </p>";
      echo "<p> Danceability: $danceability </p>";
      echo "<p> Liveness: $liveness% </p>";
      echo "<p> Valence: $valence </p>";
      echo "<p> Acousticness: $acousticness% </p>";
      echo "<p> Speechiness: $speechiness </p>";
    echo "</div>";
  }
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Home Page </title>
   <link href="css/single-info-styles.css" rel="stylesheet">
   <link href="css/font-selection.css" rel="stylesheet">
</head>
<body>
   <header> </header>
   <main class="grid-container">
     <?php
      makeSongInfoTop($title, $year, $artist);
      makeSongInfoBasic($genre, $duration);
      makeSongInfoAnalysis($bpm, $energy, $danceability, $liveness, $valence, $acousticness, $speechiness, $popularity);
     ?>
   </main>
   <footer> </footer>
</body>
</html>
