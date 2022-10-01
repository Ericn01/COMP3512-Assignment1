<?php
  /* Class to represent the data that will be shown on the single song page */
  class Song{
    private $songId;
    private $title;
    private $year;
    private $genreName;
    private $artistName;
    private $bpm;
    private $energy;
    private $danceability;
    private $loudness;
    private $liveness;
    private $valence;
    private $duration;
    private $acousticness;
    private $speechiness;
    private $popularity;
    // Constructor for a song, with all the data that will be displayed on the songs page
    function __construct($songRecord){
      $this->songId = $songRecord[0]['id'];
      $this->title = $songRecord[0]['title'];
      $this->year = $songRecord[0]['year'];
      $this->genreName = $songRecord[0]['genre'];
      $this->artistName = $songRecord[0]['artist'];
      $this->bpm = $songRecord[0]['bpm'];
      $this->energy = $songRecord[0]['energy'];
      $this->danceability = $songRecord[0]['danceability'];
      $this->loudness = $songRecord[0]['loudness'];
      $this->valence = $songRecord[0]['valence'];
      $this->acousticness = $songRecord[0]['acousticness'];
      $this->speechiness = $songRecord[0]['speechiness'];
      $this->liveness = $songRecord[0]['valence'];
      $this->duration = $songRecord[0]['duration'];
      $this->popularity = $songRecord[0]['popularity'];
    }
    // GETTERS
    public function getTitle(){
      return $this->title;
    }
    public function getYear(){
      return $this->year;
    }
    public function getGenre(){
      return $this->genreName;
    }
    public function getArtist(){
      return $this->artistName;
    }
    public function getBpm(){
      return $this->bpm;
    }
    public function getEnergy(){
      return $this->energy;
    }
    public function getDanceability(){
      return $this->danceability;
    }
    public function getLoudness(){
      return $this->loudness;
    }
    public function getValence(){
      return $this->valence;
    }
    public function getAcousticness(){
      return $this->acousticness;
    }
    public function getSpeechiness(){
      return $this->speechiness;
    }
    public function getLiveness(){
      return $this->liveness;
    }
    public function getDurationMinutes(){
      $durationMin = floor($this->duration/60) . ":" . $this->duration % 60;
      return $durationMin;
    }
    public function getPopularity(){
      return $this->popularity;
    }
  }

 ?>
