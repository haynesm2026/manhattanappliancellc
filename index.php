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

render_header($page, $site, $navItems);
?>
<section class="hero">
    <div class="hero-slideshow" aria-hidden="true">
        <span class="hero-slide hero-slide-1"></span>
        <span class="hero-slide hero-slide-2"></span>
        <span class="hero-slide hero-slide-3"></span>
    </div>
    <div class="wrap hero-content">
        <div class="hero-copy">
            <h1><span class="hero-title-line">Premium Appliance Repair for</span><span class="hero-title-line">Homes &amp; Businesses</span></h1>
            <p class="lede">Residential and commercial appliance repair in Manhattan and New Jersey counties, delivered by licensed, certified experts.</p>
            <div class="button-row hero-actions">
                <a class="button button-primary" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer">Book Online</a>
                <a class="button button-secondary" href="<?= htmlspecialchars($site['zip_url']) ?>" target="_blank" rel="noreferrer">Zip Codes We Service</a>
            </div>
        </div>
    </div>
</section>

<section class="section section-intro">
    <div class="wrap intro-panel">
        <h2 class="section-rule">We Go the Extra Mile</h2>
        <p>At Manhattan Appliance LLC, we go beyond standard repair services. We deliver thoughtful, precise appliance care with a focus on long-term performance, transparency, and client satisfaction.</p>
        <p>We treat every home and business with respect, honesty, and professionalism because trust is our most valuable asset.</p>
    </div>
</section>

<section class="section section-alt">
    <div class="wrap">
        <div class="section-heading">
            <p class="eyebrow">Our Services</p>
            <h2>Coverage for the appliances people depend on every day.</h2>
        </div>
        <div class="card-grid services-grid">
            <?php foreach ($serviceCards as $card): ?>
                <article class="service-card">
                    <img src="<?= asset_url($card['image']) ?>" alt="<?= htmlspecialchars($card['title']) ?>">
                    <div class="service-card-body">
                        <h3><?= htmlspecialchars($card['title']) ?></h3>
                        <p><?= htmlspecialchars($card['intro']) ?></p>
                        <ul>
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

<section class="section">
    <div class="wrap">
        <div class="service-area-header">
            <h2 class="section-rule">Where We Service</h2>
            <p class="service-area-subtitle">Manhattan, NY | Select counties in New Jersey</p>
            <h3 class="service-area-promise-title">Our Service Area Promise</h3>
        </div>
        <div class="promise-grid">
            <article class="promise-card"><h3>Prompt Response Times</h3><p>We understand the urgency of appliance repairs. Our service areas are designed to ensure we can reach you quickly when you need us most.</p></article>
            <article class="promise-card"><h3>Local Expertise</h3><p>Our technicians are familiar with the unique needs of Manhattan and New Jersey properties, from high-rise apartments to commercial kitchens.</p></article>
            <article class="promise-card"><h3>Scheduled Appointments</h3><p>We respect your time with scheduled appointment windows and punctual arrivals, minimizing disruption to your day.</p></article>
            <article class="promise-card"><h3>Consistent Service Quality</h3><p>Whether you're in Manhattan or New Jersey, you'll receive the same high-quality service and professionalism from our team.</p></article>
        </div>
    </div>
</section>

<section class="service-area-banner">
    <div class="service-area-banner-image" aria-hidden="true"></div>
    <div class="wrap service-area-banner-content">
        <h2>Outside Our Service Area?</h2>
        <p>We're always evaluating opportunities to expand our service coverage. If you're outside our current service area but need appliance repair, please contact us. We may be able to accommodate special requests or recommend a trusted partner in your area.</p>
    </div>
</section>

<section class="section section-testimonials">
    <div class="wrap">
        <div class="section-heading testimonial-heading">
            <h2>What Our Clients Say</h2>
            <p class="testimonial-heading-copy">Trusted by homeowners and businesses across Manhattan and New Jersey</p>
        </div>
        <div class="testimonial-slider" aria-label="Client feedback carousel">
            <div class="testimonial-track">
                <?php for ($loop = 0; $loop < 2; $loop++): ?>
                    <?php foreach ($featuredTestimonials as $item): ?>
                <article class="testimonial-card testimonial-slide">
                    <blockquote>"<?= htmlspecialchars($item['quote']) ?>"</blockquote>
                    <p class="testimonial-author"><?= htmlspecialchars($item['author']) ?></p>
                    <p class="testimonial-source"><?= htmlspecialchars($item['source']) ?></p>
                </article>
                    <?php endforeach; ?>
                <?php endfor; ?>
            </div>
            <div class="testimonial-dots" aria-hidden="true">
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
