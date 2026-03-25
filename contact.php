<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'contact',
    'title' => 'Contact Manhattan Appliance',
    'description' => 'Schedule appliance repair service in Manhattan, NY and select New Jersey counties.',
];

render_header($page, $site, $navItems);
?>
<section class="page-hero">
    <div class="wrap narrow">
        <p class="eyebrow">Contact</p>
        <h1>Schedule your appliance service.</h1>
        <p class="lede">Contact us today to schedule professional appliance repair service and get your equipment back to peak performance.</p>
    </div>
</section>

<section class="section">
    <div class="wrap two-column align-start">
        <article class="panel">
            <h2>Get In Touch</h2>
            <p><strong>Phone:</strong> <a href="<?= htmlspecialchars($site['phone_href']) ?>"><?= htmlspecialchars($site['phone']) ?></a></p>
            <p><strong>Email:</strong> <a href="<?= htmlspecialchars($site['email_href']) ?>"><?= htmlspecialchars($site['email']) ?></a></p>
            <p><strong>Service Areas:</strong> Manhattan, NY and select counties in New Jersey</p>
            <p><strong>Business Hours:</strong> Mon - Fri, 9:00 - 17:00</p>
            <div class="button-row">
                <a class="button button-primary" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer">Book Online</a>
                <a class="button button-secondary" href="<?= htmlspecialchars($site['phone_href']) ?>">Call Now</a>
            </div>
        </article>
        <article class="panel">
            <h2>Why Choose Us?</h2>
            <ul class="plain-list">
                <li>Licensed and insured</li>
                <li>90-day warranty</li>
                <li>Upfront pricing</li>
                <li>BlueStar and GE certified</li>
            </ul>
        </article>
    </div>
</section>

<?php render_cta($site, 'Need help with a failing appliance?', 'Tell us what appliance is involved and we will help you book the right service visit.'); ?>
<?php render_footer($site); ?>
