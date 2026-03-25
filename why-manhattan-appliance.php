<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'why-manhattan-appliance',
    'title' => 'Why Choose Manhattan Appliance',
    'description' => 'Integrity, workmanship, and certified appliance service from Manhattan Appliance LLC.',
];

$values = [
    'Qualified and experienced technicians',
    'Professional, clean workmanship',
    'Uniformed staff',
    'Scheduled appointments',
    'Upfront pricing',
    'Charged by the job',
    '90-day warranty on parts and labor',
    'Contactless authorization and payment',
];

render_header($page, $site, $navItems);
?>
<section class="page-hero">
    <div class="wrap narrow">
        <p class="eyebrow">Why Manhattan Appliance</p>
        <h1>Service built on integrity, accountability, and technical depth.</h1>
        <p class="lede">We work with the urgency, care, and professionalism customers expect when a key appliance fails.</p>
    </div>
</section>

<section class="section">
    <div class="wrap two-column align-start">
        <div>
            <img class="feature-image" src="<?= asset_url('assets/images/why-manhattan.jpg') ?>" alt="Appliance technician at work">
        </div>
        <div>
            <h2>What Sets Us Apart</h2>
            <ul class="plain-list">
                <?php foreach ($values as $value): ?>
                    <li><?= htmlspecialchars($value) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="wrap card-grid three-up">
        <article class="icon-card">
            <h2>Family-Owned & Operated</h2>
            <p>We treat every customer like family and every property with care.</p>
        </article>
        <article class="icon-card">
            <h2>Licensed & Fully Insured</h2>
            <p>Full licensing and insurance coverage protects you and your property throughout the job.</p>
        </article>
        <article class="icon-card">
            <h2>Factory Certifications</h2>
            <p>BlueStar and GE certifications reflect specialized training and manufacturer-standard work.</p>
        </article>
    </div>
</section>

<section class="section">
    <div class="wrap prose">
        <h2>Our Promise to You</h2>
        <ul class="plain-list">
            <li>Arrive on time and ready to work</li>
            <li>Diagnose issues honestly and accurately</li>
            <li>Provide transparent, upfront pricing</li>
            <li>Complete repairs to high standards</li>
            <li>Respect your home or business environment</li>
            <li>Stand behind our work with a comprehensive warranty</li>
        </ul>
    </div>
</section>

<?php render_cta($site, 'Experience the Manhattan Appliance difference.', 'Book service with a team that values trust as much as technical skill.'); ?>
<?php render_footer($site); ?>
