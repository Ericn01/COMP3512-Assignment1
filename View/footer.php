<head>
  <link rel='stylesheet' href='css/font-selection.css'>
  <link rel='stylesheet' href='css/footer.css'>
</head>
<footer>
  <?php
    $className = "COMP3512 - Web Development II";
    $authorName = "Eric Nielsen";
    $githubRepo = "https://github.com/Ericn01/COMP3512-Assignment1";

    echo "<ul class='foot-list'>";
      echo "<li> $className </li>";
      echo "<li> <a href=" . $githubRepo . "> Github Repository </a> </li>";
      echo "<li> Copyright $authorName 2022 </li>";
    echo "</ul>";
  ?>
</footer>
