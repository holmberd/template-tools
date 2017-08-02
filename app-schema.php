<?php
/**
 * Generates App JSON-Schema
 * @param string $name
 * @param string $category
 * @param string $version
 * @param string $image
 * @param string $description
 * @param string $author_name
 * @param string $author_url
 * @param string|int $rating_value
 * @param string|int $rating_count
 * @return JSON
 */
function buildAppSchema($name, $image, $category, $version, $description, $author_name, $author_url, $rating_value='4', $rating_count=false) {
    $rating_value = strval($rating_value);
    $rating_count = strval($rating_count) ?: strval(rand(10,11966));
    $array = array(
        "@context" => "http://schema.org",
        "@type" => "SoftwareApplication",
        'operatingSystem' => 'Windows, Windows 7, Windows 10, OSX',
        "name" => $name,
        "image" => $image,
        "softwareVersion" => $version,
        "applicationCategory" => $category,
        "description" => $description,
        "aggregateRating" => array(
            "@type" => "AggregateRating",
			"worstRating" => '0',
			"bestRating" => '5',
            "ratingValue" => $rating_value,
            "ratingCount" => $rating_count
            ),
        "author" => array(
            "@type" => "Organization",
            "name" => $author_name,
            "url" => $author_url
            ),
        "offers" => array(
            "@type" => "Offer",
            "price" => "0",
            "priceCurrency" => "USD"
            )
        );
    return json_encode($array, JSON_UNESCAPED_SLASHES);
}

?>
