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

$landingLinks = [
    ['href' => '/sub-zero-repair-nyc', 'title' => 'Sub-Zero Repair NYC', 'copy' => 'Brand-led page built for premium refrigeration search traffic in Manhattan.'],
    ['href' => '/miele-repair-nyc', 'title' => 'Miele Repair NYC', 'copy' => 'Focused page for Miele dish care, laundry, and cooking appliance repair.'],
    ['href' => '/viking-repair-nyc', 'title' => 'Viking Repair NYC', 'copy' => 'Dedicated page for Viking cooking and refrigeration repair calls.'],
    ['href' => '/appliance-repair-manhattan', 'title' => 'Appliance Repair Manhattan', 'copy' => 'General Manhattan service page for high-intent calls and online booking.'],
];

render_header($page, $site, $navItems);
?>
<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl">
        <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Services</p>
        <h1 class="mb-5 text-4xl font-semibold tracking-tight text-brand-ink sm:text-5xl">Residential and commercial appliance repair with full-service support.</h1>
        <p class="text-lg leading-8 text-slate-600">We provide diagnostics, maintenance, repairs, and installation services across Manhattan and select New Jersey counties.</p>
    </div>
</section>

<section class="px-4 py-8 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-5xl">
        <h2 class="mb-4 text-3xl font-semibold tracking-tight text-brand-ink sm:text-4xl">Our Vast Range of Services</h2>
        <p class="text-lg leading-8 text-slate-600">Our residential appliance services include dishwasher, freezer, ice machine, microwave, oven, and refrigerator repairs. Our commercial work includes bar coolers, deep fryers, freezers, mixers, steam tables, and commercial refrigerators.</p>
    </div>
</section>

<section class="border-y border-brand-line bg-brand-soft/50 px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-5">
            <?php foreach ($services as $service): ?>
                <article class="overflow-hidden rounded-[24px] border border-brand-line bg-white shadow-panel">
                    <img class="aspect-[4/3] w-full object-cover" src="<?= asset_url($service['image']) ?>" alt="<?= htmlspecialchars($service['title']) ?>">
                    <div class="p-6">
                        <h3 class="mb-4 text-2xl font-semibold tracking-tight text-brand-ink"><?= htmlspecialchars($service['title']) ?></h3>
                        <ul class="space-y-2 pl-5 text-slate-600 marker:text-brand-blue">
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

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-6 md:grid-cols-2">
        <article class="overflow-hidden rounded-[24px] border border-brand-line bg-white shadow-panel">
            <img class="aspect-[4/3] w-full object-cover" src="<?= asset_url('assets/images/service-diagnostics.jpg') ?>" alt="Diagnostics and estimates">
            <div class="p-6">
                <h2 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">Diagnostics & Estimates</h2>
                <p class="text-lg leading-8 text-slate-600">We provide mobile and in-person diagnostics tailored to your appliance. We can offer a rough estimate from the symptoms you describe, but accurate pricing requires an in-person assessment.</p>
            </div>
        </article>
        <article class="overflow-hidden rounded-[24px] border border-brand-line bg-white shadow-panel">
            <img class="aspect-[4/3] w-full object-cover" src="<?= asset_url('assets/images/service-maintenance.jpg') ?>" alt="Preventative maintenance">
            <div class="p-6">
                <h2 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">Preventative Maintenance</h2>
                <p class="text-lg leading-8 text-slate-600">Maintenance services include ice machine cleaning, condenser cleaning, filter replacement, deep cleaning for household appliances, and door seal inspection or replacement.</p>
            </div>
        </article>
        <article class="overflow-hidden rounded-[24px] border border-brand-line bg-white shadow-panel">
            <img class="aspect-[4/3] w-full object-cover" src="<?= asset_url('assets/images/service-installation.png') ?>" alt="Installation services">
            <div class="p-6">
                <h2 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">Installation Services</h2>
                <p class="text-lg leading-8 text-slate-600">We install appliances and parts purchased by customers or supplied through warranty companies, following manufacturer standards in the original installation location.</p>
            </div>
        </article>
        <article class="overflow-hidden rounded-[24px] border border-brand-line bg-white shadow-panel">
            <img class="aspect-[4/3] w-full object-cover" src="<?= asset_url('assets/images/service-laundry-detail.jpg') ?>" alt="Laundry appliance repair">
            <div class="p-6">
                <h2 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">Laundry Appliance Repair</h2>
                <p class="text-lg leading-8 text-slate-600">We service washers, dryers, washer/dryer combos, and stand-alone laundry equipment in residential and commercial settings.</p>
            </div>
        </article>
    </div>
</section>

<section class="bg-slate-900 px-4 py-16 text-white sm:px-6 lg:px-8">
    <div class="mx-auto max-w-5xl">
        <h2 class="mb-4 text-3xl font-semibold tracking-tight sm:text-4xl">Commercial Appliance Repair Services</h2>
        <p class="text-lg leading-8 text-white/85">We service dish machines, insinkerators, fryers, grills, ranges, and commercial refrigerators. We also provide recurring service and monthly cleaning for ABS pharmacy refrigerators and other temperature-sensitive commercial units.</p>
        <p class="mt-4 text-lg leading-8 text-white/85">All services are available across Manhattan, NY and select counties in New Jersey.</p>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8 max-w-4xl">
            <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">PPC + SEO Pages</p>
            <h2 class="text-4xl font-semibold tracking-tight text-brand-ink sm:text-5xl">Service pages built for tighter search intent.</h2>
            <p class="mt-4 text-lg leading-8 text-slate-600">Instead of sending every visitor to the homepage, these focused pages match specific services and brand searches more directly.</p>
        </div>
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
            <?php foreach ($landingLinks as $link): ?>
                <a class="rounded-[24px] border border-brand-line bg-white p-6 shadow-panel transition hover:-translate-y-1 hover:border-brand-blue/40" href="<?= htmlspecialchars($link['href']) ?>">
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Open Page</p>
                    <h3 class="mt-3 text-2xl font-semibold tracking-tight text-brand-ink"><?= htmlspecialchars($link['title']) ?></h3>
                    <p class="mt-3 text-base leading-7 text-slate-600"><?= htmlspecialchars($link['copy']) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php render_cta($site, 'Need a diagnosis or repair?', 'Tell us what appliance is acting up and we will help you schedule the right service.'); ?>
<?php render_footer($site); ?>
