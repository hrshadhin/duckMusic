
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
			    		if(strstr($link, 'browse')){
					      	$al = $link->plaintext;
					      	$dataArtists[] =array('arname' => $al);
			     
			    		}
			    	}
		$dArt = array_slice($dataArtists,1,sizeof($dataArtists));
	    return $dArt;
}

function multiLink($url){
     
		$html = file_get_html($url);
		foreach ($html->find('a.autoindex_a') as $link) {
	    		if(strstr($link, '.mp3')){
			      	$al = $link->getAttribute("href");
			      	 $acl=preg_replace("/ /", '%20', $al);
			      	  $this->singleLink($acl);
	     
	    		}
	    	}
	    return $this->data;
	}
function singleLink($ul){
		$html = file_get_html($ul);
		$article = $html->find('span[id=download_link]', 0);
		//for song name
		$songName=$html->find('span[id=download_link]', 0)->plaintext;
		$words = explode(' ', $songName);
		$slice = array_slice($words,3,-2);
		$result =implode(' ', $slice);
		
		//end song name extraction
		foreach($article->find('a[href]') as $link){

		    //if the href contains singer then echo this link
		    if(strstr($link, '.mp3')){
		      	$al = $link->getAttribute("href");
		      	 $acl=preg_replace("/ /", '%20', $al);
		      	 $this->data[$result]=$acl;
		      	
		     
		    }
		}
		
		
	}
function getLinks(){
		$data=$this->multiLink("http://www.music.com.bd/download/browse/W/Warfaze/Oshamajik/");
	    $dataexp = array();
		foreach ($data as $key => $value) {
	   		$dataexp[] = array("name" => $key,
						  "url" => $value
						 );
	   }
		return json_encode($dataexp);
	
		
	}

 


?>
