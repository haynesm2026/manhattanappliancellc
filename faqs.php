<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'resources',
    'title' => 'Appliance Repair FAQs',
    'description' => 'Frequently asked questions about appliance repair, maintenance, and scheduling.',
];

$items = [
    ['q' => 'How do I get rid of an old refrigerator or freezer?', 'a' => 'Refrigerant must be evacuated before disposal. We can help manage that process properly.'],
    ['q' => 'Is it worth repairing an old appliance?', 'a' => 'Often yes, depending on age, condition, and cost. We diagnose and help you decide honestly.'],
    ['q' => 'Why does my washer use cool water on warm cycle?', 'a' => 'Washers mix hot and cold water to make warm water, and colder seasons can make that cycle feel cooler.'],
    ['q' => 'Why does my oven smell during self-cleaning?', 'a' => 'Burning off grease and food creates odors. Open windows and improve ventilation during the cycle.'],
    ['q' => 'What do you do?', 'a' => 'We are an appliance repair and service company serving homes, offices, restaurants, and pharmacies.'],
    ['q' => 'Do you charge by the hour?', 'a' => 'No. We charge by the job.'],
    ['q' => 'Do you service New Jersey?', 'a' => 'Yes. We are based in Manhattan and service select counties in New Jersey as well.'],
    ['q' => 'How can I schedule service?', 'a' => 'Call (917) 522-0890 or email office@manhattanappliancellc.com.'],
    ['q' => 'Do you sell appliances or parts?', 'a' => 'No. We install appliances clients have already purchased and parts tied to assigned repair jobs.'],
    ['q' => 'Do you offer a service guarantee?', 'a' => 'Yes. Completed repairs are covered by a 90-day warranty on parts and labor.'],
];

render_header($page, $site, $navItems);
?>
<section class="page-hero">
    <div class="wrap narrow">
        <p class="eyebrow">FAQs</p>
        <h1>Common appliance repair questions, answered.</h1>
        <p class="lede">Quick guidance on scheduling, maintenance, repair value, and what to expect from our team.</p>
    </div>
</section>

<section class="section">
    <div class="wrap prose">
        <?php foreach ($items as $item): ?>
            <div class="faq-item">
                <h2><?= htmlspecialchars($item['q']) ?></h2>
                <p><?= htmlspecialchars($item['a']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php render_cta($site, 'Still deciding whether to repair or replace?', 'Contact us and we will help you evaluate the appliance before you commit.'); ?>
<?php render_footer($site); ?>
