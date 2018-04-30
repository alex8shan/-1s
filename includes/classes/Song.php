<?php
    class Song {

        private $con;
        private $id;
        private $song;

        public function __construct($con, $id) {
            $this->con = $con;
            $this->id = $id;

            $songQuery = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
            $this->song = mysqli_fetch_array($songQuery);
        }

        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->song['title'];
        }

        public function getArtist() {
            return new Artist($this->con, $this->song['artist']);
        }

        public function getAlbum() {
            return new Artist($this->con, $this->song['album']);
        }

        public function getPath() {
            return $this->song['path'];
        }

        public function getDuration() {
            return $this->song['duration'];
        }

        public function getGenre() {
            return $this->song['genre'];
        }

        public function getSong() {
            return $this->song;
        }
    }

?>