<?php
include "../Model/song-search.class.php";
    # This class doesn't manipulate the given queries in any way,
    # it pretty much just passes the model data right back to the view.
    class SongSearchController extends SongSearch{
        public function genresMarkup(){
            $rows = $this->getgenres();
            return $rows;
        }
        public function artistMarkup(){
            $rows = $this->getartists();
            return $rows;
        }

        public function addValue($arr, $paramName, $val){
          if ($val != "" && isset($val)){
            $arr[] = $paramName; // append the parameter name to the array
            $arr[] = $val; // append the given value to the array
          }
          else {
            $arr[] = ""; // if the given value is empty, add an empty string as the value
          }
          return $arr;
        }

        public function getBasicFormValue($postArray){
          $returnFormValues = [];
          $radioSelection = $_POST['basic-song-selection'];
          switch($radioSelection){
            case 'title':
             $title = $_POST['title'];
             $returnFormValues = $this->addValue($returnFormValues, 'title', $title);
             break;
           case 'artist':
             $artist = $_POST['artist-selection'];
             $returnFormValues = $this->addValue($returnFormValues, 'artist_name', $artist);
             break;
           case 'genre':
             $genre = $_POST['genre-selection'];
             $returnFormValues = $this->addValue($returnFormValues, 'genre_name', $genre);
             break;
           case 'year':
             $year = $_POST['between-high-param'];
             $returnFormValues = $this->addValue($returnFormValues, 'year', $year);
             break;
           default:
             break;
          }
          $param = $returnFormValues[0];
          $value = $returnFormValues[1];
          $entries = $this->getSongByField($param, $value);
          return $entries;
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
    }
?>
