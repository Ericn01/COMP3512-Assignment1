<head>
  <link rel='stylesheet' href='css/font-selection.css'>
  <link rel='stylesheet' href='css/footer.css'>
</head>
<footer>
  <?php
    $className = "COMP3512 - Web Development II";
    $authorName = "Eric Nielsen";
    $githubRepo = "https://github.com/Ericn01/COMP3512-Assignment1";

    $theme1 = "simple-elegance";
    $theme2 = "mango-tango";
    $theme3 = "purple-madness";
    $theme4 = "midnight-moon";

    echo "<ul class='themes-list'>";
          echo "<li> <button id='theme1' class='theme-btn simple' title='Simple Elegance Theme'> Simple Elegance </button> </li>";
          echo "<li> <button id='theme2' class='theme-btn mango' title='Mango Tango Theme'> Mango Tango </button> </li>";
          echo "<li> <button id='theme3' class='theme-btn purple' title='Purple Madness Theme'> Purple Madness </button> </li>";
          echo "<li> <button id='theme4' class='theme-btn midnight' title='Midnight Moon Theme'> Midnight Moon </button> </li>";
    echo "</ul>";

    echo "<ul class='foot-list'>";
      echo "<li> $className </li>";
      echo "<li> <a href=" . $githubRepo . "> Github Repository </a> </li>";
      echo "<li> Copyright $authorName 2022 </li>";
    echo "</ul>";
  ?>
  <script>
    function chooseTheme(userTheme){
      let dominantColor = '#E8E9EB';
      let contrastingColor = '#F06543';
      let highlightColor = '#bc96e6';
      let complimentaryColor = '#EBEBD3';
      switch(userTheme){
        case "mango-tango":
           dominantColor = '#F4BB44';
           contrastingColor = '#FA9F42 ';
           highlightColor = '#ff6700';
           complimentaryColor = '#F9DB6D';
          break;
        case "purple-madness":
           dominantColor = '#7209b7';
           contrastingColor: '#32BEAF';
           highlightColor: '#FFA2FF';
           complimentaryColor: '#008080';
          break;
        case "midnight-moon":
           dominantColor = '#3E363F';
           contrastingColor = '#8A8D91';
           highlightColor = '#7d83ff';
           complimentaryColor = '#BCBDC0';
          break;
        default:
          break;
      }
      document.body.style.setProperty('--dominant-color', dominantColor);
      document.body.style.setProperty('--contrasting-color', contrastingColor);
      document.body.style.setProperty('--highlight-color', highlightColor);
      document.body.style.setProperty('--complimentary-color', complimentaryColor);
    }
    let themeBtns = document.getElementsByClassName("theme-btn"); // Setting the theme buttons
    for (let i = 0; i < themeBtns.length; i++){
      let themeName = "";
      switch(i){
        case 0:
          themeName = "simple-elegance";
          break;
        case 1:
          themeName = "mango-tango";
          break;
        case 2:
          themeName = "purple-madness";
          break;
        case 3:
          themeName = "midnight-moon";
          break;
        default:
      }
      themeBtns[i].addEventListener("click", function(){
        chooseTheme(themeName);
      });
    }
  </script>
</footer>
