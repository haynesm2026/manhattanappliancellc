<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'resources',
    'title' => 'Resources',
    'description' => 'Answers to common questions about appliance repair, scheduling, and warranty coverage.',
];

$faqs = [
    ['q' => 'Do you sell appliances or parts?', 'a' => 'No. We install appliances customers already purchased, and we install parts only for repair jobs assigned to us.'],
    ['q' => 'Can I get a quote before you arrive?', 'a' => 'We can offer a rough estimate based on symptoms, but an in-person assessment is required for an accurate quote.'],
    ['q' => 'Is it worth repairing an older appliance?', 'a' => 'We evaluate age, condition, and cost efficiency to help you decide whether repair or replacement makes more sense.'],
    ['q' => 'Do you charge by the hour?', 'a' => 'No. We charge by the job, not by the hour.'],
    ['q' => 'Do you service New Jersey?', 'a' => 'Yes. We service Manhattan, NY and select counties in New Jersey.'],
    ['q' => 'Do you offer a service guarantee?', 'a' => 'Yes. Completed repairs are covered by a 90-day warranty on parts and labor.'],
];

render_header($page, $site, $navItems);
?>
<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl">
        <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Resources</p>
        <h1 class="mb-5 text-4xl font-semibold tracking-tight text-brand-ink sm:text-5xl">Helpful answers before you schedule service.</h1>
        <p class="text-lg leading-8 text-slate-600">Find quick guidance on pricing, warranty coverage, booking, and what information to have ready when you contact us.</p>
    </div>
</section>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <h2 class="mb-4 text-3xl font-semibold tracking-tight text-brand-ink">Frequently Asked Questions</h2>
            <?php foreach ($faqs as $item): ?>
                <div class="border-t border-brand-line py-6 first:border-t-0 first:pt-0">
                    <h3 class="mb-2 text-xl font-semibold tracking-tight text-brand-ink"><?= htmlspecialchars($item['q']) ?></h3>
                    <p class="text-lg leading-8 text-slate-600"><?= htmlspecialchars($item['a']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="rounded-[24px] border border-brand-line bg-white p-8 shadow-panel">
            <img class="mb-6 aspect-[4/3] w-full rounded-[18px] object-cover" src="<?= asset_url('assets/images/resources.jpg') ?>" alt="Appliance service resources">
            <h2 class="mb-4 text-3xl font-semibold tracking-tight text-brand-ink">Before You Call</h2>
            <ul class="mb-6 space-y-2 pl-5 text-lg leading-8 text-slate-600 marker:text-brand-blue">
                <li>Appliance brand and model number</li>
                <li>Description of the problem</li>
                <li>When the issue started</li>
                <li>Your preferred appointment times</li>
            </ul>
            <h3 class="mb-3 text-2xl font-semibold tracking-tight text-brand-ink">What to Expect</h3>
            <ul class="space-y-2 pl-5 text-lg leading-8 text-slate-600 marker:text-brand-blue">
                <li>Scheduled appointment window</li>
                <li>Uniformed, professional technician</li>
                <li>Upfront pricing before work begins</li>
                <li>90-day warranty on completed repairs</li>
            </ul>
        </div>
    </div>
</section>

<?php render_cta($site, 'Still have questions?', 'Call or email the office and we will help you figure out the right next step.'); ?>
<?php render_footer($site); ?>
