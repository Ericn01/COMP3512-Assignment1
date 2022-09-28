<?php
require_once 'config.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home Page</title>
   <link href="css/home-styles.css" rel="stylesheet">
</head>
<body>
   <header> </header>
   <main class="ui flex-container">
     <!-- Basic song search form -->
     <section class="search basic-song-search">
       <h2> Basic Song Search </h2>
       <form action='' method='post'>
         <input type='radio' name='basic-song-selection'>
         <label for='title'> Title </label>
         <input type='text' name='title'/>
       </form>
     </section>
     <!-- Advanced song search form -->
     <section class="search advanced-song-search">
       <h2> Advanced Song Search </h2>
       <form>
         <div class="sub-input energy"> </div>
         <div class="sub-input danceability"> </div>
         <div class="sub-input livelyness"> </div>
         <div class="sub-input valence"> </div>
         <div class="sub-input acousticness"> </div>
         <div class="sub-input speechiness"> </div>
       </form>
     </section>

   </main>
   <footer> </footer>
</body>
</html>
