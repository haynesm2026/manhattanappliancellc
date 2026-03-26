<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'service-areas',
    'title' => 'Service Areas',
    'description' => 'Appliance repair coverage across Manhattan, NY and select counties in New Jersey.',
    'head' => '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">'
];

$manhattan = ['Upper East Side', 'Upper West Side', 'Midtown', 'Chelsea', 'Greenwich Village', 'SoHo', 'Tribeca', 'Financial District', 'Lower East Side', 'East Village', 'Harlem', 'Washington Heights', 'Inwood', 'Murray Hill', 'Gramercy Park', "Hell's Kitchen", 'Battery Park City'];
$nj = ['Bergen County', 'Hudson County', 'Essex County', 'Passaic County (select areas)', 'Union County (select areas)'];

render_header($page, $site, $navItems);
?>
<script src="<?= asset_url('assets/js/service-area-data.js') ?>" defer></script>
<script src="<?= asset_url('assets/js/service-area-checker.js') ?>" defer></script>
<section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('/assets/images/shutterstock_2473408983.jpg')] bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-slate-900/45"></div>
    <div class="relative mx-auto flex min-h-[230px] w-full max-w-7xl items-center justify-center px-4 py-16 text-center sm:min-h-[320px] sm:px-6 lg:px-8">
        <div class="max-w-3xl text-white">
            <h1 class="text-4xl font-semibold tracking-tight sm:text-5xl">Service Areas</h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg leading-8 text-white/90 sm:text-xl">We proudly service Manhattan, NY, and select counties in New Jersey, providing premium appliance repair to homes and businesses throughout the region.</p>
        </div>
    </div>
</section>

<section class="px-4 pb-8 pt-6 sm:px-6 sm:pb-14 lg:px-8">
    <div class="mx-auto max-w-4xl">
        <div class="rounded-[20px] bg-brand-blue px-5 py-7 text-center text-white shadow-panel sm:px-8 sm:py-10">
            <h2 class="text-3xl font-medium leading-tight sm:text-5xl">Check If We Service Your Area</h2>
            <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-white/88 sm:text-xl">Enter your ZIP code below to confirm service availability in your location.</p>
            <div class="mx-auto mt-6 flex max-w-2xl items-center gap-3">
                <input type="text" inputmode="numeric" maxlength="5" placeholder="Enter ZIP Code" class="h-14 min-w-0 flex-1 rounded-full border-0 px-6 text-lg text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-4 focus:ring-white/25" data-service-zip-input>
                <button type="button" class="inline-flex h-14 shrink-0 items-center justify-center rounded-full bg-brand-teal px-8 text-lg font-semibold text-white transition hover:brightness-95" data-service-zip-button>Check</button>
            </div>
            <p class="hidden mt-4 text-sm font-medium text-white sm:text-base data-[state=served]:text-emerald-200 data-[state=not-served]:text-amber-100" data-service-zip-result></p>
        </div>
    </div>
</section>

<section class="px-4 pb-8 sm:px-6 sm:pb-14 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-6 text-center">
            <h2 class="text-3xl font-semibold tracking-tight text-brand-ink sm:text-4xl">Explore Our Service Map</h2>
            <p class="mx-auto mt-3 max-w-3xl text-base leading-7 text-slate-600 sm:text-lg">The map opens focused on Manhattan, then you can pan west to see our nearby New Jersey coverage points and regions.</p>
        </div>
        <div class="overflow-hidden rounded-[24px] border border-brand-line bg-white shadow-panel">
            <div class="h-[420px] w-full sm:h-[520px]" data-service-area-map></div>
        </div>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-2">
        <article class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-3 text-3xl font-semibold tracking-tight text-brand-ink">Manhattan, New York</h2>
            <p class="mb-5 text-lg leading-8 text-slate-600">We provide comprehensive appliance repair services throughout Manhattan for residential and commercial clients.</p>
            <ul class="space-y-2 pl-5 text-slate-600 marker:text-brand-blue">
                <?php foreach ($manhattan as $item): ?>
                    <li><?= htmlspecialchars($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </article>
        <article class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-3 text-3xl font-semibold tracking-tight text-brand-ink">New Jersey</h2>
            <p class="mb-5 text-lg leading-8 text-slate-600">We extend service to select counties in New Jersey with the same level of expertise and professionalism.</p>
            <ul class="space-y-2 pl-5 text-slate-600 marker:text-brand-blue">
                <?php foreach ($nj as $item): ?>
                    <li><?= htmlspecialchars($item) ?></li>
                <?php endforeach; ?>
            </ul>
            <p class="mt-5 text-base text-slate-500">Availability in New Jersey varies by location. Please confirm service before booking.</p>
        </article>
    </div>
</section>

<section class="border-y border-brand-line bg-brand-soft/50 px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-5 md:grid-cols-2 xl:grid-cols-4">
        <article class="rounded-[18px] border border-brand-line bg-white p-6 shadow-panel"><h2 class="mb-3 text-2xl font-medium tracking-tight text-brand-blue">Prompt Response Times</h2><p class="text-lg leading-8 text-slate-600">Our coverage area is built around practical scheduling and quick response.</p></article>
        <article class="rounded-[18px] border border-brand-line bg-white p-6 shadow-panel"><h2 class="mb-3 text-2xl font-medium tracking-tight text-brand-blue">Local Expertise</h2><p class="text-lg leading-8 text-slate-600">We understand the appliance demands of apartments, homes, and commercial kitchens in this region.</p></article>
        <article class="rounded-[18px] border border-brand-line bg-white p-6 shadow-panel"><h2 class="mb-3 text-2xl font-medium tracking-tight text-brand-blue">Scheduled Appointments</h2><p class="text-lg leading-8 text-slate-600">We use clear appointment windows and punctual arrivals to reduce disruption.</p></article>
        <article class="rounded-[18px] border border-brand-line bg-white p-6 shadow-panel"><h2 class="mb-3 text-2xl font-medium tracking-tight text-brand-blue">Consistent Service Quality</h2><p class="text-lg leading-8 text-slate-600">Every customer receives the same professional standards, wherever we serve.</p></article>
    </div>
</section>

<?php render_cta($site, 'Not sure if you are inside the service area?', 'Call or email us with your ZIP code and we will confirm availability.'); ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="<?= asset_url('assets/js/service-area-map.js') ?>" defer></script>
<?php render_footer($site); ?>
