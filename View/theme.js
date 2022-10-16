  window.onload = function(){ // Wait to load the JS file so there aren't any weird bugs
      let cookieThemeValue = "";
      let themeButtons = document.getElementsByClassName("theme-btn");  // retrieving an array that contains all the theme buttons.
      for (let i = 0; i < themeButtons.length; i++){
        themeButtons[i].addEventListener("click", function(){
          switch(i){
            case 0:
              cookieThemeValue = "simple-elegance";
              break;
            case 1:
              cookieThemeValue = "mango-tango";
              break;
            case 2:
              cookieThemeValue = "purple-madness";
              break;
            case 3:
              cookieThemeValue =  "midnight-moon";
              break;
            case 4:
              cookieThemeValue =  "gentle-beauty";
              break;
            case 5:
              cookieThemeValue = "mellow-yellow";
              break;
            default:
              break;
            }
          document.cookie = `themeName=${cookieThemeValue}; expires=Sat, 24 May 2031 00:00:00 GMT; path=/`; // setting the cookie value
          let themeName = getThemeCookie(document.cookie);
          chooseTheme(themeName);
        });
      }
      chooseTheme(getThemeCookie(document.cookie)); // Overrides the default color theme whenever a page load occurs.
  }
  /**
  * The split function divides the cookie into its constituent key value pairs (seperated by semicolon)
  * If one of the arrays contains the key "themeName", then the themeCookie is at the specified index
  * The twelth character (index 11) of the key value pair represents the beginning of the value
  */
  function getThemeCookie(cookieString) {
    let cookies = cookieString.split(";");
    let themeCookie = null;
    const valueSubstringStart = 11;
    for (let i = 0; i < cookies.length; i++){
      if (cookies[i].includes("themeName")){
        themeCookie = cookies[i];
        break;
      }
    }
    if (!themeCookie){
      return "purple-madness"; // Default style
    }
    return themeCookie.substring(valueSubstringStart);
  }
  function chooseTheme(userTheme){
    let rootSelection = document.querySelector(':root');
    let dominantColor = '#1C6758';
    let contrastingColor = '#2b7261';
    let highlightColor = '#FA7070';
    let complimentaryColor = '#3D8361';
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
      case "mellow-yellow":
          dominantColor = '#fcfb00';
          contrastingColor = '#fcab00';
          highlightColor = "violet";
          complimentaryColor = '#F6C604';
          break;
      default:
        break;
    }
    rootSelection.style.setProperty('--dominant-color', dominantColor);
    rootSelection.style.setProperty('--contrasting-color', contrastingColor);
    rootSelection.style.setProperty('--highlight-color', highlightColor);
    rootSelection.style.setProperty('--complimentary-color', complimentaryColor);
  }
