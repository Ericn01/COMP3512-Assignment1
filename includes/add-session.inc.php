<?php
  // Adds the songID to the Session super global array
  function addSession($songId){
    if (!isset($_SESSION['favorites'])) {
      $favoritesArray = array(); // Creating a favorite songs array
      $_SESSION['favorites'] = $favoritesArray;
    }
    else if(checkIfSongExists($songId)){
      echo "The given song id of $songId is already part of your favorites!";
    }
    array_push($_SESSION['favorites'], $songId);
  }

  function checkIfSongExists($songId){ // Search for
    if (in_array($songId, $_SESSION['favorites'])){
      return true;
    }
    return false;
  }

?>
