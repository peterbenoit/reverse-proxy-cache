<?
	header('Content-Type: application/json');
	include_once('cache.php');

	echo get_content('cdc.storefront.media.json', 'https://tools.cdc.gov/api/v2/resources/media?fields=id,name,mediaType,thumbnailUrl,alternateImages&max=12&pagenum=1&sort=-datemodified&callback=?');
?>