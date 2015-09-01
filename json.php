<?
	header('Content-Type: application/json');

	ini_set('default_socket_timeout', 5);

	$src = 'http://www2c.cdc.gov/podcasts/feed.asp?feedid=183&maxnumber=300&pagesize=300&daterange=2&startdate=1/1/15&enddate=12/31/15&format=json&callback=?';
	$cache_file = 'cdc.newsroom.js';

	// $json = file_get_contents($src);

	// print_r($json);


	if(file_exists($cache_file)) {
		if(time() - filemtime($cache_file) > 86400) {
			echo "old, refresh";
			$cache = file_get_contents($src);
			file_put_contents($cache_file, $cache);
		} 
		else {
     		// cache is still fresh
     		$cache = file_get_contents($src);
		}
	} else {
		// no cache, create one
		echo "creating cache";
		$cache = file_get_contents($src);
		file_put_contents($cache_file, $cache);
	}

	print_r($cache);

?>