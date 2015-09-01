<?
	header('Content-Type: text/html');
	include_once('cache.php');

	echo get_content('cdc.gov.html', 'http://www.cdc.gov');
?>