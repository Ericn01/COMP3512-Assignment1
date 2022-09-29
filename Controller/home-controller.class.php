<?php
  include "../Model/home-page.class.php";
  class HomePageController extends HomeEntries{
    public function popularSongs(){
      return $this->getMostPopularSongs();
    }
    public function topGenres(){
      return $this->getTopGenres();
    }
  }
?>
