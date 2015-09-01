<?
	header('Content-Type: application/json');
	include_once('cache.php');

	echo get_content('cdc.podcasts.json', 'http://www2c.cdc.gov/podcasts/feed.asp?feedid=50&maxnumber=10&pagesize=10&format=json&callback=?');
?>