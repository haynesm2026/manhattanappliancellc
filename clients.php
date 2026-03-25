<?php
require __DIR__ . '/includes/site.php';

$page = [
    'slug' => 'clients',
    'title' => 'Why Clients Choose Manhattan Appliance',
    'description' => 'Learn why homeowners and businesses trust Manhattan Appliance LLC.',
];

render_header($page, $site, $navItems);
?>
<section class="page-hero">
    <div class="wrap narrow">
        <p class="eyebrow">Clients</p>
        <h1>Why clients keep calling Manhattan Appliance.</h1>
        <p class="lede">Licensed technicians, fast response times, and work that is backed by a 90-day warranty.</p>
    </div>
</section>

<section class="section">
    <div class="wrap card-grid three-up">
        <article class="icon-card">
            <h2>Expert Service</h2>
            <p>Licensed, certified professionals with specialized training in premium appliance brands.</p>
        </article>
        <article class="icon-card">
            <h2>Fast Response</h2>
            <p>Prompt scheduling and efficient repairs to minimize downtime for your home or business.</p>
        </article>
        <article class="icon-card">
            <h2>Guaranteed Work</h2>
            <p>90-day warranty on all parts and labor with transparent, upfront pricing.</p>
        </article>
    </div>
</section>

<?php render_cta($site, 'Join our growing client list.', 'Experience the same professional service our residential and commercial clients rely on.'); ?>
<?php render_footer($site); ?>
