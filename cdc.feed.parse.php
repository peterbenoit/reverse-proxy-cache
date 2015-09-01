<?
	header('Content-Type: application/json');

	$url = 'cdc.summary.feed.json';
	$content = file_get_contents($url);
	$json = json_decode($content, true);
	$response_json = array();

	foreach($json['results'][0]['children'] as $item) {
		$tmp = array(
			'id' => $item['id'],
			'title' => $item['title'], 
			'description' => $item['description'], 
			'thumbnailUrl' => $item['thumbnailUrl'], 
			'dateCreated' => $item['dateCreated'],
			'dateModified' => $item['dateModified'],
			'sourceUrl' => $item['sourceUrl'],
			'targetUrl' => $item['targetUrl'],
			'tags' => $item['tags'],
			'omnitureChannel' => $item['omnitureChannel'],
			'owningOrgName' => $item['owningOrgName'],
			'maintainingOrgName' => $item['maintainingOrgName'],

		);
		array_push($response_json, $tmp);
	}

	print_r(json_encode($response_json, JSON_FORCE_OBJECT));

?>