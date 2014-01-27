
<?php
include "simple_html_dom.php";

function select_artist_by_alpha(){
  $alpha =array();
  $html = file_get_html('http://www.music.com.bd/download/browse/');
  foreach($html->find('.autoindex_a') as $ul){
  $links  = $ul->href;
  foreach ($ul->find('strong') as $strong) {
    $name = $strong->plaintext ;
   	$alpha[] = $name;
    }
  }
   return $alpha;
}

function select_artist_by_name($name){
		$url ="http://www.music.com.bd/download/browse/".$name."/";
		$html = file_get_html($url);
		$dataArtists = array();
		foreach ($html->find('a.autoindex_a') as $link) {
			    foreach($link->find('strong') as $tag)
					{
					    $dataArtists[] = $tag->plaintext ;
					            
					}
	
			 }
	
		array_shift($dataArtists);
	    return $dataArtists;
}


function arAlbums($alpha , $artist_name){
   $albums = array();
  $html = file_get_html('http://www.music.com.bd/download/browse' . '/' . $alpha . '/' . rawurlencode($artist_name) . "/") ;
    foreach ($html->find('a.autoindex_a') as $link) {
      $al =$link->href;
    foreach($link->find('strong') as $tag)
       {
             $albums[] = $tag->plaintext ;
             
       }
     }
     //To do - lonely mp3 file check
     array_shift($albums); //Removed "parent directory"
     return $albums;
}


function getSongs($alpha,$arname,$album){
	$songs=[];
        $url ='http://www.music.com.bd/download/browse' . '/' . $alpha . '/' . rawurlencode($arname) . '/'.rawurlencode($album)."/";
		$html = file_get_html($url);
		foreach ($html->find('.snap_shots') as $link) {

	    		if(strstr($link, 'mp3.html')){
			      	$al = $link->href;
				$acl =str_replace(" ", '%20', $al);
				$html=file_get_html($acl);
				$songName=$html->find('span[id=download_link]', 0)->plaintext;
				$songName=str_replace($arname." -","",$songName);
				$words = explode(' ', $songName);
				$slice = array_slice($words,3,-2);
				$songName =implode(' ', $slice);
				$a =$html->find('span[id=download_link]', 0);
				foreach($a->find('a[href]') as $link){
					 $al =$link->getAttribute("href");
				      	 $url=str_replace(" ", '%20', $al);

				      	 $song = [ 'name' => $songName , 'url' => $url];
                		  array_push($songs , $song) ;
		      			
		     
		    			
				}
				
		}
	}
	return $songs;
       
	}

?>
