<?php
  include "../Model/song-search.class.php";

  class FavoritesController extends SongSearch{
    public $songId; // song id from query string
    function __construct($song_id){
      $this->songId = $song_id;
      // Adds the songID to the Session super global array
      if (!isset($_SESSION['favorites'])) {
        $favoritesArray = array(); // Creating a favorite songs array
        $_SESSION['favorites'] = $favoritesArray;
      }
      else if(checkIfSongExists($songId, 'favorites')){
        echo "The given song id of $this->$songId is already part of your favorites!";
      }
      array_push($_SESSION['favorites'], $this->songId);
    }

    private function checkIfSongExists($songId){ // Search for
      if (in_array($songId, $_SESSION['favorites'])){
        return true;
      }
      return false;
    }


    public function clearFavoriteSongs(){
      $_SESSION['favorites'] = null; // Clears the list of favorite songs
    }

    public function getFavoritesData(){
      $rowData = array();
      if (isset($_SESSION['favorites'])){
        foreach($_SESSION['favorites'] as $songId){
          $row = $this->getFavorite(intval($songId));
          $rowData[] = $row;
        }
      }
      return $rowData;
    }
  }
?>
