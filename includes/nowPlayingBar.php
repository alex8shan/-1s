<?php
//get at most 10 songs in random order from database
$songQuery = mysqli_query($con, "SELECT * FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

//getting song playlist
while($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}

//convert array to json
$jsonArray = json_encode($resultArray);
?>

<script>

$(document).ready(function() {
	var newPlaylist = <?php echo $jsonArray; ?>;
	//create the audio object for the HTML player
	audioElement = new Audio();

	setTrack(newPlaylist[0], newPlaylist, false);
	updateVolumeProgressBar(audioElement.audio);

	$("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function(e) {
		e.preventDefault();
	});


	$(".playbackBar .progressBar").mousedown(function() {
		mouseDown = true;
	});

	$(".playbackBar .progressBar").mousemove(function(e) {
		if(mouseDown == true) {
			//Set time of song, depending on position of mouse
			timeFromOffset(e, this);
		}
	});

	$(".playbackBar .progressBar").mouseup(function(e) {
		timeFromOffset(e, this);
	});


	$(".volumeBar .progressBar").mousedown(function() {
		mouseDown = true;
	});

	$(".volumeBar .progressBar").mousemove(function(e) {
		if(mouseDown == true) {

			var percentage = e.offsetX / $(this).width();

			if(percentage >= 0 && percentage <= 1) {
				audioElement.audio.volume = percentage;
			}
		}
	});

	$(".volumeBar .progressBar").mouseup(function(e) {
		var percentage = e.offsetX / $(this).width();

		if(percentage >= 0 && percentage <= 1) {
			audioElement.audio.volume = percentage;
		}
	});

	$(document).mouseup(function() {
		mouseDown = false;
	});
});
/**
 * Changes the song's play time when the progress bar changes (is dragged)
 */
function timeFromOffset(mouse, progressBar) {
	var percentage = mouse.offsetX / $(progressBar).width() * 100;
	var seconds = audioElement.audio.duration * (percentage / 100);
	audioElement.setTime(seconds);
}
/**
 * Switch to the previous song of playlist
 */
function prevSong() {
	//before the song has been played for 3 seconds
	if(audioElement.audio.currentTime >= 3 || currentIndex == 0) {
		audioElement.setTime(0);
	}
	else {
		currentIndex = currentIndex - 1;
		setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
	}
}
/**
 * Switch to the next song of playlist
 */
function nextSong() {
	//repeat mode
	if(repeat == true) {
		audioElement.setTime(0);
		playSong();
		return null;
	}

	if(currentIndex == currentPlaylist.length - 1) {
		currentIndex = 0;
	}
	else {
		currentIndex++;
	}

	var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
	setTrack(trackToPlay, currentPlaylist, true);
}
/**
 * Change the repeat status and repeat button
 */
function setRepeat() {
	repeat = !repeat;
	var imageName = repeat ? "repeat-active.png" : "repeat.png";
	$(".controlButton.repeat img").attr("src", "assets/img/icons/" + imageName);
}
/**
 * Change the shuffle status and shuffle button
 */
function setShuffle() {
	shuffle = !shuffle;
	var imageName = shuffle ? "shuffle-active.png" : "shuffle.png";
	$(".controlButton.shuffle img").attr("src", "assets/img/icons/" + imageName);

	if(shuffle == true) {
		//Randomlist playlist
		shuffleArray(shufflePlaylist);
		currentPlaylist = shufflePlaylist.indexOf(audioElement.currentPlaying.id);
	} else {
		//back to regular playlist
		currentPlaylist = currentPlaylists.indexOf(audioElement.currentPlaying.id);
	}
}
/**
 * Used for shuffle playlist array
 */
function shuffleArray(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i];
        a[i] = a[j];
        a[j] = x;
    }
    return a;
}
/**
 * Mute the song
 */
function setMute() {
	audioElement.audio.muted = !audioElement.audio.muted;
	var imageName = audioElement.audio.muted ? "volume-mute.png" : "volume.png";
	$(".controlButton.volume img").attr("src", "assets/img/icons/" + imageName);
}
/**
 * Fetch the song info from the database via Ajax and display in the playing bar
 */
function setTrack(trackId, newPlaylist, play) {

	if(newPlaylist != currentPlaylist) {
		currentPlaylist = newPlaylist;
		shufflePlaylist = currentPlaylist.slice();
		shuffleArray(shufflePlaylist)
	}

	if(shuffle == true) {
		currentIndex = shufflePlaylist.indexOf(trackId);
	} else {
		currentIndex = currentPlaylist.indexOf(trackId);
	}
	pauseSong();

	$.post("includes/handlers/ajax/getSongJson.php", { songId: trackId }, function(data) {

		var track = JSON.parse(data);
		$(".trackName span").text(track.title);

		$.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist }, function(data) {
			var artist = JSON.parse(data);
			$(".artistName span").text(artist.name);
		});

		$.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album }, function(data) {
			var album = JSON.parse(data);
			$(".albumLink img").attr("src", album.artworkPath);
		});


		audioElement.setTrack(track);
		// playSong();
		if(play == true) {
			playSong();
		}
	});

	
}
/**
 * Play the song and update the play counter via Ajax.
 **/
function playSong() {

	if(audioElement.audio.currentTime == 0) {
		$.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
	}

	$(".controlButton.play").hide();
	$(".controlButton.pause").show();
	audioElement.play();
}
/**
 * Pause the song
 */
function pauseSong() {
	$(".controlButton.play").show();
	$(".controlButton.pause").hide();
	audioElement.pause();
}
</script>

<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <img src="" class="albumArtwork">
                </span>

                <div class="trackInfo">
					<span class="trackName">
						<span></span>
					</span>

					<span class="artistName">
						<span></span>
					</span>
                </div>
            </div>
        </div>

        <div id="nowPlayingCenter">

            <div class="content playerControls">

                <div class="buttons">

                    <button class="controlButton shuffle" title="Shuffle button" onclick="setShuffle()">
                        <img src="assets/img/icons/shuffle.png" alt="Shuffle">
                    </button>

                    <button class="controlButton previous" title="Previous button" onclick="prevSong()">
                        <img src="assets/img/icons/previous.png" alt="Previous">
                    </button>

                    <button class="controlButton play" title="Play button" onclick="playSong()">
                        <img src="assets/img/icons/play.png" alt="Play">
                    </button>

                    <button class="controlButton pause" title="Pause button" style="display: none;" onclick="pauseSong()">
                        <img src="assets/img/icons/pause.png" alt="Pause">
                    </button>

                    <button class="controlButton next" title="Next button"  onclick="nextSong()">
                        <img src="assets/img/icons/next.png" alt="Next">
                    </button>

                    <button class="controlButton repeat" title="Repeat button">
                        <img src="assets/img/icons/repeat.png" alt="Repeat" onclick="setRepeat()">
                    </button>

                </div>


                <div class="playbackBar">

                    <span class="progressTime current">0.00</span>

                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>

                    <span class="progressTime remaining">0.00</span>


                </div>


            </div>


        </div>

        <div id="nowPlayingRight">
            <div class="volumeBar">

                <button class="controlButton volume" title="Volume button" onclick="setMute()">
                    <img src="assets/img/icons/volume.png" alt="Volume">
                </button>

                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    
</div>