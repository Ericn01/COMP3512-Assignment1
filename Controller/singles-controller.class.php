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
  }
?>
