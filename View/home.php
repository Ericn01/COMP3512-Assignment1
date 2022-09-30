<!DOCTYPE html>
<?php
  include '../Controller/home-controller.class.php';
  $homeControl = new HomePageController();

  function viewTopGenres($controller){
    $topGenres = $controller->topGenres();
    echo "<ol>";
    foreach($topGenres as $genre) {
      echo "<li> " . $genre['Genre'] . " -> " . $genre['Song Count'] . " songs </li>";
    }
    echo "</ol>";
  }

  function viewPopularSongs($controller){
    $popularSongs = $controller->popularSongs();
    echo "<ol>";
    foreach($popularSongs as $row){
      echo "<li> " . $row['Song Name'] . " (" . $row['Year'] . ") - " . $row['Artist Name'] . "</li>";
    }
    echo "</ol>";
  }

  function viewTopArtists($controller){
    $topArtists = $controller->topArtists();
    echo "<ol>";
    foreach($topArtists as $row){
      echo "<li> " . $row['Artist Name'] . " -> " . $row['Song Count'] . " songs. </li>";
    }
    echo "</ol>";
  }

  function viewLongestAcousticSongs($controller){
    $acousticSongs = $controller->longestAcousticSongs();
    echo "<ol>";
    foreach($acousticSongs as $row){
      echo "<li> " . $row['Song Title'] . " -> " . $row['duration'] . " Acoustic score: " . $row['acousticness'] . "% </li>";
    }
    echo "</ol>";
  }

  function viewRunningSongs($controller){
    $runningSongs = $controller->runningSongs();
    echo "<ol>";
    foreach($runningSongs as $row){
      echo "<li> " . $row['Song Title'] . ". Running Score: " . round($row['Running Score'] / 3, 1) . "% </li>";
    }
    echo "</ol>";
  }

  function viewClubSongs($controller){
    $clubSongs = $controller->clubSongs();
    echo "<ol>";
    foreach($clubSongs as $row){
      echo "<li> " . $row['Song Title'] . ". Clubbing Score: " . round($row['Clubbing Score'] / 3, 1) . "% </li>";
    }
    echo "</ol>";

  }

  function viewStudyingSongs($controller){
    $studyingSongs = $controller->studyingSongs();
    echo "<ol>";
    foreach($studyingSongs as $row){
      echo "<li> " . $row['Song Title'] . ". Studying Score: " . round($row['Studying Score'] / 3, 1) . "% </li>";
    }
    echo "</ol>";
  }

?>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link href="css/home-styles.css" rel="stylesheet">
</head>
<body>
   <header> </header>
   <h1> Home Page </h1>
   <main class="grid-container">
     <div class="link-box top-genres"> Top Genres
     <?php viewTopGenres($homeControl); ?> </div>
     <div class="link-box top-artists"> Top Artists
      <?php viewTopArtists($homeControl); ?> </div>
     <div class="link-box popular-songs"> Most Popular Songs
       <?php viewPopularSongs($homeControl); ?> </div>
     <div class="link-box one-hit"> One Hit Wonders </div>
     <div class="link-box longest-acoustic"> Longest Acoustic Songs
       <?php viewLongestAcousticSongs($homeControl); ?> </div>
     <div class="link-box club-songs"> At The Club
     <?php viewClubSongs($homeControl); ?> </div>
     <div class="link-box running-songs"> Running Songs
     <?php viewRunningSongs($homeControl); ?></div>
     <div class="link-box studying-songs"> Studying
     <?php viewStudyingSongs($homeControl); ?> </div>
   </main>
   <footer> </footer>
</body>
</html>
