<head>
  <link rel='stylesheet' href='css/font-selection.css'>
  <link rel='stylesheet' href='css/footer.css'>
</head>
<footer>
  <?php
    $className = "Web Development II";
    $authorName = "Eric Nielsen";
    $githubRepo = "https://github.com/Ericn01/COMP3512-Assignment1";

    echo "<ul class='foot-list'>";
      echo "<li> $className </li>";
      echo "<li> <a href=" . $githubRepo . "> Github Repository </a> </li>";
      echo "<li> Copyright $authorName 2022 </li>";
      echo "<li class='menu'> Change Theme ▼";
        echo "<ul class='themes-list'>";
              echo "<li> <button id='theme1' class='theme-btn simple' title='Simple Elegance Theme'></button> </li>";
              echo "<li> <button id='theme2' class='theme-btn mango' title='Mango Tango Theme'></button> </li>";
              echo "<li> <button id='theme3' class='theme-btn purple' title='Purple Madness Theme'></button> </li>";
              echo "<li> <button id='theme4' class='theme-btn midnight' title='Midnight Moon Theme'></button> </li>";
              echo "<li> <button id='theme5' class='theme-btn gentle' title='Gentle Beauty Theme'></button> </li>";
        echo "</ul>";
      echo "</li>";
    echo "</ul>";
  ?>
  <script src="theme.js" type="text/javascript"></script>
</footer>
