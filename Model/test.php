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
    //$oneHit = $test->getOneHitWonders();
    $mostPopular = $test->getMostPopularSongs();
    $acoustic= $test->getLongestAcousticSongs();
    $club = $test->getClubSongs();
    $running = $test->getRunningSongs();
    $studying = $test->getStudyingSongs();

    // Print the query results
    printResults($results, 'Genre', 'Song Count', 'Genres');
    printResults($artists, 'Artist Name', 'Song Count', 'Artists');
    //printresults($oneHit, 'Artist ID', 'popularity', 'One Hit Wonder');
    printresults($mostPopular, 'Song Name', 'Artist Name', 'Popular Songs');
    printresults($acoustic, 'Song Title', 'acousticness', 'Acoustic Songs');
    printresults($club, 'Song Title', 'Clubbing Score', 'Club Songs');
    printresults($running, 'Song Title', 'Running Score', 'Running Songs');
    printresults($studying, 'Song Title', 'Studying Score', 'Studying Songs');

    function printResults($results, $r1Name, $r2Name, $testName){
      echo "<h1> Top $testName Test </h1>";
      foreach($results as $row){
        echo "<h4>" . $row["$r1Name"] . ": " . $row["$r2Name"] . "</h4>";
      }
    }
   ?>
</body>
</html>
