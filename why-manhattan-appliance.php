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
<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl">
        <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Why Manhattan Appliance</p>
        <h1 class="mb-5 text-4xl font-semibold tracking-tight text-brand-ink sm:text-5xl">Service built on integrity, accountability, and technical depth.</h1>
        <p class="text-lg leading-8 text-slate-600">We work with the urgency, care, and professionalism customers expect when a key appliance fails.</p>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[1fr_1fr]">
        <div>
            <img class="aspect-[4/3] w-full rounded-[24px] object-cover shadow-panel" src="<?= asset_url('assets/images/why-manhattan.jpg') ?>" alt="Appliance technician at work">
        </div>
        <div>
            <h2 class="mb-4 text-3xl font-semibold tracking-tight text-brand-ink sm:text-4xl">What Sets Us Apart</h2>
            <ul class="space-y-3 pl-5 text-lg leading-8 text-slate-600 marker:text-brand-blue">
                <?php foreach ($values as $value): ?>
                    <li><?= htmlspecialchars($value) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<section class="border-y border-brand-line bg-brand-soft/50 px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-6 md:grid-cols-3">
        <article class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">Family-Owned & Operated</h2>
            <p class="text-lg leading-8 text-slate-600">We treat every customer like family and every property with care.</p>
        </article>
        <article class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">Licensed & Fully Insured</h2>
            <p class="text-lg leading-8 text-slate-600">Full licensing and insurance coverage protects you and your property throughout the job.</p>
        </article>
        <article class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">Factory Certifications</h2>
            <p class="text-lg leading-8 text-slate-600">BlueStar and GE certifications reflect specialized training and manufacturer-standard work.</p>
        </article>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-5xl">
        <h2 class="mb-4 text-3xl font-semibold tracking-tight text-brand-ink sm:text-4xl">Our Promise to You</h2>
        <ul class="space-y-3 pl-5 text-lg leading-8 text-slate-600 marker:text-brand-blue">
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
