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
        private function addValues($arr, $paramName, $val){
          if ($val != "" && isset($val)){
            $arr[] = $paramName; // append the parameter name to the array
            $arr[] = $val; // append the given value to the array
          }
          else {
            $arr[] = ""; // if the given value is empty, add an empty string as the value
          }
          return $arr;
        }

        public function getFormValues(){
          $entries;
          // We need a funnel to know what form has been used.
          if (!empty($_POST['basic-song-selection']) && $_POST['submit-basic'] == 'basic'){ // check to see that basic song selection radio buttons are not null and that basic form button has been clicked.
            if ($_POST['basic-song-selection'] == 'year'){ // user is searching by year & in basic form
              $entries = $this->getYearFormValue();
            }
            else{ // user is not searching by year & in basic form
              $entries = $this->getBasicFormValue();
            }
          }
          else if (!empty($_POST['attribute']) && $_POST['submit-advanced'] == 'advanced') { // user is searching by analysis form
            $entries = $this->getAnalysisFormValue();
          }
          else{
            echo "Something went wrong while processing your query...";
            $entries = null;
          }
          return $entries;
        }
        
        // Basic form values return. Called if the user searches using either title, artist or genre.
        private function getBasicFormValue(){
          $returnFormValues = [];
          $radioSelection = $_POST['basic-song-selection'];
          switch($radioSelection){
            case 'title':
             $title = $_POST['title'];
             $returnFormValues = $this->addValues($returnFormValues, 'title', $title);
             break;
           case 'artist':
             $artist = $_POST['artist-selection'];
             $returnFormValues = $this->addValues($returnFormValues, 'artist_name', $artist);
             break;
           case 'genre':
             $genre = $_POST['genre-selection'];
             $returnFormValues = $this->addValues($returnFormValues, 'genre_name', $genre);
             break;
           default:
             break;
          }
          $param = $returnFormValues[0];
          $value = $returnFormValues[1];
          $entries = $this->getSongByField($param, $value);
          return $entries;
        }
        // Ensures that the given values are within the range [0 - 100]
        private function validateNumberInput($val){
          if ($val < 0){$val = 0;}
          if ($val > 100){$val = 100;}
          return $val;
        }
        // Retrieves the selected values for the analysis data
        private function getSelectionValue($param, $selection){
          $val = 0;
          if (isset($_POST['less-input']) && $selection == 'less'){ // Check to see if the user selected the "less radio button, and that the input has a value"
            $selection = "less";
            $val = $this->validateNumberInput(intval($_POST['less-input']));
          }
          else if (isset($_POST['greater-input']) && $selection == 'greater'){
            $selection = "greater";
            $val = $this->validateNumberInput(intval($_POST['greater-input']));
          }
          $arr = array($param,  array($val, $selection)); // [0 ($param), 1 ->[0 ($val), 1 ($selection)]]
          return $arr;
        }
        // Returns the values from the analysis data values form. This ended up being much more complicated than I thought it'd be (0_0)
        private function getAnalysisFormValue(){
          $returnFormValues = [];
          $radioSelection = $_POST['attribute'];
          $innerSelection = $_POST['greater-less-between']; // Less or greater selection
          switch($radioSelection){
           case 'energy':
             $returnFormValues = $this->getSelectionValue('energy', $innerSelection);
             break;
           case 'danceability':
              $returnFormValues  = $this->getSelectionValue('danceability', $innerSelection);
             break;
           case 'liveness':
              $returnFormValues = $this->getSelectionValue('liveness', $innerSelection);
             break;
           case 'valence':
              $returnFormValues = $this->getSelectionValue('valence', $innerSelection);
             break;
           case 'acousticness':
              $returnFormValues = $this->getSelectionValue('acousticness', $innerSelection);
             break;
           case 'speechiness':
              $returnFormValues = $this->getSelectionValue('speechiness', $innerSelection);
             break;
            default:
              break;
          }
          $param = $returnFormValues[0];
          $data = $returnFormValues[1];
          $entries = $this->getSongByFieldLessOrGreater($param, $data);
          return $entries;
        }
        // This method makes sure that the lower value in the year between statement remains lower than the top value.
        private function validateYearData($lowBound, $highBound){
          if ($lowBound > $highBound){
            $lowBound = $highBound - 1;
          }
          return $lowBound;
        }
        // Year search form processing. Should've processed this differently. Very difficult to follow.
        private function getYearFormValue(){
          $entries; // Declaring the entries variable (will later store DB results)
          $selection = $_POST['basic-song-selection']; // Radio button selection will be year when this method is called.
          $innerSelection = $_POST['greater-less-between']; // Sub radio button selection (less, greater, between)
          $value = 1; // initializing the value parameter
          // same procedure for less and greater inputs
          if ($innerSelection == 'greater') {
            $valueArr = array($selection, array(intval($_POST['year-greater-input']), $innerSelection));
            $entries = $this->getSongByFieldLessOrGreater($valueArr[0], $valueArr[1]);
          } else if ($innerSelection == 'less'){
            $valueArr = array($selection, array(intval($_POST['year-less-input']), $innerSelection));
            $entries = $this->getSongByFieldLessOrGreater($valueArr[0], $valueArr[1]);
          }
          else{ // Between case
            $lowBound = intval($_POST['between-low-param']);
            $topBound = intval($_POST['between-high-param']);
            $lowBound = $this->validateYearData($lowBound, $topBound);
            $entries = $this->getSongBetweenValues($innerSelection, $lowBound, $topBound);
          }
          return $entries;
        }
    }
?>
