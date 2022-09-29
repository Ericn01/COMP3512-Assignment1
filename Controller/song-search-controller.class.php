<?php
include "../Model/song-search.class.php";
    # This class doesn't manipulate the given queries in any way,
    # it pretty much just passes the model data right back to the view.
    class SongSearchController extends SongSearch{
        public function genresMarkup(){
            $rows = $this->getgenres();
            return $rows;
        }
        public function artistMarkup(){
            $rows = $this->getartists();
            return $rows;
        }
    }
?>
