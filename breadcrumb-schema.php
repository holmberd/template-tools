<?php

/**
 * Generates Breadcrumb JSON-Schema
 * @param $home - home url
 * @param $category_url
 * @param $category_name
 * @param $item_url
 * @param $item_name
 * @return JSON
 */
function buildBreadcrumbSchema($home, $category_url, $category_name, $item_url, $item_name) {

    $array = array(
        "@context" => "http://schema.org",
        "@type" => "BreadcrumbList",
        "itemListElement" => array(
            array(
                "@type" => "ListItem",
                "position" => 1,
                "item" => array(
                    "@id" => $home,
                    "name" => "Home",
                    )
            ),
            array(
                "@type" => "ListItem",
                "position" => 2,
                "item" => array(
                    "@id" => $category_url,
                    "name" => $category_name,
                )
            ),
            array(
                "@type" => "ListItem",
                "position" => 3,
                "item" => array(
                    "@id" => $item_url,
                    "name" => $item_name,
                )
            )
        )
    );
    return json_encode($array, JSON_UNESCAPED_SLASHES);
}

?>
