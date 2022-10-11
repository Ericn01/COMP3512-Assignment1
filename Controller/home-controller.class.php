<?php
  include "../Model/home-page.class.php";
  class HomePageController extends HomeEntries{
    public function popularSongs(){
      return $this->getMostPopularSongs();
    }
    public function topGenres(){
      return $this->getTopGenres();
    }
    public function longestAcousticSongs(){
      return $this->getLongestAcousticSongs();
    }
    // Retrieve most popular one hit wonders
    public function oneHitWonders(){
      return $this->getOneHitWonders();
    }
    // Retrieve top artist
    public function topArtists(){
      return $this->getTopArtists();
    }
    // Retrieve running songs
    public function runningSongs(){
      return $this->getRunningSongs();
    }
    // Retrieve club songs
    public function clubSongs(){
      return $this->getClubSongs();
    }

    public function studyingSongs(){
      return $this->getStudyingSongs();
    }

  }
?>
