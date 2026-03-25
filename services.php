<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'services',
    'title' => 'Appliance Repair Services',
    'description' => 'Residential and commercial appliance repair, diagnostics, maintenance, and installation services.',
];

$services = [
    ['title' => 'Refrigeration & Cooling', 'image' => 'assets/images/service-refrigeration.jpg', 'items' => ['Refrigerator repairs', 'Freezer repairs', 'Ice machine repairs', 'Wine cooler repairs', 'Beverage chiller repairs']],
    ['title' => 'Cooking Appliances', 'image' => 'assets/images/service-cooking.jpg', 'items' => ['Stove repairs', 'Cooktop repairs', 'Range repairs', 'Oven repairs', 'Grill repairs']],
    ['title' => 'Kitchen Ventilation & Dish Care', 'image' => 'assets/images/service-dishcare.jpg', 'items' => ['Dishwasher repairs', 'Vent hood repairs']],
    ['title' => 'Laundry Appliances', 'image' => 'assets/images/service-laundry.jpg', 'items' => ['Washing machine repairs', 'Dryer repairs', 'Washer/dryer combo repairs']],
    ['title' => 'Commercial & Specialty', 'image' => 'assets/images/service-commercial.jpg', 'items' => ['Deep fryer repairs', 'Salamander broiler repairs']],
];

render_header($page, $site, $navItems);
?>
<section class="page-hero">
    <div class="wrap narrow">
        <p class="eyebrow">Services</p>
        <h1>Residential and commercial appliance repair with full-service support.</h1>
        <p class="lede">We provide diagnostics, maintenance, repairs, and installation services across Manhattan and select New Jersey counties.</p>
    </div>
</section>

<section class="section">
    <div class="wrap prose">
        <h2>Our Vast Range of Services</h2>
        <p>Our residential appliance services include dishwasher, freezer, ice machine, microwave, oven, and refrigerator repairs. Our commercial work includes bar coolers, deep fryers, freezers, mixers, steam tables, and commercial refrigerators.</p>
    </div>
</section>

<section class="section section-alt">
    <div class="wrap">
        <div class="card-grid services-grid">
            <?php foreach ($services as $service): ?>
                <article class="service-card">
                    <img src="<?= asset_url($service['image']) ?>" alt="<?= htmlspecialchars($service['title']) ?>">
                    <div class="service-card-body">
                        <h3><?= htmlspecialchars($service['title']) ?></h3>
                        <ul>
                            <?php foreach ($service['items'] as $item): ?>
                                <li><?= htmlspecialchars($item) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="wrap card-grid detail-grid">
        <article class="detail-card">
            <img src="<?= asset_url('assets/images/service-diagnostics.jpg') ?>" alt="Diagnostics and estimates">
            <h2>Diagnostics & Estimates</h2>
            <p>We provide mobile and in-person diagnostics tailored to your appliance. We can offer a rough estimate from the symptoms you describe, but accurate pricing requires an in-person assessment.</p>
        </article>
        <article class="detail-card">
            <img src="<?= asset_url('assets/images/service-maintenance.jpg') ?>" alt="Preventative maintenance">
            <h2>Preventative Maintenance</h2>
            <p>Maintenance services include ice machine cleaning, condenser cleaning, filter replacement, deep cleaning for household appliances, and door seal inspection or replacement.</p>
        </article>
        <article class="detail-card">
            <img src="<?= asset_url('assets/images/service-installation.png') ?>" alt="Installation services">
            <h2>Installation Services</h2>
            <p>We install appliances and parts purchased by customers or supplied through warranty companies, following manufacturer standards in the original installation location.</p>
        </article>
        <article class="detail-card">
            <img src="<?= asset_url('assets/images/service-laundry-detail.jpg') ?>" alt="Laundry appliance repair">
            <h2>Laundry Appliance Repair</h2>
            <p>We service washers, dryers, washer/dryer combos, and stand-alone laundry equipment in residential and commercial settings.</p>
        </article>
    </div>
</section>

<section class="section section-accent">
    <div class="wrap prose">
        <h2>Commercial Appliance Repair Services</h2>
        <p>We service dish machines, insinkerators, fryers, grills, ranges, and commercial refrigerators. We also provide recurring service and monthly cleaning for ABS pharmacy refrigerators and other temperature-sensitive commercial units.</p>
        <p>All services are available across Manhattan, NY and select counties in New Jersey.</p>
    </div>
</section>

<?php render_cta($site, 'Need a diagnosis or repair?', 'Tell us what appliance is acting up and we will help you schedule the right service.'); ?>
<?php render_footer($site); ?>
