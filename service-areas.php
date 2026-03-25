<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'service-areas',
    'title' => 'Service Areas',
    'description' => 'Appliance repair coverage across Manhattan, NY and select counties in New Jersey.',
];

$manhattan = ['Upper East Side', 'Upper West Side', 'Midtown', 'Chelsea', 'Greenwich Village', 'SoHo', 'Tribeca', 'Financial District', 'Lower East Side', 'East Village', 'Harlem', 'Washington Heights', 'Inwood', 'Murray Hill', 'Gramercy Park', "Hell's Kitchen", 'Battery Park City'];
$nj = ['Bergen County', 'Hudson County', 'Essex County', 'Passaic County (select areas)', 'Union County (select areas)'];

render_header($page, $site, $navItems);
?>
<section class="page-hero">
    <div class="wrap narrow">
        <p class="eyebrow">Service Areas</p>
        <h1>Premium appliance repair across Manhattan and nearby New Jersey counties.</h1>
        <p class="lede">Use the ZIP code list or contact us directly to confirm coverage for your address.</p>
        <div class="button-row">
            <a class="button button-primary" href="<?= htmlspecialchars($site['zip_url']) ?>" target="_blank" rel="noreferrer">Open ZIP Code List</a>
            <a class="button button-secondary" href="<?= htmlspecialchars($site['phone_href']) ?>">Call Our Office</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="wrap two-column">
        <article class="panel">
            <h2>Manhattan, New York</h2>
            <p>We provide comprehensive appliance repair services throughout Manhattan for residential and commercial clients.</p>
            <ul class="plain-list">
                <?php foreach ($manhattan as $item): ?>
                    <li><?= htmlspecialchars($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </article>
        <article class="panel">
            <h2>New Jersey</h2>
            <p>We extend service to select counties in New Jersey with the same level of expertise and professionalism.</p>
            <ul class="plain-list">
                <?php foreach ($nj as $item): ?>
                    <li><?= htmlspecialchars($item) ?></li>
                <?php endforeach; ?>
            </ul>
            <p class="support-note">Availability in New Jersey varies by location. Please confirm service before booking.</p>
        </article>
    </div>
</section>

<section class="section section-alt">
    <div class="wrap promise-grid">
        <article><h2>Prompt Response Times</h2><p>Our coverage area is built around practical scheduling and quick response.</p></article>
        <article><h2>Local Expertise</h2><p>We understand the appliance demands of apartments, homes, and commercial kitchens in this region.</p></article>
        <article><h2>Scheduled Appointments</h2><p>We use clear appointment windows and punctual arrivals to reduce disruption.</p></article>
        <article><h2>Consistent Service Quality</h2><p>Every customer receives the same professional standards, wherever we serve.</p></article>
    </div>
</section>

<?php render_cta($site, 'Not sure if you are inside the service area?', 'Call or email us with your ZIP code and we will confirm availability.'); ?>
<?php render_footer($site); ?>
