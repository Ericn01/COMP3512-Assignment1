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
   // This method gets called if the user selects a form value with only a single element
   function getBasicFormValue($postArray){
     $returnFormVal = "";
     $radioSelection = $_POST['basic-song-selection'];
     echo $radioSelection;
     switch($radioSelection){
       case 'title':
        $title = $_POST['title'];
        if ($title != "" && isset($title)){
          $returnFormVal = $title;
        }
        break;
      case 'artist':
        $artist = $_POST['artist-selection'];
        if ($artist != "" && isset($artist)){
          $returnFormVal = $artist;
        }
        break;
      case 'genre':
        $genre = $_POST['genre-selection'];
        if ($genre != "" && isset($genre)){
          $returnFormVal = $genre;
        }
        break;
      case 'year':
        $year = $_POST['between-high-param'];
        if ($year != "" && isset($year)){
          $returnFormVal = $year;
        }
        break;

      default:
        break;
     }
     echo $returnFormVal;
   }

   function getAnalysisFormValue($postArray){
     $lowValue = 0;
     $highValue = 100;
     $radioSelection = $_POST['analysis-song-selection'];
     switch($radioSelection){
       case 'year':
        $title = $_POST['title'];
        if ($title != "" && isset($title)){
          $returnFormVal = $title;
        }
        break;
      case 'energy':
        break;
      case 'danceability':
        break;
      case 'liveness':
        break;
      case 'valence';
        break;
      case 'acousticness':
        break;
      case 'speechiness':
        break;
     }
   }
   print_r($_POST);
   echo "<h1>" . getBasicFormValue($_POST) . "</h1>";
    // $emptyVal = "undefined";
    // if($_SERVER["REQUEST_METHOD"] == "GET"){
    //   if ($_POST['title'] != ""){
    //     $title = $_POST['title'];
    //   }
    //   else{
    //     $title = $emptyVal;
    //   }
    //   if (isset($_POST['artist-selection'])){
    //     $artist = $_POST['artist-selection'];
    //   }
    //   else{
    //     $artist = $emptyVal;
    //   }
    //   if (isset($_POST['genre-selection'])){
    //     $genre = $_POST['genre-selection'];
    //   }
    //   else{
    //     $genre = $emptyVal;
    //   }
    // }
   ?>
</body>
</html>
