<?php
  include "../Controller/song-search-controller.class.php";
  # This is reused everywhere on this page, so might as well make it a function.
  function makeLessAndGreaterMarkup($value){
    $paragraphClass = 'less-greater-inputs';
    // Less input value section
    echo "<p class='$paragraphClass'>";
      echo "<input type='radio' name='greater-less-between' value='less'>";
      echo "<label for='less'> Less </label>";
      echo "<p>";
        echo "<input type='number' min='0' max='100' name='less-input'>";
      echo "</p>";
    echo "</p>";

    // Greater input value section
    echo "<p class='$paragraphClass'>";
      echo "<input type='radio' name='greater-less-between' value='greater'>";
      echo "<label for='greater'> Greater </label>";
      echo "<p>";
        echo "<input type='number' min='0' max='100' name='greater-input'>";
      echo "</p>";
    echo "</p>";
  }
  # Responsible for generating the advanced song search boxes within the
  function makeAttributeBox($attributeName){
    echo "<div class='sub-input $attributeName'>";
      echo "<input type='radio' name='attribute' value='$attributeName'/>";
      echo "<label for='attribute'>" . ucfirst($attributeName) . "</label>";
      makeLessAndGreaterMarkup($attributeName);
    echo "</div>";
  }
  $control = new SongSearchController();
  $genres = $control->genresMarkup(); // Options for the genres select input
  $artists = $control->artistMarkup(); // Options for the artist select input
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Song Search</title>
   <link rel="icon" type="image/x-icon" href="images/favicon.png">
   <link href="css/song-search-styling.css" rel="stylesheet">
   <link href="css/font-selection.css" rel="stylesheet">
</head>
<body>
   <?php include 'header.php'; ?>
   <h1> Song Search </h1>
   <h3 class='note'> *** If no input is given, all songs will be returned. *** </h3>
   <main class="flex-container">
     <form class='basic-search-form' action='../View/search-results.php' method='POST'>
        <!-- Basic song search section -->
        <div class="basic-song-search">
          <h2> Basic Song Search </h2>
          <!-- Title Input -->
          <p class='input'>
            <input type='radio' name='basic-song-selection' value='title' checked>
            <label for='basic-song-selection'> Title </label>
            <input type='text' name='title'/>
          </p>

          <!-- Artist Section -->
          <p class='input'>
            <input type='radio' name='basic-song-selection' value='artist'>
            <label for='basic-song-selection'> Artist </label>
            <select name='artist-selection'> <!-- ADD PHP DB RETRIEVAL CODE HERE -->
              <option value="" default> Select an artist </option>
              <?php
              foreach($artists as $a){
                $artistName = $a['Artist Name'];
                echo "<option value='$artistName'> $artistName </option>";
              }
            ?>
            </select>
          </p>
          <!-- Genre Section -->
          <p class='input'>
            <input type='radio' name='basic-song-selection' value='genre'>
            <label for='basic-song-selection'> Genre </label>
            <select name='genre-selection' value=""> <!-- ADD PHP DB RETRIEVAL CODE HERE -->
              <option value="" default> Select a genre </option>
              <?php
              foreach($genres as $g){
                $genreName = $g['Genre Name'];
                echo "<option value='$genreName'> $genreName </option>";
              }
              ?>
            </select>
          </p>
           <!-- Year Section -->
          <p class='input'>
            <input type='radio' name='basic-song-selection' value='year'>
            <label for='basic-song-selection'> Year </label>
          </p>
          <div class='year-sub-inputs'>
            <!-- Less input value section -->
            <input type='radio' name='greater-less-between' value='less'>
            <label for='less'> Less </label>
            <input type='number' name='year-less-input' min='2015' max='2020'>
            <br><br>
            <!-- Greater input value section -->
            <input type='radio' name='greater-less-between' value='greater'>
            <label for='greater'> Greater </label>
            <input type='number' name='year-greater-input' min='2015' max='2020'>
            <br><br>
            <!-- Between input value section -->
            <input type='radio' name='greater-less-between' value='between'>
            <label for='between-input'> Between </label>
            <input type='number' name='between-low-param' min='2015' max ='2020'>
            <br><br>
            <input type='number' name='between-high-param' min='2015' max='2020'>
            <br><br> <!-- Change later -->
            <div class='button-wrapper'>
              <button type="submit" name="submit-basic" value="basic"> Search </button>
            </div>
          </div>
        </div>
      </form>
      <form class='advanced-search-form' action='../View/search-results.php' method='POST'>
        <!-- Advanced song search section -->
        <h2> Advanced Song Search </h2>
        <div class='advanced-song-search'>
            <?php
              define('NUM_BOXES',  6); // Number of boxes that we are going to be printing out to the screen
              $attributes = array('energy', 'danceability', 'liveness', 'valence', 'acousticness', 'speechiness');
              for ($i = 0; $i < NUM_BOXES; $i++){
                makeAttributeBox($attributes[$i]);
              }
            ?>
        </div>
        <div class='button-wrapper'>
          <button type="submit" name="submit-advanced" value="advanced"> Search </button>
        </div>
      </form>
   </main>
   <?php include 'footer.php'; ?>
</body>
</html>
