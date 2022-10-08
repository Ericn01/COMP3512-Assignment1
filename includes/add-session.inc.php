<?php
  // Adds the songID to the Session super global array
  function addSession($songId){
    if (!empty($songId)){
      if (!isset($_SESSION['favorites'])) {
        $favoritesArray = array(); // Creating a favorite songs array
        $_SESSION['favorites'] = $favoritesArray;
      }
      else if(!checkIfSongExists($songId)){ // if the song isn't already in the session array, add it in.
        array_push($_SESSION['favorites'], $songId);
      }
      else{
        echo "<em style='color: orange; text-align: center; font-size: 20px; padding: 10px;'> Warning: The selected song is already part of your favorites list! </em>";
      }
    }
  }

  function checkIfSongExists($songId){ // Search for
    if (in_array($songId, $_SESSION['favorites'])){
      return true;
    }
    return false;
  }

?>
