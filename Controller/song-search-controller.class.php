<?php
include "../Model/song-search.class.php";
    class SongSearchController extends SongSearch{
        public function genresMarkup(){
            $rows = $this->getGenreOptions();
        }
        public function artistMarkup(){
            $rows = $this->getArtistOptions();
            return $rows;
        }
    }
?>