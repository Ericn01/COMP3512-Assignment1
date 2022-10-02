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
        public function getFormValues($postArray){

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

        function getSelectionValue($postArray){
          $val = 0;
          $selection = "";
          if (isset($_POST['less-input'])){
            $selection = "less";
            $energy = intval($_POST['less-input']);
          }
          else if (isset($_POST['greater-input'])){
            $selection = "greater";
            $energy = intval($_POST['greater-input']);
          }
          return array($val, $selection);
        }
        function getAnalysisFormValue($postArray){
          $returnFormValues = [];
          $radioSelection = $_POST['attribute'];
          print_r($_POST);
          switch($radioSelection){
           case 'energy':
             $energySelection = $_POST['greater-less-between'];
             $energy = $this->getSelectionValue($postArray);
             $returnFormValues = $this->addValue($returnFormValues, $radioSelection, $energy);
             break;
           case 'danceability':
              $danceabilitySelection = $_POST['greater-less-between'];
              $danceability = $this->getSelectionValue($postArray);
              $returnFormValues = $this->addValue($returnFormValues, $radioSelection, $danceability);
             break;
           case 'liveness':
              $livenessSelection = $_POST['greater-less-between'];
              $danceability = $this->getSelectionValue($postArray);
              $returnFormValues = $this->addValue($returnFormValues, $radioSelection, $liveness);
             break;
           case 'valence';
              $valenceSelection = $_POST['greater-less-between'];
              $danceability = $this->getSelectionValue($postArray);
              $returnFormValues = $this->addValue($returnFormValues, $radioSelection, $valence);
             break;
           case 'acousticness':
              $acousticnessSelection = $_POST['greater-less-between'];
              $acousticness = $this->getSelectionValue($postArray);
              $returnFormValues = $this->addValue($returnFormValues, $radioSelection, $acousticness);
             break;
           case 'speechiness':
              $speechinessSelection = $_POST['greater-less-between'];
              $danceability = $this->getSelectionValue($postArray);
              $returnFormValues = $this->addValue($returnFormValues, $radioSelection, $speechiness);
             break;
            default:
              break;
          }
          $param = $returnFormValues[0];
          $data = $returnFormValues[1];
          $entries = $this->getSongByFieldLessOrGreater($param, $data);
          return $entries;
        }
    }
?>
