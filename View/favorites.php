<?php
  include "../Controller/favorites-controller.class.php";
  require("../includes/add-session.inc.php");
  session_start();
  // Defining substring length & offset to retrieve the desired value from the querystring
  define('SONG_ID_OFFSET', 16);
  define('FAV_ADDED_OFFSET', 6);
  define('FAV_ADDED_LENGTH', 1);

  $songId = substr($_SERVER['QUERY_STRING'], SONG_ID_OFFSET); // Retrieves the song ID from the querystring
  $favAdded = substr($_SERVER['QUERY_STRING'], FAV_ADDED_OFFSET, FAV_ADDED_LENGTH);
  $favController = new FavoritesController($songId);
  addSession($songId, $favAdded); // Adds the specified song ID to the session when the page is loaded.
  if (isset($_GET['clear-songs'])){ // If a post request exists on this webpage, it'll be from the button.
    $favController->clearFavoriteSongs(); // Removes all favorite songs
  }
  function viewFavorites($entry){
    if (!empty($entry)){
      echo "<tr>";
        echo "<td>";
          echo "<a href='song-info.php?song_id=" . $entry['song_id'] . "'/>";
            echo $entry['title'];
          echo "</a>";
        echo "</td>";
        echo "<td>";
          echo $entry['artist_name'];
        echo "</td>";
        echo "<td>";
          echo $entry['year'];
        echo "</td>";
        echo "<td>";
          echo $entry['genre_name'];
        echo "</td>";
        echo "<td class='centered'>";
          echo round(intval($entry['popularity']) * (100 / 91), 1) . "%";
        echo "</td>";
      echo "</tr>";
      }
    }
    function displayButton(){
     if (isset($_SESSION['favorites'])){ // Check that the favorites session exists
      if (count($_SESSION['favorites']) >= 1){ // Make sure that there's more than one song
        echo '<form method="get" action="favorites.php">'; // Display button
         echo "<div class='button-container'>";
           echo "<button class='clear-favorites' title='Clears your favorite list!' type='submit' name='clear-songs' value='true'> Clear Favorites </button>";
         echo "</div>";
        echo "</form>";
      }
      }
    }
    function printTable($tableData){
      foreach($tableData as $row){
        viewFavorites($row);
      }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Favorites </title>
   <link rel="icon" type="image/x-icon" href="images/favicon.png">
   <link href="css/global-styles.css" rel="stylesheet">
   <link href="css/search-results-styles.css" rel="stylesheet">
</head>
<body>
   <?php include 'header.php'; ?>
   <main class="container">
     <h1> Favorite Songs </h1>
     <!-- This page is going to be presenting a large table containing the desired song data -->
     <table>
       <thead>
         <tr>
           <th> Title </th>
           <th> Artist </th>
           <th> Year </th>
           <th> Genre </th>
           <th class='centered'> Popularity </th>
         </tr>
       </thead>
       <tbody>
        <?php
          $tableData = $favController->getFavoritesData();
          printTable($tableData);
        ?>
       </tbody>
     </table>
     <?php displayButton(); ?>
   </main>
   <?php include 'footer.php'; ?>
</body>
</html>
