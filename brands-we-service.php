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
<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl">
        <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Brands</p>
        <h1 class="mb-5 text-4xl font-semibold tracking-tight text-brand-ink sm:text-5xl">Major appliance brands we service.</h1>
        <p class="text-lg leading-8 text-slate-600">We work on both residential and commercial equipment from premium, mainstream, and specialty manufacturers.</p>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-6xl">
        <h2 class="mb-4 text-3xl font-semibold tracking-tight text-brand-ink sm:text-4xl">Selected Brands</h2>
        <p class="mb-8 text-lg leading-8 text-slate-600">Our technicians service brands including Miele, Fisher & Paykel, BlueStar, Amana, Bosch, Electrolux, Viking, Frigidaire, KitchenAid, Whirlpool, LG, GE, Samsung, Hoshizaki, Liebherr, and many more.</p>
        <ul class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($brands as $brand): ?>
                <li class="rounded-2xl border border-brand-line bg-white px-4 py-3 text-slate-700 shadow-panel"><?= htmlspecialchars($brand) ?></li>
            <?php endforeach; ?>
        </ul>
        <h2 class="mb-4 mt-12 text-3xl font-semibold tracking-tight text-brand-ink sm:text-4xl">Appliance Types</h2>
        <p class="text-lg leading-8 text-slate-600">We service cooktops, stoves, ovens, vent hoods, dishwashers, refrigerators, freezers, ice machines, wine coolers, grills, washers, dryers, washer/dryer combos, salamander broilers, and more.</p>
    </div>
</section>

<?php render_cta($site, 'Need service on a specific brand?', 'Call us with the brand and model number and we will confirm support.'); ?>
<?php render_footer($site); ?>
