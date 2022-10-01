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
      if ($popularity <= 30){
        $popInterpret . " not popular";
      }
      else if ($popularityInt > 30 && $popularityInt <= 60){
        $popInterpret .= " somewhat popular";
      }
      else if ($popularityInt > 60 && $popularityInt <= 80){
        $popInterpret .= " popular";
      }
      else if ($popularityInt > 80 && $popularityInt <= 90){
        $popInterpret .= " very popular";
      }
      else {
        $popInterpret .= " extremely popular";
      }
      return $popInterpret;
    }

    public function interpretDanceability($danceability){
      $danceability = intval($danceability);
      $danceabilityInterpret= "This song  ";
      if ($danceability <= 20){
        $danceabilityInterpret . " probably won't make you want to dance";
      }
      else if ($danceability > 20 && $danceability <= 45){
        $danceabilityInterpret .= " might make you want to move a little";
      }
      else if ($danceability > 45 && $danceability <= 80){
        $danceabilityInterpret .= " will probably make you want to dance";
      }
      else if ($danceability > 80 && $danceability <= 90){
        $danceabilityInterpret .= " will make almost certainly make you dance";
      }
      else {
        $danceabilityInterpret .= " is contagiously danceable";
      }
      return $danceabilityInterpret;
    }

    public function interpretBpm($bpm){
      $bpm = intval($bpm);
      $bpmInterpret = "Runs at $bpm beats per minute (";
      if ($bpm <= 80){
        $bpmInterpret .= " slow tempo)";
      }
      else if ($bpm > 80 && $bpm <= 120){
        $bpmInterpret .= " moderate tempo)";
      }
      else if ($bpm > 120 && $bpm <= 135){
        $bpmInterpret .= " moderate-fast tempo)";
      }
      else if ($bpm > 135 && $bpm <= 165){
        $bpmInterpret .= " fast & sweet tempo)";
      }
      else if ($bpm > 165 && $bpm <= 180){
          $bpmInterpret .= " fast & lively tempo)";
      }
      else if ($bpm > 180 && $bpm < 200){
          $bpmInterpret .= " very fast & energetic tempo)";
      }
      else{
          $bpmInterpret .= " incredibly fast tempo)";
      }
      return $bpmInterpret;
    }

    public function interpretSpeechiness($speechiness){
      $speechiness = intval($speechiness);
      $speechInterpret = "The artist sings ";

      if ($speechiness < 30){
        $speechInterpret .= ' a little bit';
      }
      else if ($speechiness > 30 && $speechiness <= 65){
        $speechInterpret .= ' a normal amount';
      }
      else if ($speechiness > 65 && $speechiness <= 85){
        $speechInterpret .= ' a lot';
      }
      else {
        $speechInterpret .= ' the whole time';
      }
      $speechInterpret .= ' in this song.';
      return $speechInterpret;
    }

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
      else if ($valence > 80 && $valence <= 95){
        $valenceInterpret .= ' happy';
      }
      else {
        $valenceInterpret .= ' incredibly joyful';
      }
      $valenceInterpret .= ' mood.';
      return $valenceInterpret;
    }

    public function interpretEnergy($energy){
      $energy = intval($energy);
      $energyInterpret = "";
      if ($energy  < 15){
        $energyInterpret .= 'Not energetic';
      }
      else if ($energy > 15 && $energy <= 30){
        $energyInterpret .= 'Low energy';
      }
      else if ($energy  > 30 && $energy  <= 70){
        $energyInterpret .= 'Mildy energetic';
      }
      else if ($energy > 50 && $energy <= 70){
        $energyInterpret .= 'Energetic';
      }
      else if ($energy > 70 && $energy <= 80){
        $energyInterpret .= 'Highly energetic';
      }
      else if ($energy > 80 && $energy <= 95){
        $energyInterpret .= 'Intense';
      }
      else {
        $energyInterpret .= 'Extremely intense';
      }
      $energyInterpret .= " ($energy%)";
      return $energyInterpret;
    }
  }

?>
