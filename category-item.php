<?php

function getPageIdsByTemplate($template_name) {
	$args = [
    	'post_type' => 'page',
    	'fields' => 'ids',
    	'nopaging' => true,
    	'meta_key' => '_wp_page_template',
    	'meta_value' => $template_name
	];
	return get_posts($args);
}

function getAllPostsByTemplate($template_name) {
	$ids = getPageIdsByTemplate($template_name);
	$posts = [];
	$post = [];
	$icon_array = null;
	foreach ($ids as $id) {
		$icon_array = get_field('icon', $id);
		if (array_key_exists('url', $icon_array)) {
			$post['icon'] = $icon_array['url'];
		}
		$post['title'] = get_field('page_title', $id);
		$post['category'] = get_field('category', $id);
		$post['sub_title'] = get_field('page_sub-title', $id);
		$post['rating'] = get_field('rating', $id);
		$posts[] = $post;
	}
	return $posts;
}

function getPostsByCategory($category_name, $posts) {
	$name = null;
	$result = [];
	$category_name = strtolower($category_name);
	$category_name = str_replace(" / ", " ", $category_name);
	$category_name = str_replace(" ", "-", $category_name);
	foreach ($posts as $post) {
		if (array_key_exists('category', $post) && strtolower($post['category']) == $category_name) {
			$result[] = $post;
		}
	}
	return $result;
}

?>
