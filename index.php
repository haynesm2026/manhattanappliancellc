<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'home',
    'title' => 'Appliance Repair Services in Manhattan and New Jersey',
    'description' => 'Premium residential and commercial appliance repair across Manhattan and select New Jersey counties.',
];

$serviceCards = [
    [
        'title' => 'Refrigeration & Cooling',
        'image' => 'assets/images/service-refrigeration.jpg',
        'intro' => 'Temperature-controlled essentials',
        'items' => ['Refrigerator repairs', 'Freezer repairs', 'Ice machine repairs', 'Wine cooler repairs', 'Beverage chiller repairs'],
    ],
    [
        'title' => 'Cooking Appliances',
        'image' => 'assets/images/service-cooking.jpg',
        'intro' => 'Core cooking and heat equipment',
        'items' => ['Stove repairs', 'Cooktop repairs', 'Range repairs', 'Oven repairs', 'Grill repairs'],
    ],
    [
        'title' => 'Kitchen Ventilation & Dish Care',
        'image' => 'assets/images/service-dishcare.jpg',
        'intro' => 'Clean air, clean dishes',
        'items' => ['Dishwasher repairs', 'Vent hood repairs'],
    ],
    [
        'title' => 'Laundry Appliances',
        'image' => 'assets/images/service-laundry.jpg',
        'intro' => 'Home and multi-unit laundry systems',
        'items' => ['Washing machine repairs', 'Dryer repairs', 'Washer/dryer combo repairs'],
    ],
    [
        'title' => 'Commercial & Specialty',
        'image' => 'assets/images/service-commercial.jpg',
        'intro' => 'Professional-grade kitchen equipment',
        'items' => ['Deep fryer repairs', 'Salamander broiler repairs'],
    ],
];

$testimonials = [
    ['quote' => 'Excellent attention to detail and always go above and beyond.', 'author' => 'Stefanie Faris', 'source' => 'Via Google - 11/04/2025'],
    ['quote' => 'Very professional service.', 'author' => 'M, Chris', 'source' => 'Via HCP - 10/19/2025'],
    ['quote' => 'They got a complicated job done.', 'author' => 'Lorenzo Bautista', 'source' => 'Via Google - 11/21/2025'],
    ['quote' => 'Knowledgeable, communicative and friendly service.', 'author' => 'J B', 'source' => 'Via Google - 11/03/2025'],
];

$featuredTestimonials = [
    $testimonials[1],
    $testimonials[0],
    $testimonials[2],
];

$landingLinks = [
    ['href' => '/appliance-repair-manhattan', 'title' => 'Appliance Repair Manhattan', 'copy' => 'General high-intent page for Manhattan service calls and premium residential repairs.'],
    ['href' => '/sub-zero-repair-nyc', 'title' => 'Sub-Zero Repair NYC', 'copy' => 'Focused landing page for premium Sub-Zero refrigeration leads in Manhattan.'],
    ['href' => '/miele-repair-nyc', 'title' => 'Miele Repair NYC', 'copy' => 'Brand-specific page for Miele dishwashers, laundry, and cooking appliances.'],
    ['href' => '/viking-repair-nyc', 'title' => 'Viking Repair NYC', 'copy' => 'Dedicated page for Viking ranges, ovens, cooktops, and refrigeration.'],
    ['href' => '/appliance-repair-new-jersey', 'title' => 'Appliance Repair New Jersey', 'copy' => 'Coverage page for approved New Jersey service routes and ZIP-confirmed calls.'],
];

render_header($page, $site, $navItems);
?>
<section class="relative overflow-hidden bg-slate-900">
    <div class="hero-slideshow absolute inset-0" aria-hidden="true">
        <span class="hero-slide hero-slide-1"></span>
        <span class="hero-slide hero-slide-2"></span>
        <span class="hero-slide hero-slide-3"></span>
    </div>
    <div class="relative mx-auto flex min-h-[380px] w-full max-w-7xl items-center justify-center px-4 py-10 text-center sm:min-h-[470px] sm:px-6 sm:py-24 lg:px-8">
        <div class="max-w-6xl text-white">
            <h1 class="mx-auto mb-4 text-[2.25rem] font-extrabold leading-[1.05] tracking-[-0.04em] text-white drop-shadow-[0_2px_14px_rgba(0,0,0,0.28)] sm:mb-6 sm:text-6xl lg:text-[4rem]">
                <span class="block whitespace-nowrap max-sm:whitespace-normal">Premium Appliance Repair for</span>
                <span class="block whitespace-nowrap max-sm:whitespace-normal">Homes &amp; Businesses</span>
            </h1>
            <p class="mx-auto max-w-4xl text-[0.95rem] font-medium leading-8 text-white/90 sm:text-lg">Residential and commercial appliance repair in Manhattan and New Jersey counties, delivered by licensed, certified experts.</p>
            <div class="mt-6 flex flex-col items-center justify-center gap-3 sm:mt-8 sm:flex-row sm:gap-4">
                <a class="inline-flex min-w-[184px] items-center justify-center rounded-full bg-brand-teal px-8 py-3 text-base font-semibold text-white shadow-lg transition hover:brightness-95" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer">Book Online</a>
                <a class="inline-flex min-w-[184px] items-center justify-center rounded-full border border-white/25 bg-white px-8 py-3 text-base font-semibold text-brand-blue shadow-lg transition hover:bg-brand-soft" href="<?= htmlspecialchars($site['zip_url']) ?>" target="_blank" rel="noreferrer">Zip Codes We Service</a>
            </div>
        </div>
    </div>
</section>

<section class="px-4 py-14 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl text-center">
        <div class="mb-7 flex items-center justify-center gap-4 text-brand-blue">
            <span class="h-px w-20 bg-brand-blue/40 sm:w-40"></span>
            <h2 class="text-4xl font-semibold tracking-tight sm:text-5xl">We Go the Extra Mile</h2>
            <span class="h-px w-20 bg-brand-blue/40 sm:w-40"></span>
        </div>
        <p class="mx-auto max-w-4xl text-lg leading-8 text-slate-600">At Manhattan Appliance LLC, we go beyond standard repair services. We deliver thoughtful, precise appliance care with a focus on long-term performance, transparency, and client satisfaction.</p>
        <p class="mx-auto mt-5 max-w-4xl text-lg leading-8 text-slate-600">We treat every home and business with respect, honesty, and professionalism because trust is our most valuable asset.</p>
    </div>
</section>

<section class="border-y border-brand-line bg-brand-soft/50 px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8">
            <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Our Services</p>
            <h2 class="max-w-4xl text-4xl font-semibold tracking-tight text-brand-ink sm:text-5xl">Coverage for the appliances people depend on every day.</h2>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
            <?php foreach ($serviceCards as $card): ?>
                <article class="overflow-hidden rounded-[24px] border border-brand-line bg-white shadow-panel">
                    <img class="aspect-[4/3] w-full object-cover" src="<?= asset_url($card['image']) ?>" alt="<?= htmlspecialchars($card['title']) ?>">
                    <div class="p-6">
                        <h3 class="mb-2 text-2xl font-semibold tracking-tight text-brand-ink"><?= htmlspecialchars($card['title']) ?></h3>
                        <p class="mb-4 text-sm font-medium uppercase tracking-[0.18em] text-brand-blue/70"><?= htmlspecialchars($card['intro']) ?></p>
                        <ul class="space-y-2 pl-5 text-slate-600 marker:text-brand-blue">
                            <?php foreach ($card['items'] as $item): ?>
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
    <div class="mx-auto max-w-7xl">
        <div class="mb-8 max-w-4xl">
            <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Focused Pages</p>
            <h2 class="text-4xl font-semibold tracking-tight text-brand-ink sm:text-5xl">Dedicated landing pages for high-intent service searches.</h2>
            <p class="mt-4 text-lg leading-8 text-slate-600">These pages were added to support PPC traffic, location-specific search intent, and faster call or booking decisions.</p>
        </div>
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-5">
            <?php foreach ($landingLinks as $link): ?>
                <a class="rounded-[24px] border border-brand-line bg-white p-6 shadow-panel transition hover:-translate-y-1 hover:border-brand-blue/40" href="<?= htmlspecialchars($link['href']) ?>">
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Landing Page</p>
                    <h3 class="mt-3 text-2xl font-semibold tracking-tight text-brand-ink"><?= htmlspecialchars($link['title']) ?></h3>
                    <p class="mt-3 text-base leading-7 text-slate-600"><?= htmlspecialchars($link['copy']) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mx-auto max-w-5xl text-center">
            <div class="mb-3 flex items-center justify-center gap-4 text-brand-blue">
                <span class="h-px w-20 bg-brand-blue/40 sm:w-40"></span>
                <h2 class="text-[2.1rem] font-medium tracking-tight">Where We Service</h2>
                <span class="h-px w-20 bg-brand-blue/40 sm:w-40"></span>
            </div>
            <p class="mb-12 text-lg text-slate-700">Manhattan, NY | Select counties in New Jersey</p>
            <h3 class="text-4xl font-medium tracking-tight text-brand-blue">Our Service Area Promise</h3>
        </div>
        <div class="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
            <article class="min-h-full rounded-[18px] border border-brand-line bg-white p-6 shadow-panel"><h3 class="mb-4 text-[1.15rem] font-medium leading-tight text-brand-blue">Prompt Response Times</h3><p class="text-lg leading-9 text-slate-700">We understand the urgency of appliance repairs. Our service areas are designed to ensure we can reach you quickly when you need us most.</p></article>
            <article class="min-h-full rounded-[18px] border border-brand-line bg-white p-6 shadow-panel"><h3 class="mb-4 text-[1.15rem] font-medium leading-tight text-brand-blue">Local Expertise</h3><p class="text-lg leading-9 text-slate-700">Our technicians are familiar with the unique needs of Manhattan and New Jersey properties, from high-rise apartments to commercial kitchens.</p></article>
            <article class="min-h-full rounded-[18px] border border-brand-line bg-white p-6 shadow-panel"><h3 class="mb-4 text-[1.15rem] font-medium leading-tight text-brand-blue">Scheduled Appointments</h3><p class="text-lg leading-9 text-slate-700">We respect your time with scheduled appointment windows and punctual arrivals, minimizing disruption to your day.</p></article>
            <article class="min-h-full rounded-[18px] border border-brand-line bg-white p-6 shadow-panel"><h3 class="mb-4 text-[1.15rem] font-medium leading-tight text-brand-blue">Consistent Service Quality</h3><p class="text-lg leading-9 text-slate-700">Whether you're in Manhattan or New Jersey, you'll receive the same high-quality service and professionalism from our team.</p></article>
        </div>
    </div>
</section>

<section class="service-area-banner relative overflow-hidden">
    <div class="service-area-banner-image" aria-hidden="true"></div>
    <div class="relative z-[1] mx-auto flex min-h-[300px] w-full max-w-7xl flex-col items-center justify-center px-4 py-16 text-center text-white sm:px-6 lg:px-8">
        <h2 class="mb-4 text-4xl font-normal tracking-tight sm:text-5xl">Outside Our Service Area?</h2>
        <p class="max-w-5xl text-lg leading-8 text-white/95">We're always evaluating opportunities to expand our service coverage. If you're outside our current service area but need appliance repair, please contact us. We may be able to accommodate special requests or recommend a trusted partner in your area.</p>
    </div>
</section>

<section class="bg-white px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-10 text-center">
            <h2 class="mb-5 text-4xl font-medium tracking-tight text-brand-blue sm:text-5xl">What Our Clients Say</h2>
            <p class="text-lg text-slate-700">Trusted by homeowners and businesses across Manhattan and New Jersey</p>
        </div>
        <div class="testimonial-slider" aria-label="Client feedback carousel">
            <div class="testimonial-track">
                <?php for ($loop = 0; $loop < 2; $loop++): ?>
                    <?php foreach ($featuredTestimonials as $item): ?>
                <article class="testimonial-slide px-2 text-center">
                    <blockquote class="mb-4 text-[1.5rem] font-semibold leading-tight text-slate-700">"<?= htmlspecialchars($item['quote']) ?>"</blockquote>
                    <p class="mb-2 text-xl font-bold italic text-slate-600"><?= htmlspecialchars($item['author']) ?></p>
                    <p class="text-lg italic text-slate-500"><?= htmlspecialchars($item['source']) ?></p>
                </article>
                    <?php endforeach; ?>
                <?php endfor; ?>
            </div>
            <div class="testimonial-dots mt-8 flex justify-center gap-2" aria-hidden="true">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</section>

<?php render_cta($site, 'Ready to schedule appliance service?', 'Book online or call our office to reserve a service appointment.'); ?>
<?php render_footer($site); ?>
