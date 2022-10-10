<?php
  include '../Model/single-song.class.php';
  include '../includes/song.class.inc.php';
  /* I'm going to use this class to organize the presentation of
  the data that I want to present (example: x song ranks as #y in [analysis_data]),
  along with formatting it in the proper way (seconds to minutes) for duration.
  The markup is going to be generated here, sent to the view and then CSS styling
  will be applied on top from there. */
  class SingleSongController extends SingleSong{
    private $songId;
    function __construct($song_id){
      $this->songId = $song_id;
    }
    // Returns a single song object based on the given songID.
    public function singleSong(){
      if ($this->getSongData($this->songId) != null){
        $songData = $this->getSongData($this->songId);
        $song = new Song($songData);
        return $song;
      }
      return "<h1> Sorry, that song doesn't exists </h1>";
    }
    // Gives meaning/context to the arbitrary popularity field
    public function interpretPopularity($popularity){
      $popularityInt = intval($popularity);
      $popInterpret= "Relative to others, this song is ";
      if ($popularity <= 60){
        $popInterpret .= " not popular";
      }
      else if ($popularityInt > 60 && $popularityInt <= 72){
        $popInterpret .= " somewhat popular";
      }
      else if ($popularityInt > 72 && $popularityInt <= 81){
        $popInterpret .= " popular";
      }
      else if ($popularityInt > 81 && $popularityInt <= 88){
        $popInterpret .= " very popular";
      }
      else {
        $popInterpret .= " extremely popular";
      }
      return $popInterpret;
    }
    // Interprets how danceable the song is.
    public function interpretDanceability($danceability){
      $danceability = intval($danceability);
      $danceabilityInterpret= "This song  ";
      if ($danceability <= 40){
        $danceabilityInterpret . " probably won't make you want to dance";
      }
      else if ($danceability > 40 && $danceability <= 60){
        $danceabilityInterpret .= " might make you want to move a little";
      }
      else if ($danceability > 60 && $danceability <= 80){
        $danceabilityInterpret .= " will probably make you want to dance";
      }
      else if ($danceability > 80 && $danceability <= 90){
        $danceabilityInterpret .= " will make almost certainly make you dance";
      }
      else {
        $danceabilityInterpret .= " will absolutely make you dance!";
      }
      return $danceabilityInterpret;
    }
    // Interprets the tempo of a given song [Slow tempo -> Very fast tempo].
    public function interpretBpm($bpm){
      $bpm = intval($bpm);
      $bpmInterpret = "Runs at $bpm beats per minute (";
      if ($bpm <= 80){
        $bpmInterpret .= "slow tempo)";
      }
      else if ($bpm > 80 && $bpm <= 120){
        $bpmInterpret .= "moderate tempo)";
      }
      else if ($bpm > 120 && $bpm <= 135){
        $bpmInterpret .= "moderate-fast tempo)";
      }
      else if ($bpm > 135 && $bpm <= 165){
        $bpmInterpret .= "fast & sweet tempo)";
      }
      else if ($bpm > 165 && $bpm <= 180){
          $bpmInterpret .= "fast & lively tempo)";
      }
      else if ($bpm > 180 && $bpm < 200){
          $bpmInterpret .= "very fast & energetic tempo)";
      }
      else{
          $bpmInterpret .= "incredibly fast tempo)";
      }
      return $bpmInterpret;
    }

    // Gives meaning to the speechiness value from the given song.
    public function interpretSpeechiness($speechiness){
      $speechiness = intval($speechiness);
      $speechInterpret = "The artist sings ";
      if ($speechiness < 20){
        $speechInterpret .= ' a little bit';
      }
      else if ($speechiness > 20 && $speechiness <= 40){
        $speechInterpret .= ' a normal amount';
      }
      else if ($speechiness > 40 && $speechiness <= 50){
        $speechInterpret .= ' a lot';
      }
      else {
        $speechInterpret .= ' the whole time';
      }
      $speechInterpret .= ' in this song.';
      return $speechInterpret;
    }
    // Interprets the arbitrary liveness value from a given song
    public function interpretLiveness($liveness){
      $liveness = intval($liveness);
      $livenessInterpret = "This song has ";
      if ($liveness  < 8){
        $livenessInterpret .= ' almost no liveness';
      }
      else if ($liveness > 8 && $liveness  <= 24){
        $livenessInterpret .= ' low liveness';
      }
      else if ($liveness  > 24 && $liveness  <= 36){
        $livenessInterpret .= ' moderate liveness';
      }
      else if ($liveness > 36 && $liveness <= 42){
        $livenessInterpret .= ' fairly high liveness';
      }
      else if ($liveness > 42 && $liveness <= 48){
        $livenessInterpret .= ' high liveness';
      }
      else{
        $livenessInterpret .= ' very high liveness';
      }
      return $livenessInterpret;
    }
    // Interprets the energy levels of the given song (not energetic to very energetic).
    public function interpretEnergy($energy){
      $energy = intval($energy);
      $energyInterpret = "This song is";
      if ($energy  < 25){
        $energyInterpret .= ' not energetic';
      }
      else if ($energy > 25 && $energy <= 50){
        $energyInterpret .= ' slighly energetic';
      }
      else if ($energy  > 50 && $energy  <= 65){
        $energyInterpret .= ' moderately energetic';
      }
      else if ($energy > 65 && $energy <= 82){
        $energyInterpret .= ' fairly energetic';
      }
      else if ($energy > 82 && $energy <= 91){
        $energyInterpret .= ' highly energetic';
      }
      else {
        $energyInterpret .= ' intensely energetic';
      }
      return $energyInterpret;
    }


  // Interprets the valence (positivity of the song)
  public function interpretValence($valence){
    $valence = intval($valence);
    $valenceInterpret = "The song has a ";
    if ($valence  < 15){
      $valenceInterpret .= ' depressing';
    }
    else if ($valence > 15 && $valence  <= 30){
      $valenceInterpret .= ' sad';
    }
    else if ($valence  > 30 && $valence  <= 50){
      $valenceInterpret .= ' somewhat negative';
    }
    else if ($valence > 50 && $valence <= 70){
      $valenceInterpret .= ' somewhat positive';
    }
    else if ($valence > 70 && $valence <= 80){
      $valenceInterpret .= ' cheerful';
    }
    else if ($valence > 80 && $valence <= 90){
      $valenceInterpret .= ' happy';
    }
    else {
      $valenceInterpret .= ' incredibly joyful';
    }
    $valenceInterpret .= ' mood';
    return $valenceInterpret;
  }

  public function interpretAcousticness($acousticness){
  $acousticness = intval($acousticness);
  $acousticnessInterpret = "The song ";
  if ($acousticness  < 20){
    $acousticnessInterpret .= ' is not acoustic';
  }
  else if ($acousticness > 20 && $acousticness  <= 30){
    $acousticnessInterpret .= ' has low acousticness';
  }
  else if ($acousticness  > 30 && $acousticness  <= 50){
    $acousticnessInterpret .= ' has moderate acousticness';
  }
  else if ($acousticness > 50 && $acousticness <= 70){
    $acousticnessInterpret .= ' has decent acousticness';
  }
  else if ($acousticness > 70 && $acousticness <= 85){
    $acousticnessInterpret .= ' has great acousticness';
  }
  else{
    $acousticnessInterpret .= ' has fantastic acousticness';
  }
  return $acousticnessInterpret;
}

// A lot of code repitition for sure, but it's the only that I could think of doing this.}

}



?>
