<?php
  include "../Controller/favorites-controller.class.php";
  $songId = trim($_SERVER['QUERY_STRING'], 'song_id=');
  $favController = new FavoritesController($songId);

  function viewFavorites($entry){
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
        echo "<td>";
          echo $entry['popularity'];
        echo "</td>";
      echo "</tr>";
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
   <link href="css/font-selection.css" rel="stylesheet">
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
           <th> Popularity </th>
         </tr>
       <thead>
       <tbody>
        <?php
        $tableData = $favController->getFavoritesData($favController->sessionName);
        printTable($tableData);

        ?>
       </tbody>
     </table>
   </main>
   <?php include 'footer.php'; ?>
</body>
</html>
