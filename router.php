<?php

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$fullPath = __DIR__ . $path;

if ($path !== '/' && is_file($fullPath)) {
    return false;
}

$routes = [
    '/' => '/index.php',
    '/services' => '/services.php',
    '/clients' => '/clients.php',
    '/service-areas' => '/service-areas.php',
    '/why-manhattan-appliance' => '/why-manhattan-appliance.php',
    '/resources' => '/resources.php',
    '/contact' => '/contact.php',
    '/brands-we-service' => '/brands-we-service.php',
    '/faqs' => '/faqs.php',
];

if (isset($routes[$path])) {
    require __DIR__ . $routes[$path];
    return true;
}

http_response_code(404);
require __DIR__ . '/index.php';
