<?php
//http://simplehtmldom.sourceforge.net/manual.htm
$url = 'http://www.cdc.gov';
include('simple_html_dom.php');
 
$html = file_get_html($url);

//-------------------
// Create DOM from URL or file
// $html = file_get_html($url);

// // Find all images 
// foreach($html->find('img') as $element) 
//        echo $element->src . '<br>';

// // Find all links 
// foreach($html->find('a') as $element) 
//        echo $element->href . '<br>';
//-------------------

// echo file_get_html($url)->plaintext; 

// ----------------------


// Find all article blocks
foreach($html->find('div.syndicate') as $article) {
  echo $article;
}

//print_r($articles);
?>