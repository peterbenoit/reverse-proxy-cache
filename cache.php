<?
	/* Based off: http://davidwalsh.name/php-cache-function */

	// gets the content of a local file if it exists, otherwise update and cache
	function get_content($file, $url, $hours = 24) {
		$current_time = time(); 
		$expire_time = $hours * 60 * 60;	// 24 hours ago

		//if the cache file exists
		if(file_exists($file)) {
			$file_time = filemtime($file);

		 	if ($current_time - $expire_time < $file_time) {
				return file_get_contents($file);
			}
			else {
				// the file exists, but the time has expired
				get_content_from_url($file, $url);
			}
		}
		else {
			// file doesn't exist
			get_content_from_url($file, $url);
		}
	}

	// wrapper for get_url which is called in two conditions
	function get_content_from_url($file, $url, $fn = '', $fn_args = '') {
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		$content = get_url($url);
		if($fn) { $content = $fn($content, $fn_args); }						// run the function if one is passed
		if($ext == 'html') { $content.= '<!-- cached: '.time().' -->'; }	// if extention is html, append a cached comment at the bottom
		file_put_contents($file, $content);

		return $content;
	}

	// gets content from a URL via curl
	function get_url($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$content = curl_exec($ch);
		curl_close($ch);

		return $content;
	}
?>