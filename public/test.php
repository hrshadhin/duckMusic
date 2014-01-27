<?php
include "simple_html_dom.php";
$alpha="C";
$arname="Cryptic Fate";
$album="Danob";
 $songs=array();
        $url ='http://www.music.com.bd/download/browse' . '/' . $alpha . '/' . rawurlencode($arname) . '/'.rawurlencode($album)."/";
		$html = file_get_html($url);
		foreach ($html->find('a.autoindex_a') as $link) {
			    echo $link."<br>";
	    		/*if(strstr($link, '.mp3')){
			      	$al = $link->getAttribute("href");
			      	$songs[]=$al;
	     
	    		}*/
	    	}



?>