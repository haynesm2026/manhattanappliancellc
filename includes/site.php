<?php

$site = [
    'name' => 'Manhattan Appliance LLC',
    'phone' => '(917) 522-0890',
    'phone_href' => 'tel:+19175220890',
    'email' => 'office@manhattanappliancellc.com',
    'email_href' => 'mailto:office@manhattanappliancellc.com',
    'book_url' => 'https://book.housecallpro.com/book/Manhattan-Appliance-LLC/fd383c8aba9646be97e6e70ad9f97afa?v2=true',
    'zip_url' => 'https://cdn.website-editor.net/s/009be738e154491f973774d06a36aa24/uploads/files/service-area.pdf',
    'socials' => [
        'Instagram' => 'https://instagram.com/manhattanappliancellc',
        'Facebook' => 'https://facebook.com/Manhattan-Appliance-LLC-100066495584765/',
        'LinkedIn' => 'https://linkedin.com/manhattan-appliance-llc',
    ],
];

$navItems = [
    'home' => ['label' => 'Home', 'href' => '/'],
    'services' => ['label' => 'Services', 'href' => '/services'],
    'clients' => ['label' => 'Clients', 'href' => '/clients'],
    'service-areas' => ['label' => 'Service Areas', 'href' => '/service-areas'],
    'why-manhattan-appliance' => ['label' => 'Why Manhattan Appliance', 'href' => '/why-manhattan-appliance'],
    'resources' => ['label' => 'Resources', 'href' => '/resources'],
    'contact' => ['label' => 'Contact', 'href' => '/contact'],
];

function page_url(string $path): string
{
    return $path === 'home' ? '/' : '/' . $path;
}

function asset_url(string $path): string
{
    return '/' . ltrim($path, '/');
}

function render_header(array $page, array $site, array $navItems): void
{
    $title = htmlspecialchars($page['title'] . ' | ' . $site['name']);
    $description = htmlspecialchars($page['description']);
    $currentPage = $page['slug'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
    <link rel="icon" href="<?= asset_url('assets/images/logo.png') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset_url('assets/css/styles.css') ?>">
</head>
<body>
<div class="site-shell">
    <header class="topbar">
        <div class="wrap topbar-inner">
            <a class="brand" href="<?= page_url('home') ?>">
                <img src="<?= asset_url('assets/images/logo.png') ?>" alt="<?= htmlspecialchars($site['name']) ?> logo">
                <span><?= htmlspecialchars($site['name']) ?></span>
            </a>
            <div class="topbar-contact">
                <a href="<?= htmlspecialchars($site['phone_href']) ?>"><?= htmlspecialchars($site['phone']) ?></a>
                <a href="<?= htmlspecialchars($site['email_href']) ?>"><?= htmlspecialchars($site['email']) ?></a>
            </div>
        </div>
    </header>
    <div class="nav-shell">
        <div class="wrap nav-inner">
            <nav aria-label="Primary">
                <ul class="nav-list">
                    <?php foreach ($navItems as $slug => $item): ?>
                        <li>
                            <a href="<?= htmlspecialchars($item['href']) ?>"<?= $slug === $currentPage ? ' class="is-active"' : '' ?>>
                                <?= htmlspecialchars($item['label']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <a class="button button-primary" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer">Book Online</a>
        </div>
    </div>
    <main>
<?php
}

function render_footer(array $site): void
{
    ?>
    </main>
    <footer class="site-footer">
        <div class="footer-banner">
            <div class="wrap">
                <h2>Reliable Appliance Repair Starts Here</h2>
            </div>
        </div>
        <div class="footer-main">
            <div class="wrap footer-grid">
                <div class="footer-brand">
                    <img src="<?= asset_url('assets/images/logo.png') ?>" alt="<?= htmlspecialchars($site['name']) ?> logo">
                </div>
                <div class="footer-column footer-contact">
                    <h3>Contact</h3>
                    <p><a href="<?= htmlspecialchars($site['phone_href']) ?>"><?= htmlspecialchars($site['phone']) ?></a></p>
                    <p><a href="<?= htmlspecialchars($site['email_href']) ?>"><?= htmlspecialchars($site['email']) ?></a></p>
                </div>
                <div class="footer-column footer-hours">
                    <h3>Opening Hours</h3>
                    <div class="hours-row"><span>Mon - Fri</span><span>9:00 - 17:00</span></div>
                    <div class="hours-row"><span>Sat - Sun</span><span>Closed</span></div>
                </div>
                <div class="footer-column footer-social">
                    <ul class="social-list footer-social-list">
                        <?php foreach ($site['socials'] as $label => $href): ?>
                            <li><a href="<?= htmlspecialchars($href) ?>" target="_blank" rel="noreferrer" aria-label="<?= htmlspecialchars($label) ?>"><?= htmlspecialchars(substr($label, 0, 2)) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="wrap">
                <p>&copy; <?= date('Y') ?> All Rights Reserved | <?= htmlspecialchars($site['name']) ?></p>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
<?php
}

function render_cta(array $site, string $title, string $copy): void
{
    ?>
    <section class="section">
        <div class="wrap">
            <div class="cta-panel">
                <div>
                    <p class="eyebrow">Schedule Service</p>
                    <h2><?= htmlspecialchars($title) ?></h2>
                    <p><?= htmlspecialchars($copy) ?></p>
                </div>
                <div class="cta-actions">
                    <a class="button button-primary" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer">Book Online</a>
                    <a class="button button-secondary" href="<?= htmlspecialchars($site['phone_href']) ?>">Call <?= htmlspecialchars($site['phone']) ?></a>
                </div>
            </div>
        </div>
    </section>
<?php
}
