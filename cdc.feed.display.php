<?
	header('Content-Type: application/json');
	include_once('cache.php');

	echo get_content('cdc.feed.display.json', 'cdc.feed.parse.php');
?>