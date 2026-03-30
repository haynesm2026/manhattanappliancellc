<?php
if (!isset($landing, $page)) {
    http_response_code(500);
    exit('Landing page configuration missing.');
}

$leadStatus = $_GET['lead'] ?? '';
$returnPath = '/' . $landing['slug'];

$relatedLabels = [
    'appliance-repair-manhattan' => 'Appliance Repair Manhattan',
    'appliance-repair-new-jersey' => 'Appliance Repair New Jersey',
    'sub-zero-repair-nyc' => 'Sub-Zero Repair NYC',
    'miele-repair-nyc' => 'Miele Repair NYC',
    'viking-repair-nyc' => 'Viking Repair NYC',
    'service-areas' => 'Service Areas',
    'services' => 'Services',
];

render_header($page, $site, $navItems);
?>
<section class="relative overflow-hidden bg-slate-900">
    <img class="absolute inset-0 h-full w-full object-cover" src="<?= asset_url($landing['image']) ?>" alt="<?= htmlspecialchars($landing['title']) ?>">
    <div class="absolute inset-0 bg-slate-950/55"></div>
    <div class="relative mx-auto grid min-h-[560px] w-full max-w-7xl gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[1.1fr_0.9fr] lg:px-8 lg:py-20">
        <div class="self-center text-white">
            <p class="mb-4 text-xs font-bold uppercase tracking-[0.22em] text-white/70"><?= htmlspecialchars($landing['eyebrow']) ?></p>
            <h1 class="max-w-4xl text-4xl font-semibold leading-tight tracking-tight sm:text-5xl lg:text-6xl"><?= htmlspecialchars($landing['headline']) ?></h1>
            <p class="mt-5 max-w-3xl text-lg leading-8 text-white/90 sm:text-xl"><?= htmlspecialchars($landing['subheadline']) ?></p>
            <p class="mt-5 max-w-3xl text-base leading-7 text-white/80"><?= htmlspecialchars($landing['service_area']) ?></p>
            <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                <a class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-base font-bold text-brand-blue transition hover:bg-slate-100" href="<?= htmlspecialchars($site['phone_href']) ?>" data-conversion-event="landing_call_click" data-conversion-page="<?= htmlspecialchars($landing['slug']) ?>">Call Now</a>
                <a class="inline-flex items-center justify-center rounded-full bg-brand-teal px-7 py-4 text-base font-bold text-white transition hover:brightness-95" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer" data-conversion-event="landing_book_click" data-conversion-page="<?= htmlspecialchars($landing['slug']) ?>">Book Service</a>
            </div>
            <div class="mt-8 grid gap-3 sm:grid-cols-3">
                <?php foreach ($landing['trust'] as $signal): ?>
                    <div class="rounded-2xl border border-white/15 bg-white/10 px-4 py-4 text-sm font-semibold text-white/95 backdrop-blur-sm"><?= htmlspecialchars($signal) ?></div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="self-center rounded-[28px] border border-white/10 bg-white p-8 shadow-panel">
            <p class="mb-2 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Quick Request</p>
            <h2 class="text-3xl font-semibold tracking-tight text-brand-ink"><?= htmlspecialchars($landing['form_title']) ?></h2>
            <p class="mt-3 text-base leading-7 text-slate-600">Short form for fast follow-up. Your request is captured directly on the site so the office can follow up quickly.</p>
            <?php if ($leadStatus === 'success'): ?>
                <div class="mt-5 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm leading-6 text-emerald-800" data-conversion-page-success="<?= htmlspecialchars($landing['slug']) ?>">
                    Request received. For the fastest scheduling, you can also call now or continue to online booking.
                </div>
            <?php elseif ($leadStatus === 'error'): ?>
                <div class="mt-5 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm leading-6 text-rose-800">
                    Please enter at least your name and phone number so we can follow up.
                </div>
            <?php endif; ?>
            <form class="mt-6 space-y-4" method="post" action="/lead-request" data-lead-form data-lead-service="<?= htmlspecialchars($landing['title']) ?>" data-conversion-page="<?= htmlspecialchars($landing['slug']) ?>">
                <input type="hidden" name="service" value="<?= htmlspecialchars($landing['title']) ?>">
                <input type="hidden" name="page_slug" value="<?= htmlspecialchars($landing['slug']) ?>">
                <input type="hidden" name="return_path" value="<?= htmlspecialchars($returnPath) ?>">
                <input class="w-full rounded-2xl border border-brand-line px-5 py-4 text-base text-slate-700 outline-none transition focus:border-brand-blue" type="text" name="name" placeholder="Full name" required>
                <input class="w-full rounded-2xl border border-brand-line px-5 py-4 text-base text-slate-700 outline-none transition focus:border-brand-blue" type="tel" name="phone" placeholder="Phone number" required>
                <input class="w-full rounded-2xl border border-brand-line px-5 py-4 text-base text-slate-700 outline-none transition focus:border-brand-blue" type="text" name="zip" maxlength="5" placeholder="ZIP code">
                <textarea class="min-h-[120px] w-full rounded-2xl border border-brand-line px-5 py-4 text-base text-slate-700 outline-none transition focus:border-brand-blue" name="issue" placeholder="Appliance + issue"></textarea>
                <button class="inline-flex w-full items-center justify-center rounded-full bg-brand-teal px-7 py-4 text-base font-bold text-white transition hover:brightness-95 disabled:cursor-not-allowed disabled:opacity-70" type="submit">Send Service Request</button>
                <p class="text-sm leading-6 text-slate-500" data-lead-form-status>Requests are captured directly on the site and returned to this page with a confirmation state.</p>
            </form>
        </div>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-2">
        <article class="rounded-[28px] border border-brand-line bg-white p-8 shadow-panel">
            <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Common Issues</p>
            <h2 class="mb-5 text-3xl font-semibold tracking-tight text-brand-ink sm:text-4xl">Problems we solve on this service page.</h2>
            <ul class="space-y-3 pl-5 text-lg leading-8 text-slate-600 marker:text-brand-blue">
                <?php foreach ($landing['problems'] as $problem): ?>
                    <li><?= htmlspecialchars($problem) ?></li>
                <?php endforeach; ?>
            </ul>
        </article>
        <article class="rounded-[28px] border border-brand-line bg-brand-soft/60 p-8 shadow-panel">
            <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Why Clients Call Us</p>
            <h2 class="mb-5 text-3xl font-semibold tracking-tight text-brand-ink sm:text-4xl">Conversion-focused page, backed by real service support.</h2>
            <ul class="space-y-3 pl-5 text-lg leading-8 text-slate-600 marker:text-brand-blue">
                <?php foreach ($landing['why'] as $reason): ?>
                    <li><?= htmlspecialchars($reason) ?></li>
                <?php endforeach; ?>
            </ul>
            <div class="mt-8 rounded-[24px] bg-white p-6">
                <p class="text-2xl font-semibold leading-tight text-slate-700">"<?= htmlspecialchars($landing['testimonial']['quote']) ?>"</p>
                <p class="mt-4 text-lg font-bold italic text-slate-600"><?= htmlspecialchars($landing['testimonial']['author']) ?></p>
                <p class="text-base italic text-slate-500"><?= htmlspecialchars($landing['testimonial']['source']) ?></p>
            </div>
        </article>
    </div>
</section>

<section class="bg-brand-blue px-4 py-16 text-white sm:px-6 lg:px-8">
    <div class="mx-auto max-w-5xl text-center">
        <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-white/70">Urgency</p>
        <h2 class="text-3xl font-semibold tracking-tight sm:text-4xl">Limited appointment windows. Fast action converts better and schedules faster.</h2>
        <p class="mx-auto mt-5 max-w-3xl text-lg leading-8 text-white/85"><?= htmlspecialchars($landing['cta_copy']) ?></p>
        <div class="mt-8 flex flex-col justify-center gap-4 sm:flex-row">
            <a class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-base font-bold text-brand-blue transition hover:bg-slate-100" href="<?= htmlspecialchars($site['phone_href']) ?>" data-conversion-event="landing_call_click" data-conversion-page="<?= htmlspecialchars($landing['slug']) ?>">Call <?= htmlspecialchars($site['phone']) ?></a>
            <a class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/10 px-7 py-4 text-base font-bold text-white transition hover:bg-white/20" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer" data-conversion-event="landing_book_click" data-conversion-page="<?= htmlspecialchars($landing['slug']) ?>">Book Online</a>
        </div>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8">
            <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Internal Links</p>
            <h2 class="text-3xl font-semibold tracking-tight text-brand-ink sm:text-4xl">Related high-intent pages</h2>
        </div>
        <div class="grid gap-5 md:grid-cols-3">
            <?php foreach ($landing['related'] as $slug): ?>
                <?php
                $href = isset($navItems[$slug]) ? $navItems[$slug]['href'] : '/' . $slug;
                $label = $relatedLabels[$slug] ?? ucwords(str_replace('-', ' ', $slug));
                ?>
                <a class="rounded-[24px] border border-brand-line bg-white p-6 text-brand-ink shadow-panel transition hover:-translate-y-1 hover:border-brand-blue/40" href="<?= htmlspecialchars($href) ?>">
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Explore Page</p>
                    <h3 class="mt-3 text-2xl font-semibold tracking-tight"><?= htmlspecialchars($label) ?></h3>
                    <p class="mt-3 text-base leading-7 text-slate-600">Open this focused page for additional service-area and brand-specific detail.</p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php render_cta($site, 'Need service now?', 'Call now, book online, or send the short request form above for quick follow-up.'); ?>
<script src="<?= asset_url('assets/js/conversion-events.js') ?>" defer></script>
<script src="<?= asset_url('assets/js/lead-form.js') ?>" defer></script>
<?php render_footer($site); ?>
