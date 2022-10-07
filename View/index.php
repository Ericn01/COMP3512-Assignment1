<!DOCTYPE html>
<?php
  include '../Controller/home-controller.class.php';
  $homeControl = new HomePageController();

  function makeTwoAttributeTable($results, $label1, $label2, $colName1, $colName2, $isScoreTable){
    echo "<table>";
      echo "<thead>";
        echo "<tr>";
          echo "<th>" . $label1 . "</th>";
          echo "<th>" . $label2. "</th>";
        echo "</tr>";
      echo "<thead>";
      echo "<tbody>";
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
      echo "</tbody>";
    echo "</table>";
  }
  function viewTopGenres($controller){
    $topGenres = $controller->topGenres();
    makeTwoAttributeTable($topGenres, 'Genre' , 'Songs', 'Genre', 'Song Count', false);
  }

  function viewPopularSongs($controller){
    $popularSongs = $controller->popularSongs();
    makeTwoAttributeTable($popularSongs, 'Artist', 'Song Title', 'Song Name', 'Artist Name', false);
  }

  function viewTopArtists($controller){
    $topArtists = $controller->topArtists();
    makeTwoAttributeTable($topArtists, 'Artist', 'Songs', 'Artist Name', 'Song Count', false);
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
   <link rel="icon" type="image/x-icon" href="images/favicon.png">
   <link href="css/home-styles.css" rel="stylesheet">
   <link href="css/font-selection.css" rel="stylesheet">
</head>
<body>
   <?php include 'header.php'; ?>
   <h1> Home Page </h1>
   <main class="grid-container">
     <div class="link-box top-genres"> <p class='label'> Top Genres </p>
     <?php viewTopGenres($homeControl); ?> </div>
     <div class="link-box top-artists"> <p class='label'>  Top Artists </p>
      <?php viewTopArtists($homeControl); ?> </div>
     <div class="link-box popular-songs"> <p class='label'>  Most Popular Songs </p>
       <?php viewPopularSongs($homeControl); ?> </div>
     <div class="link-box one-hit"> <p class='label'>  One Hit Wonders </p>
     <?php viewOneHitWonders($homeControl); ?> </div>
     <div class="link-box longest-acoustic"> <p class='label'>  Longest Acoustic Songs </p>
       <?php viewLongestAcousticSongs($homeControl); ?> </div>
     <div class="link-box club-songs"> <p class='label'>  At The Club </p>
     <?php viewClubSongs($homeControl); ?> </div>
     <div class="link-box running-songs"> <p class='label'> Running Songs </p>
     <?php viewRunningSongs($homeControl); ?></div>
     <div class="link-box studying-songs"> <p class='label'> Studying </p>
     <?php viewStudyingSongs($homeControl); ?> </div>
   </main>
   <?php include 'footer.php'; ?>
</body>
</html>
