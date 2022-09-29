<!DOCTYPE html>
<?php
  include '../Controller/home-controller.class.php';
  $homeControl = new HomePageController();

  function viewTopGenres($controller){
    $topGenres = $controller->topGenres();
    echo "<ol>";
    foreach($topGenres as $genre) {
      echo "<li> " . $genre['Genre'] . " - " . $genre['Song Count'] . " songs </li>";
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
     <?php viewTopGenres($homeControl); ?>
    </div>
     <div class="link-box top-artists"> Top Artists </div>
     <div class="link-box popular-songs"> Most Popular Songs
       <?php viewPopularSongs($homeControl); ?>;
     </div>
     <div class="link-box one-hit"> One Hit Wonders </div>
     <div class="link-box longest-acoustic"> Longest Acoustic Songs</div>
     <div class="link-box club-songs"> At The Club </div>
     <div class="link-box running-songs"> Running Songs </div>
     <div class="link-box studying-songs"> Studying </div>
   </main>
   <footer> </footer>
</body>
</html>
