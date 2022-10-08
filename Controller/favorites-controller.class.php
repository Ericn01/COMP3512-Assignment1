<?php
  include "../Model/song-search.class.php";

  class FavoritesController extends SongSearch{
    public $songId; // song id from query string
    function __construct($song_id){
      $this->songId = $song_id;
    }

    public function clearFavoriteSongs(){
      session_unset('favorites');
    }
    public function getFavorites(){
      session_start(); // Session is started as the user logs onto the website
      $favoriteSongs = $_SESSION['favorites'];
      return $favoriteSongs();
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
