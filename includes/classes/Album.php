<?php
    class Album {
        // private $db;
        private $con;
        private $id;
        private $album;

        public function __construct($con, $id) {
            // $this->con = $db;
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

        public function getSongIds() {
            $query = mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id' ORDER BY 
            albumOrder ASC");

            $songIdArray = array();

            while($row = mysqli_fetch_array($query)) {
                array_push($songIdArray, $row['id']);
            }
            return $songIdArray;
        }

        public function getNumberOfSongs() {
            $numSongQuery =mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id'");
            return mysqli_num_rows($numSongQuery);
        }
    }

?>