<?php
require __DIR__ . '/includes/site.php';
require __DIR__ . '/includes/landing-pages.php';

$landing = $landingPages['miele-repair-nyc'];
$page = [
    'slug' => 'services',
    'title' => $landing['title'],
    'description' => $landing['description'],
];

require __DIR__ . '/includes/landing-page-template.php';
