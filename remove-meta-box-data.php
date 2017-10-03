<?php

require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

echo 'Remove pages prosper-links meta data.';
echo 'Executing...';
echo "<br />";

function getPageIds() {
        $args = [
        'post_type' => 'page',
        'fields' => 'ids',
        'nopaging' => true
        ];
        return get_posts($args);
}
$pageIds = getPageIds();
foreach( $pageIds as $postId) {
	echo 'Removing id' . $postId;
	echo "<br />";
	delete_post_meta($postId, 'lpa_prosper_tracking_ids');
}
echo "<br />";
echo 'Operation complete.'

?>
