<?php
	
	function marqueeGen($content) {
		return `
		<center class="song" >
		    <marquee class="music fade-in-fwd" width="250px" direction="left" scrollamount="3" behavior="scroll">
		    	Currently Playing:  `.$content.`
		    </marquee>
		</center>`;
	}
	function randomSongPicker() {
		$songNames = file_get_contents("https://dxcdn.net/random_song_picker/namelinks.txt");
		$songURLs = json_decode(file_get_contents("https://dxcdn.net/random_song_picker/file.json"),true);
		
		$randomInt = mt_rand(0,count($songURLs));

		$marquee = $songNames[$randomInt];

		$songChoice = "https://storage.googleapis.com/cdn.jyles.club/pageaudio/".$songURLs[$randomInt];

		$iframe = '<iframe frameborder="0" style="position:absolute;top:5px;left:5px;" src="'.$songChoice.'" allow="autoplay" height="0" width="0" id="iframe"></iframe>';
		$final = $marquee.$iframe;
		return $final;
	}
?>
