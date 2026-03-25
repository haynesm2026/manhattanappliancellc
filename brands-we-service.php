<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'resources',
    'title' => 'Brands We Service',
    'description' => 'Major residential and commercial appliance brands serviced by Manhattan Appliance LLC.',
];

$brands = ['Amana', 'Asko', 'Avanti', 'Bakers Pride', 'Bertazzoni', 'Blomberg', 'BlueStar', 'Bosch', 'DCS', 'Dynasty', 'Electrolux', 'Fagor', 'Fisher & Paykel', 'Follett', 'Frigidaire', 'GE', 'GE Hotpoint', 'GE Monogram', 'GE Profile', 'Haier', 'Hoshizaki', 'Imperial', 'Kenmore', 'KitchenAid', 'LG', 'Liebherr', 'Magic Chef', 'Manitowoc', 'Marvel', 'Maytag', 'Miele', 'Northland', 'Samsung', 'Smeg', 'Subzero', 'Thermador', 'Traulsen', 'Viking', 'Whirlpool', 'Zephyr'];

render_header($page, $site, $navItems);
?>
<section class="page-hero">
    <div class="wrap narrow">
        <p class="eyebrow">Brands</p>
        <h1>Major appliance brands we service.</h1>
        <p class="lede">We work on both residential and commercial equipment from premium, mainstream, and specialty manufacturers.</p>
    </div>
</section>

<section class="section">
    <div class="wrap prose">
        <h2>Selected Brands</h2>
        <p>Our technicians service brands including Miele, Fisher & Paykel, BlueStar, Amana, Bosch, Electrolux, Viking, Frigidaire, KitchenAid, Whirlpool, LG, GE, Samsung, Hoshizaki, Liebherr, and many more.</p>
        <ul class="brand-grid">
            <?php foreach ($brands as $brand): ?>
                <li><?= htmlspecialchars($brand) ?></li>
            <?php endforeach; ?>
        </ul>
        <h2>Appliance Types</h2>
        <p>We service cooktops, stoves, ovens, vent hoods, dishwashers, refrigerators, freezers, ice machines, wine coolers, grills, washers, dryers, washer/dryer combos, salamander broilers, and more.</p>
    </div>
</section>

<?php render_cta($site, 'Need service on a specific brand?', 'Call us with the brand and model number and we will confirm support.'); ?>
<?php render_footer($site); ?>
