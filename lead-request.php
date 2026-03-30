<?php

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

$name = trim((string) ($_POST['name'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$zip = trim((string) ($_POST['zip'] ?? ''));
$issue = trim((string) ($_POST['issue'] ?? ''));
$service = trim((string) ($_POST['service'] ?? 'Service Request'));
$pageSlug = trim((string) ($_POST['page_slug'] ?? ''));
$returnPath = trim((string) ($_POST['return_path'] ?? '/'));

if ($returnPath === '' || $returnPath[0] !== '/') {
    $returnPath = '/';
}

if ($name === '' || $phone === '') {
    header('Location: ' . $returnPath . '?lead=error');
    exit;
}

$logsDir = __DIR__ . '/logs';
if (!is_dir($logsDir)) {
    mkdir($logsDir, 0775, true);
}

$csvPath = $logsDir . '/lead-requests.csv';
$isNewFile = !file_exists($csvPath);
$handle = fopen($csvPath, 'ab');

if ($handle !== false) {
    if ($isNewFile) {
        fputcsv($handle, ['submitted_at', 'service', 'page_slug', 'name', 'phone', 'zip', 'issue', 'ip', 'user_agent']);
    }

    fputcsv($handle, [
        date('c'),
        $service,
        $pageSlug,
        $name,
        $phone,
        $zip,
        $issue,
        $_SERVER['REMOTE_ADDR'] ?? '',
        $_SERVER['HTTP_USER_AGENT'] ?? '',
    ]);
    fclose($handle);
}

header('Location: ' . $returnPath . '?lead=success');
exit;
