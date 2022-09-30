<?php
 //include '../Controller/singles-controller.class.php';
  include '../Model/single-song.class.php';
 // Class SongView extends SingleSongController{
 //     // Data is in form [0 => [base_data], 1 => [analysis_data]]
 //     public function showSongInfo() {
 //       $data = $this->fetchSongs();
 //       foreach($data as $row){
 //         echo "<p>" . $row['title'] . "</p>";
 //         echo "<p>" . $row['Artist Name'] . "</p>";
 //         echo "<p>" . $row['genre_id'] . "</p>";
 //         echo "<p>" . $row['year'] . "</p>";
 //         echo "<p>" . $row['title'] . "</p>";
 //       }
 //     }
 //  }
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Home Page </title>
   <link href="css/home-styles.css" rel="stylesheet">
</head>
<body>
   <header> </header>
   <main class="grid-container">
     <h1> Song Information </h1>
    <div class='song-info top'> </div>
    <div class='song-info basic'> </div>
    <div class='song-info analysis'></div>
   </main>
   <footer> </footer>
</body>
</html>
