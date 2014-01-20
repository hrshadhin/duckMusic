
<?php
include('simple_html_dom.php');
class myParse
{
    public $data = array();
	public function multiLink($url){
     
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
	public function singleLink($ul){
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
	
		
	}

?>
