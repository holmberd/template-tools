<?php

/**
 * Generates App JSON-Schema
 * @param string $name
 * @param string $category
 * @param string $version
 * @param string $image
 * @param string $thumbnail_url
 * @param string $description
 * @param string $keywords
 * @param string $date_published - e.g. 2018-02-21
 * @param string $author_name
 * @param string $author_url
 * @param string|int $rating_value
 * @param string|int $rating_count
 * @return JSON
 */
function buildAppSchema($name, $image, $thumbnail_url, $category, $version, $description, $keywords, $date_published, $author_name, $author_url, $rating_value='4', $rating_count=false) {
    $rating_value = strval($rating_value);
    $rating_count = strval($rating_count) ?: strval(rand(10,11966));
    $array = array(
        "@context" => "http://schema.org",
        "@type" => "SoftwareApplication",
        'operatingSystem' => 'Windows, Windows 7, Windows 10, OSX',
        "name" => $name,
        "image" => $image,
	"thumbnailUrl" => $thumbnail_url,
        "softwareVersion" => $version,
        "applicationCategory" => $category,
        "description" => $description,
	"keywords" => $keywords,
	"datePublished" => $date_published,
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

/** Categories 
MultimediaApplication
EntertainmentApplication
BusinessApplication
GameApplication
DeveloperApplication
DriverApplication
EducationalApplication
HealthApplication
TravelApplication
FinanceApplication
SecurityApplication
BrowserApplication
CommunicationApplication
DesktopEnhancementApplication
DesignApplication
HomeApplication
SocialNetworkingApplication
UtilitiesApplication
ReferenceApplication
SportsApplication
ShoppingApplication
MedicalApplication
OtherApplication
*/
