<?php

/**
 * Generates Article JSON-Schema
 *
 * @param array $data
 * @return JSON
 */
function buildArticleSchema($data) {
  $array = array(
    "@context" => "http://schema.org",
    "@type" => "Article",
    "name" => $data['name'],
    "headline" => $data['name'],
    "alternativeHeadline" => $data['name'],
    "description" => $data['description'],
    "keywords" => $data['keywords'],
    "url" => $data['url'],
    "dateModified" => $data['date_modified'],
    "inLanguage" => 'en',
    "accessMode" => 'textual',
    'accessModeSufficient' => 'textual',
    "isAccessibleForFree" => 'http://schema.org/True',
    "license" => 'https://creativecommons.org/licenses/by-nc-sa/4.0/',
    "datePublished" => $data['date_published'],
    "mainEntityOfPage" => array(
      "@type" => 'WebPage',
      "@id" => $data['url'],
      ),
    "author" => array(
      "@type" => 'Person',
      "@id" => $data['author_url'],
      "name" => $data['author_name']
      ),
    "image" => $data['article_image'],
    "sourceOrganization" => array(
      "@type" => 'Organization',
      "name" => $data['organization_name'],
      "url" => $data['organization_url']
      ),
    "publisher" => array(
      "@type" => 'Organization',
      "name" => $data['organization_name'],
      "url" => $data['organization_url'],
      "logo" => array(
        "@type" => 'imageObject',
        "url" => $data['organization_logo']
        )
    )
  );
  return json_encode($array, JSON_UNESCAPED_SLASHES);
}

<?php
    $article_data = array(
      'name' => get_the_title(),
      'description' => get_field('description'),
      'keywords' => get_field('keywords'),
      'url' => 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
      'date_modified' => get_the_modified_date('Y-m-d'),
      'date_published' => get_the_date('Y-m-d'),
      'author_url' => get_author_posts_url($post->post_author),
      'author_name' => get_the_author(),
      'article_image' => get_the_post_thumbnail_url(),
      'organization_name' => 'organization-name',
      'organization_url' => 'https://' . $_SERVER['HTTP_HOST'],
      'organization_logo' => 'https://homepage/organization-logo.png'
    );
?>

<!-- JSON Schema -->
<script type="application/ld+json">
<?php
    echo buildArticleSchema($article_data);
    ?>
</script>

