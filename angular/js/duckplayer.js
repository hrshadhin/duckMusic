function nextsong(){
  $("#jquery_jplayer_1").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            mp3: "http://music-com-bd.com/Music/C/Cryptic%20Fate/Danob/03%20-%20Cryptic%20Fate%20-%20Nidra%20(music.com.bd).mp3"
          }).jPlayer('play');
        },
        swfPath: "jplayer.swf",
        supplied: "mp3"
      });
}