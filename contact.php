<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'contact',
    'title' => 'Contact Manhattan Appliance',
    'description' => 'Schedule appliance repair service in Manhattan, NY and select New Jersey counties.',
];

render_header($page, $site, $navItems);
?>
<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl">
        <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Contact</p>
        <h1 class="mb-5 text-4xl font-semibold tracking-tight text-brand-ink sm:text-5xl">Schedule your appliance service.</h1>
        <p class="text-lg leading-8 text-slate-600">Contact us today to schedule professional appliance repair service and get your equipment back to peak performance.</p>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-2">
        <article class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-4 text-3xl font-semibold tracking-tight text-brand-ink">Get In Touch</h2>
            <p class="mb-3 text-lg text-slate-600"><strong>Phone:</strong> <a class="text-brand-blue hover:underline" href="<?= htmlspecialchars($site['phone_href']) ?>"><?= htmlspecialchars($site['phone']) ?></a></p>
            <p class="mb-3 text-lg text-slate-600"><strong>Email:</strong> <a class="text-brand-blue hover:underline" href="<?= htmlspecialchars($site['email_href']) ?>"><?= htmlspecialchars($site['email']) ?></a></p>
            <p class="mb-3 text-lg text-slate-600"><strong>Service Areas:</strong> Manhattan, NY and select counties in New Jersey</p>
            <p class="mb-6 text-lg text-slate-600"><strong>Business Hours:</strong> Mon - Fri, 9:00 - 17:00</p>
            <div class="flex flex-col gap-4 sm:flex-row">
                <a class="inline-flex items-center justify-center rounded-full bg-brand-blue px-7 py-3 text-base font-semibold text-white transition hover:bg-sky-800" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer">Book Online</a>
                <a class="inline-flex items-center justify-center rounded-full border border-brand-line bg-white px-7 py-3 text-base font-semibold text-brand-blue transition hover:bg-brand-soft" href="<?= htmlspecialchars($site['phone_href']) ?>">Call Now</a>
            </div>
        </article>
        <article class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-4 text-3xl font-semibold tracking-tight text-brand-ink">Why Choose Us?</h2>
            <ul class="space-y-3 pl-5 text-lg leading-8 text-slate-600 marker:text-brand-blue">
                <li>Licensed and insured</li>
                <li>90-day warranty</li>
                <li>Upfront pricing</li>
                <li>BlueStar and GE certified</li>
            </ul>
        </article>
    </div>
</section>

<?php render_cta($site, 'Need help with a failing appliance?', 'Tell us what appliance is involved and we will help you book the right service visit.'); ?>
<?php render_footer($site); ?>
