<?php
  // Adds the songID to the Session super global array
  function addSession($songId, $favAdded){
    if (!empty($songId) && strcmp($favAdded, 'T') == 0){
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
    else if (!empty($songId) && strcmp($favAdded, 'F') == 0){ // Remove the song from the list
     removeFavoriteSong($songId);
    }
  }
  function removeFavoriteSong($songId){
    if (($key = array_search($songId, $_SESSION['favorites'])) != false){
      unset($_SESSION['favorites'][$key]);
    }
    else{
      echo "Song not found";
    }
  }
  function checkIfSongExists($songId){ // Search for
    if (in_array($songId, $_SESSION['favorites'])){
      return true;
    }
    return false;
  }

?>
