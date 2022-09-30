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
      $this->songId = $songRecord['id'];
      $this->title = $songRecord['title'];
      $this->year = $songRecord['year'];
      $this->genreName = $songRecord['genre'];
      $this->artistName = $songRecord['artist'];
      $this->bpm = $songRecord['bpm'];
      $this->energy = $songRecord['energy'];
      $this->danceability = $songRecord['danceability'];
      $this->loudness = $songRecord['loudness'];
      $this->valence = $songRecord['valence'];
      $this->acousticness = $songRecord['acousticness'];
      $this->speechiness = $songRecord['speechiness'];
      $this->liveness = $songRecord['valence'];
      $this->duration = $songRecord['duration'];
      $this->popularity = $songRecord['popularity'];
    }

  }

 ?>
