<!doctype html>

<html lang="en">
    <head>

<?php
$db = db_connect();
$uri = uri_string();
if ($uri === '') {
    $uri = 'home';
}

// 1. Try to find a matching route in seo_settings
$seo = $db->table('seo_settings')->where('page_route', $uri)->get()->getRowArray();

// 2. If not found in seo_settings, check if it matches a product model slug
if (!$seo) {
    $allModels = $db->table('models')->get()->getResultArray();
    $matchedProduct = null;
    foreach ($allModels as $m) {
        $slug = str_replace(' ', '-', strtolower(trim($m['name'])));
        if ($slug === strtolower($uri)) {
            $matchedProduct = $m;
            break;
        }
    }
    
    if ($matchedProduct) {
        $seo = [
            'meta_title'       => !empty($matchedProduct['meta_title']) ? $matchedProduct['meta_title'] : $matchedProduct['name'] . ' | Tyche Info Solutions',
            'meta_description' => !empty($matchedProduct['meta_desc']) ? $matchedProduct['meta_desc'] : substr(strip_tags($matchedProduct['s_desc'] ?? ''), 0, 160),
            'meta_keywords'    => $matchedProduct['name'] . ', rent ' . $matchedProduct['name'] . ', refurbished ' . $matchedProduct['name'] . ' kochi',
            'schema_code'      => '',
            'header_code'      => '',
            'body_code'        => '',
            'footer_code'      => '',
        ];
        
        // Dynamic Product JSON-LD schema
        $productUrl = base_url($uri);
        $imageUrl = !empty($matchedProduct['thumbnail']) ? base_url('writable/uploads/thumbnails/' . $matchedProduct['thumbnail']) : '';
        $desc = esc(strip_tags($matchedProduct['s_desc'] ?? ''));
        $seo['schema_code'] = '
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "' . esc($matchedProduct['name']) . '",
  "image": "' . $imageUrl . '",
  "description": "' . $desc . '",
  "offers": {
    "@type": "Offer",
    "url": "' . $productUrl . '",
    "priceCurrency": "INR",
    "availability": "https://schema.org/InStock"
  }
}
</script>';
    }
}

// 3. Fallback to Home settings if still not found
if (!$seo) {
    $seo = $db->table('seo_settings')->where('page_route', 'home')->get()->getRowArray();
}

// 4. Resolve settings with global defaults for scripts
$globalScripts = $db->table('seo_settings')->where('page_route', 'home')->get()->getRowArray();
$headerCode = !empty($seo['header_code']) ? $seo['header_code'] : ($globalScripts['header_code'] ?? '');
$bodyCode = !empty($seo['body_code']) ? $seo['body_code'] : ($globalScripts['body_code'] ?? '');
$schemaCode = $seo['schema_code'] ?? '';
$metaTitle = $seo['meta_title'] ?? ($title ?? 'Tyche Info Solutions');
$metaDesc = $seo['meta_description'] ?? '';
$metaKeywords = $seo['meta_keywords'] ?? '';
$canonicalUrl = base_url(uri_string());
?>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= esc($metaTitle) ?></title>
        <meta name="description" content="<?= esc($metaDesc) ?>">
        <meta name="keywords" content="<?= esc($metaKeywords) ?>">
        <meta name="author" content="Tyche Info Solutions">
        <meta name="robots" content="ALL">
        <meta name="geo.country" content="IN">
        <meta name="DC.title" content="<?= esc($metaTitle) ?>">
        <meta name="geo.region" content="IN-KL">
        <meta name="geo.placename" content="Kochi">
        <meta name="geo.position" content=" ">
        <meta property="og:title" content="<?= esc($metaTitle) ?>">
        <meta property="og:site_name" content="Tyche Info Solutions">
        <meta property="og:url" content="<?= esc($canonicalUrl) ?>">
        <meta property="og:description" content="<?= esc($metaDesc) ?>">
        <meta property="og:type" content="website">
        <meta property="og:image" content="<?= base_url('assets/img/logo.png') ?>">
        <link rel="canonical" href="<?= esc($canonicalUrl) ?>"> 
        
        <!-- Inject Schema Markups & Head Scripts -->
        <?= $schemaCode ?>
        <?= $headerCode ?>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png') ?>">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/fontawesome-all.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/font-electro.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/vendor/animate.css/animate.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/vendor/hs-megamenu/src/hs.megamenu.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/vendor/fancybox/jquery.fancybox.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/vendor/slick-carousel/slick/slick.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') ?>">

        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="<?= base_url('assets/css/codec-pro.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/theme.css') ?>">
    </head>

    <body>
        <!-- Inject Custom Body Scripts -->
        <?= $bodyCode ?>
        