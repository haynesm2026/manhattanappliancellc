<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'clients',
    'title' => 'Why Clients Choose Manhattan Appliance',
    'description' => 'Learn why homeowners and businesses trust Manhattan Appliance LLC.',
];

render_header($page, $site, $navItems);
?>
<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl">
        <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Clients</p>
        <h1 class="mb-5 text-4xl font-semibold tracking-tight text-brand-ink sm:text-5xl">Why clients keep calling Manhattan Appliance.</h1>
        <p class="text-lg leading-8 text-slate-600">Licensed technicians, fast response times, and work that is backed by a 90-day warranty.</p>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-6 md:grid-cols-3">
        <article class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">Expert Service</h2>
            <p class="text-lg leading-8 text-slate-600">Licensed, certified professionals with specialized training in premium appliance brands.</p>
        </article>
        <article class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">Fast Response</h2>
            <p class="text-lg leading-8 text-slate-600">Prompt scheduling and efficient repairs to minimize downtime for your home or business.</p>
        </article>
        <article class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">Guaranteed Work</h2>
            <p class="text-lg leading-8 text-slate-600">90-day warranty on all parts and labor with transparent, upfront pricing.</p>
        </article>
    </div>
</section>

<?php render_cta($site, 'Join our growing client list.', 'Experience the same professional service our residential and commercial clients rely on.'); ?>
<?php render_footer($site); ?>
