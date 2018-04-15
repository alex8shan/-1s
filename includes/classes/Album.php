<?php
    class Album {

        private $con;
        private $id;
        private $album;

        public function __construct($con, $id) {
            $this->con = $con;
            $this->id = $id;

            $albumQuery = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
            $this->album = mysqli_fetch_array($albumQuery);
        }

        public function getTitle() {
            return $this->album['title'];
        }
        public function getArtist() {
            return new Artist($this->con, $this->album['artist']);
        }
        public function getGenre() {
            return $this->album['genre'];
        }
        public function getArtworkPath() {
            return $this->album['artworkPath'];
        }
    }

?>