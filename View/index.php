<!DOCTYPE html>
<?php
  include '../Controller/home-controller.class.php';
  $homeControl = new HomePageController();

  function makeTwoAttributeTable($results, $label1, $label2, $colName1, $colName2, $isScoreTable){
    echo "<table>";
      echo "<tr>";
        echo "<th>" . $label1 . "</th>";
        echo "<th>" . $label2. "</th>";
      echo "</tr>";
      if ($isScoreTable){
        foreach($results as $r){
          echo "<tr>";
            $score = intval($r[$colName2]);
            echo "<td> " . $r["$colName1"] . "</td>";
            echo "<td> " . round($score / 3, 1) . " % </td>";
          echo "</tr>";
        }
      }
      else{
        foreach($results as $r){
          echo "<tr>";
            echo "<td> " . $r["$colName1"] . "</td>";
            echo "<td> " . $r["$colName2"] . "</td>";
          echo "</tr>";
        }
      }
    echo "</table>";
  }
  function viewTopGenres($controller){
    $topGenres = $controller->topGenres();
    makeTwoAttributeTable($topGenres, 'Genre' , 'Number of Songs', 'Genre', 'Song Count', false);
  }

  function viewPopularSongs($controller){
    $popularSongs = $controller->popularSongs();
    makeTwoAttributeTable($popularSongs, 'Artist', 'Song Title', 'Song Name', 'Artist Name', false);
  }

  function viewTopArtists($controller){
    $topArtists = $controller->topArtists();
    makeTwoAttributeTable($topArtists, 'Artist', 'Number of Songs', 'Artist Name', 'Song Count', false);
  }

  function viewLongestAcousticSongs($controller){
    $acousticSongs = $controller->longestAcousticSongs();
    makeTwoAttributeTable($acousticSongs, 'Song Title', 'Duration', 'Song Title', 'duration', false);
  }

  function viewOneHitWonders($controller){
    $oneHitWonders = $controller->oneHitWonders();
    makeTwoAttributeTable($oneHitWonders, 'Artist', 'Song Title', 'Artist Name', 'Num Songs', false);
  }

  function viewRunningSongs($controller){
    $runningSongs = $controller->runningSongs();
    makeTwoAttributeTable($runningSongs, 'Song Title', 'Running Score', 'Song Title', 'Running Score', true);
  }

  function viewClubSongs($controller){
    $clubSongs = $controller->clubSongs();
    makeTwoAttributeTable($clubSongs, 'Song Title', 'Clubbing Score', 'Song Title', 'Clubbing Score', true);
  }

  function viewStudyingSongs($controller){
    $studyingSongs = $controller->studyingSongs();
    makeTwoAttributeTable($studyingSongs, 'Song Title', 'Studying Score', 'Song Title', 'Studying Score', true);
  }

?>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link href="css/home-styles.css" rel="stylesheet">
   <link href="css/font-selection.css" rel="stylesheet">
</head>
<body>
   <?php include 'header.php'; ?>
   <h1> Home Page </h1>
   <main class="grid-container">
     <div class="link-box top-genres"> Top Genres
     <?php viewTopGenres($homeControl); ?> </div>
     <div class="link-box top-artists"> Top Artists
      <?php viewTopArtists($homeControl); ?> </div>
     <div class="link-box popular-songs"> Most Popular Songs
       <?php viewPopularSongs($homeControl); ?> </div>
     <div class="link-box one-hit"> One Hit Wonders
     <?php viewOneHitWonders($homeControl); ?> </div>
     <div class="link-box longest-acoustic"> Longest Acoustic Songs
       <?php viewLongestAcousticSongs($homeControl); ?> </div>
     <div class="link-box club-songs"> At The Club
     <?php viewClubSongs($homeControl); ?> </div>
     <div class="link-box running-songs"> Running Songs
     <?php viewRunningSongs($homeControl); ?></div>
     <div class="link-box studying-songs"> Studying
     <?php viewStudyingSongs($homeControl); ?> </div>
   </main>
   <?php include 'footer.php'; ?>
</body>
</html>
