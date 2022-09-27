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
    echo "<h1> Top Genres Test </h1>";
    foreach($results as $row){

      echo "<h4>" . $row['Genre'] . ": " . $row['Song Count'] . " songs</h4>";
    }
   ?>
</body>
</html>
