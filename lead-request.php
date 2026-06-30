<?php

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Location: /contact?lead=error&reason=bad_method');
    exit;
}

$name = trim((string) ($_POST['name'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$zip = trim((string) ($_POST['zip'] ?? ''));
$issue = trim((string) ($_POST['issue'] ?? ''));
$service = trim((string) ($_POST['service'] ?? 'Service Request'));
$pageSlug = trim((string) ($_POST['page_slug'] ?? ''));
$returnPath = trim((string) ($_POST['return_path'] ?? '/'));

if ($returnPath === '' || $returnPath[0] !== '/') {
    $returnPath = '/contact';
}

function redirect_with_status(string $path, string $lead, ?string $reason = null): void
{
    $separator = strpos($path, '?') === false ? '?' : '&';
    $query = ['lead' => $lead];

    if ($reason !== null && $reason !== '') {
        $query['reason'] = $reason;
    }

    header('Location: ' . $path . $separator . http_build_query($query));
    exit;
}

if ($name === '' || $phone === '') {
    redirect_with_status($returnPath, 'error', 'missing_contact');
}

if ($zip !== '' && !preg_match('/^\d{5}$/', $zip)) {
    redirect_with_status($returnPath, 'error', 'invalid_zip');
}

$logsDir = __DIR__ . '/logs';
if (!is_dir($logsDir)) {
    if (!mkdir($logsDir, 0775, true) && !is_dir($logsDir)) {
        redirect_with_status($returnPath, 'error', 'storage_failed');
    }
}

$csvPath = $logsDir . '/lead-requests.csv';
$isNewFile = !file_exists($csvPath);
$handle = fopen($csvPath, 'ab');

if ($handle === false) {
    redirect_with_status($returnPath, 'error', 'storage_failed');
}

if ($isNewFile) {
    if (fputcsv($handle, ['submitted_at', 'service', 'page_slug', 'name', 'phone', 'zip', 'issue', 'ip', 'user_agent']) === false) {
        fclose($handle);
        redirect_with_status($returnPath, 'error', 'storage_failed');
    }
}

if (fputcsv($handle, [
    date('c'),
    $service,
    $pageSlug,
    $name,
    $phone,
    $zip,
    $issue,
    $_SERVER['REMOTE_ADDR'] ?? '',
    $_SERVER['HTTP_USER_AGENT'] ?? '',
]) === false) {
    fclose($handle);
    redirect_with_status($returnPath, 'error', 'storage_failed');
}

fclose($handle);

redirect_with_status($returnPath, 'success');
exit;
