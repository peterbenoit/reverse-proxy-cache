<?
	header('Content-Type: application/json');
	include_once('cache.php');

	echo get_content('cdc.newsroom.json', 'http://www2c.cdc.gov/podcasts/feed.asp?feedid=183&maxnumber=10&pagesize=10&format=json&callback=?');
	//http://www2c.cdc.gov/podcasts/feed.asp?feedid=183&maxnumber=300&pagesize=300&daterange=2&startdate=1/1/15&enddate=12/31/15&format=json&callback=?
?>