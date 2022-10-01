<?php
  include "../Controller/song-search-controller.class.php";
  $songSearchObj = new SongSearchController();
  $entries = $songSearchObj->getBasicFormValue($_GET);

  foreach($entries as $entry){
    echo $entry['title'];
    echo $entry['year'];
    echo $entry['popularity'];
  }

 ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search Results </title>
   <link href="css/search-results-styles.css" rel="stylesheet">
</head>
<body>
   <header> </header>
   <main class="container">
     <h1> Search Results </h1>

     <!-- This page is going to be presenting a large table containing the desired song data -->
     <table>
       <tr>
         <th> Title </th>
         <th> Artist </th>
         <th> Year </th>
         <th> Genre </th>
         <th> Popularity </th>
       </tr>
     </table>
   </main>
   <footer> </footer>
</body>
</html>
