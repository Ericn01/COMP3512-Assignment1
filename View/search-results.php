<?php
  include "../Controller/song-search-controller.class.php";
  $songSearchObj = new SongSearchController();
  $entries = $songSearchObj->getFormValues();

  function viewFormValues($entries){
    foreach($entries as $entry){

      echo "<tr>";
        echo "<td>";
          echo "<a href='song-info.php?sond_id=" . $entry['song_id'] . "'/>";
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

  function getAnalysisFormValue(){

  }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search Results </title>

   <link href="css/font-selection.css" rel="stylesheet">
   <link href="css/search-results-styles.css" rel="stylesheet">
</head>
<body>
   <header> </header>
   <main class="container">
     <h1> Search Results </h1>
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
        <?php viewFormValues($entries) ?>
       </tbody>
     </table>
   </main>
   <footer> </footer>
</body>
</html>
