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
<section class="page-hero">
    <div class="wrap narrow">
        <p class="eyebrow">Resources</p>
        <h1>Helpful answers before you schedule service.</h1>
        <p class="lede">Find quick guidance on pricing, warranty coverage, booking, and what information to have ready when you contact us.</p>
    </div>
</section>

<section class="section">
    <div class="wrap two-column align-start">
        <div class="panel">
            <h2>Frequently Asked Questions</h2>
            <?php foreach ($faqs as $item): ?>
                <div class="faq-item">
                    <h3><?= htmlspecialchars($item['q']) ?></h3>
                    <p><?= htmlspecialchars($item['a']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="panel panel-image">
            <img class="feature-image" src="<?= asset_url('assets/images/resources.jpg') ?>" alt="Appliance service resources">
            <h2>Before You Call</h2>
            <ul class="plain-list">
                <li>Appliance brand and model number</li>
                <li>Description of the problem</li>
                <li>When the issue started</li>
                <li>Your preferred appointment times</li>
            </ul>
            <h3>What to Expect</h3>
            <ul class="plain-list">
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
