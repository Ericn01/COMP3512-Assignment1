<?php include "../Controller/song-search-controller.class.php";

  $obj = new SongSearchController();
  $entries = $obj->getAnalysisFormValue($_POST);

  foreach($entries as $entry){
    echo "<tr>";
      echo "<td>";
        echo $entry['title'];
      echo "</td>";
      echo "<td>";
        echo $entry['artist_name'];
      echo "</td>";
      echo "<td>";
        echo $entry['year'];
      echo "</td>";
      echo "<td>";
        echo $entry['genre_name'];
      echo "</td>";
      echo "<td>";
        echo $entry['popularity'];
      echo "</td>";
    echo "</tr>";
  }
?>
