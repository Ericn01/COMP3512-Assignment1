<?php
  // Adds the songID to the Session super global array
  function addSession($songId, $favAdded){
    if (!empty($songId) && strcmp($favAdded, 'T') == 0){
      if (!isset($_SESSION['favorites'])) {
        $favoritesArray = array(); // Creating a favorite songs array
        $_SESSION['favorites'] = $favoritesArray; // Create the favorite session variable
        array_push($_SESSION['favorites'], $songId); // Add the selected song into it.
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
      unset($_SESSION['favorites']);
    }
  }
  function checkIfSongExists($songId){ // Check to see that the given song id is in the favorites list
    if (in_array($songId, $_SESSION['favorites'])){
      return true;
    }
    return false;
  }

?>
