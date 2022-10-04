<head>
  <link rel='stylesheet' href='css/font-selection.css'>
  <link rel='stylesheet' href='css/header.css'>
</head>
<header>
  <?php
  $assignmentName = "COMP3512 Assignment 1";
  $author = "Eric Nielsen";
  echo "<div class='main-content'>";
    echo "<h2> $assignmentName - " . date("F j, Y") . "</h2>";
    echo "<br>";
    echo "<h3> $author </h3>";
  echo "</div>";

  echo "<nav>";
    echo "<ul class='nav-links'>";
        echo "<li> <a href='index.php'> Home </a> </li>";
        echo "<li> <a href='song-search.php'> Search Songs  </a> </li>";
        echo "<li> <a href='search-results.php'> Browse  </a> </li>";
        echo "<li> <a href='favorites.php'> Favorites </a> </li>";
    echo "</ul>";
  echo "</nav>";
  ?>
</header>
