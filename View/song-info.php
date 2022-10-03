<?php
  include '../Controller/singles-controller.class.php';

  function getSongIdValue(){
    $querystring = $_SERVER['QUERY_STRING']; // retrieves the song_id query string from the href
    $songIdNumber = trim($querystring, "song_id=");
    return $songIdNumber;
  }

  $songController = new SingleSongController(getSongIdValue());
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
  $liveness = $songController->interpretLiveness($songObj->getLiveness());
  $valence = $songController->interpretValence($songObj->getValence());
  $acousticness = $songController->interpretAcousticness($songObj->getAcousticness());
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

  function makeSongAttributeBox($paramName, $paramInterpreted, $value, $lowEnd, $highEnd){
    echo "<div class='analysis-trait'>";
      echo "<h3> $paramName </h3>";
      echo "<p> $paramInterpreted </p>";
      if ($paramName != 'BPM'){
        echo $lowEnd. "<progress class='progress-bar' value=" . $value . " min='0' max='100'> </progress>" . $highEnd;
      }
      else{
        echo $lowEnd . "<progress class='progress-bar' value=" . $value . " min='50' max='210'></progress> " . $highEnd;
      }
    echo "</div>";
  }

  function makeSongInfoAnalysis($bpm, $energy, $danceability, $liveness, $valence, $acousticness, $speechiness, $popularity, $songObj){
    echo "<div class='song-info analysis'>";
      makeSongAttributeBox('Popularity', $popularity, $songObj->getPopularity(), 'Not Popular', 'Very Popular');
      makeSongAttributeBox('BPM', $bpm, $songObj->getBpm(), '50 BPM', '210 BPM');
      makeSongAttributeBox('Energy', $energy, $songObj->getEnergy(), 'Low Energy', 'High Energy');
      makeSongAttributeBox('Valence', $valence, $songObj->getValence(), 'Sad Mood', 'Happy Mood');
      makeSongAttributeBox('Acousticness', $acousticness, $songObj->getAcousticness(), 'Not Acoustic', 'Very Acoustic');
      makeSongAttributeBox('Speechiness', $speechiness, $songObj->getSpeechiness(), 'Less lyrics', 'More lyrics');
      makeSongAttributeBox('Liveness', $liveness, $songObj->getLiveness(), 'No audience', 'High audience');
      makeSongAttributeBox('Danceability', $danceability, $songObj->getDanceability(), "Don't DANCE", 'DANCE!');
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
      makeSongInfoAnalysis($bpm, $energy, $danceability, $liveness, $valence, $acousticness, $speechiness, $popularity, $songObj);
     ?>
   </main>
   <footer> </footer>
</body>
</html>
