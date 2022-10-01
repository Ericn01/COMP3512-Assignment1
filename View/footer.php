<head>
  <link rel='stylesheet' href='css/footer.css'>
</head>
<footer>
  <?php
    $className = "COMP3512 - Web Development II";
    $authorName = "Eric Nielsen";
    $githubRepo = "https://github.com/Ericn01/COMP3512-Assignment1";

    echo "<ul class='foot-list'>";
      echo "<li> $className </li>"
      echo "<li> $authorName </li>"
      echo "<li> <a> $githubRepo </a> </li>"
    echo "</ul>";
  ?>
</footer>
