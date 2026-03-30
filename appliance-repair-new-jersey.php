<?php
require __DIR__ . '/includes/site.php';
require __DIR__ . '/includes/landing-pages.php';

$landing = $landingPages['appliance-repair-new-jersey'];
$page = [
    'slug' => 'service-areas',
    'title' => $landing['title'],
    'description' => $landing['description'],
];

require __DIR__ . '/includes/landing-page-template.php';
