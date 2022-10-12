
  window.onload = function(){ // Wait to load the JS file so there aren't any weird bugs
    let themeButtons = document.getElementsByClassName("theme-btn"); // retrieving an array that contains all the theme buttons.
    for (let i = 0; i < themeButtons.length; i++){
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
        case 4:
          themeName = "gentle-beauty";
          break;
        default:
      }
      themeButtons[i].addEventListener("click", function(){
        chooseTheme(themeName);
      });
    }
  }

  function chooseTheme(userTheme){
    let dominantColor = '#fbfefb';
    let contrastingColor = '#efe5dc';
    let highlightColor = '#f3d8c7';
    let complimentaryColor = '#d0b8ac';
    switch(userTheme){
      case "mango-tango":
         dominantColor = '#F9DB6D';
         contrastingColor = '#fa9f42';
         highlightColor = '#f78154';
         complimentaryColor = '#f4bb44';
         break;
      case "purple-madness":
         dominantColor = '#7209b7';
         contrastingColor = '#32BEAF';
         highlightColor = '#FFA2FF';
         complimentaryColor = '#008080';
         break;
      case "midnight-moon":
         dominantColor = '#1d3557';
         contrastingColor = '#457b9d';
         highlightColor = '#f1faee';
         complimentaryColor = '#a8dadc';
         break;
      case "gentle-beauty":
          dominantColor = '#ffffff';
          contrastingColor = '#b8f2e6';
          highlightColor = '#ffa69e';
          complimentaryColor = '#aed9e0';
          break;
      default:
        break;
    }
    document.body.style.setProperty('--dominant-color', dominantColor);
    document.body.style.setProperty('--contrasting-color', contrastingColor);
    document.body.style.setProperty('--highlight-color', highlightColor);
    document.body.style.setProperty('--complimentary-color', complimentaryColor);
  }
