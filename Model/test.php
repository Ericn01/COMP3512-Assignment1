<!DOCTYPE html>
<?php include 'home-page.class.php';?>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Test</title>
   <link href="css/home-styles.css" rel="stylesheet">
</head>
<body>
   <?php
    $test = new HomeEntries();
    $results = $test->getTopGenres();

    $artists = $test->getTopArtists();
    $oneHit = $test->getOneHitWonders();
    printResults($results, 'Genre', 'Song Count', 'Genres');
    printResults($artists, 'Artist Name', 'Song Count', 'Artists');
    printresults($oneHit, 'Artist ID', 'Song Popularity', 'One Hit Wonder');

    function printResults($results, $r1Name, $r2Name, $testName){
      echo "<h1> Top $testName Test </h1>";
      foreach($results as $row){
        echo "<h4>" . $row["$r1Name"] . ": " . $row["$r2Name"] . " songs</h4>";
      }
    }
   ?>
</body>
</html>
