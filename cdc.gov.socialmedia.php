<?
	header('Content-Type: text/html');
	include_once('cache.php');

	echo get_content('cdc.gov.socialmedia.html', 'http://www.cdc.gov/socialmedia/');
?>