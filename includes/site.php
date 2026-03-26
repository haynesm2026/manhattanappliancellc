<?php

$site = [
    'name' => 'Manhattan Appliance LLC',
    'phone' => '(917) 522-0890',
    'phone_href' => 'tel:+19175220890',
    'email' => 'office@manhattanappliancellc.com',
    'email_href' => 'mailto:office@manhattanappliancellc.com',
    'book_url' => 'https://book.housecallpro.com/book/Manhattan-Appliance-LLC/782b6e8d55ed436e8acce1d4b8f2f33d?v2=true',
    'zip_url' => 'https://cdn.website-editor.net/s/009be738e154491f973774d06a36aa24/uploads/files/service-area.pdf',
    'socials' => [
        'Instagram' => 'https://instagram.com/manhattanappliancellc',
        'Facebook' => 'https://facebook.com/Manhattan-Appliance-LLC-100066495584765/',
        'LinkedIn' => 'https://linkedin.com/manhattan-appliance-llc',
    ],
];

$navItems = [
    'home' => ['label' => 'Home', 'href' => '/'],
    'services' => ['label' => 'Services', 'href' => '/services'],
    'clients' => ['label' => 'Clients', 'href' => '/clients'],
    'service-areas' => ['label' => 'Service Areas', 'href' => '/service-areas'],
    'why-manhattan-appliance' => ['label' => 'Why Manhattan Appliance', 'href' => '/why-manhattan-appliance'],
    'resources' => ['label' => 'Resources', 'href' => '/resources'],
    'contact' => ['label' => 'Contact', 'href' => '/contact'],
];

function page_url(string $path): string
{
    return $path === 'home' ? '/' : '/' . $path;
}

function asset_url(string $path): string
{
    return '/' . ltrim($path, '/');
}

function render_header(array $page, array $site, array $navItems): void
{
    $title = htmlspecialchars($page['title'] . ' | ' . $site['name']);
    $description = htmlspecialchars($page['description']);
    $currentPage = $page['slug'];
    $extraHead = $page['head'] ?? '';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
    <link rel="icon" href="<?= asset_url('assets/images/logo.png') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            blue: '#2b5f89',
                            teal: '#66bac7',
                            ink: '#1f2933',
                            soft: '#f5f8fb',
                            line: '#dbe6ee'
                        }
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif']
                    },
                    boxShadow: {
                        panel: '0 12px 30px rgba(15, 23, 42, 0.08)'
                    }
                }
            }
        };
    </script>
    <script src="<?= asset_url('assets/js/mobile-menu.js') ?>" defer></script>
    <?= $extraHead ?>
    <style>
        .hero-slideshow,
        .hero-slide,
        .hero-slideshow::after,
        .service-area-banner-image,
        .service-area-banner-image::after {
            position: absolute;
            inset: 0;
        }

        .hero-slide {
            background-position: center;
            background-size: cover;
            opacity: 0;
            transform: scale(1.02);
            animation: hero-fade 18s infinite;
        }

        .hero-slide-1 {
            background-image: url("<?= asset_url('assets/images/GB+Domestic+Appliance+Repairs-011.jpg') ?>");
            animation-delay: 0s;
        }

        .hero-slide-2 {
            background-image: url("<?= asset_url('assets/images/shutterstock_1081332008.jpg') ?>");
            animation-delay: 6s;
        }

        .hero-slide-3 {
            background-image: url("<?= asset_url('assets/images/Manhattan-Appliance-LLC-020.jpg') ?>");
            animation-delay: 12s;
        }

        .hero-slideshow::after {
            content: "";
            background: linear-gradient(180deg, rgba(12, 26, 38, 0.45), rgba(12, 26, 38, 0.56));
        }

        .testimonial-slider {
            --testimonial-slide-width: clamp(290px, 28vw, 380px);
            --testimonial-gap: 28px;
            --testimonial-step: calc(var(--testimonial-slide-width) + var(--testimonial-gap));
            overflow: hidden;
        }

        .testimonial-track {
            display: flex;
            gap: var(--testimonial-gap);
            width: max-content;
            animation: testimonial-scroll 20s ease-in-out infinite;
        }

        .testimonial-slide {
            flex: 0 0 var(--testimonial-slide-width);
        }

        .testimonial-dots span {
            width: 12px;
            height: 12px;
            border-radius: 999px;
            background: #e5e7eb;
            animation: testimonial-dot-cycle 20s infinite;
            display: inline-block;
        }

        .testimonial-dots span:nth-child(1) { animation-delay: 0s; }
        .testimonial-dots span:nth-child(2) { animation-delay: 4s; }
        .testimonial-dots span:nth-child(3) { animation-delay: 8s; }
        .testimonial-dots span:nth-child(4) { animation-delay: 12s; }
        .testimonial-dots span:nth-child(5) { animation-delay: 16s; }

        .service-area-banner-image {
            background-image: url("<?= asset_url('assets/images/shutterstock_2473408983.jpg') ?>");
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
        }

        .service-area-banner-image::after {
            content: "";
            background: rgba(15, 23, 42, 0.48);
        }

        @keyframes hero-fade {
            0%, 28% { opacity: 0; }
            33%, 61% { opacity: 1; }
            66%, 100% { opacity: 0; }
        }

        @keyframes testimonial-scroll {
            0%, 15% { transform: translateX(0); }
            20%, 35% { transform: translateX(calc(-1 * var(--testimonial-step))); }
            40%, 55% { transform: translateX(calc(-2 * var(--testimonial-step))); }
            60%, 75% { transform: translateX(calc(-3 * var(--testimonial-step))); }
            80%, 95% { transform: translateX(calc(-4 * var(--testimonial-step))); }
            100% { transform: translateX(calc(-5 * var(--testimonial-step))); }
        }

        @keyframes testimonial-dot-cycle {
            0%, 15% { background: #111827; transform: scale(1); }
            20%, 100% { background: #e5e7eb; transform: scale(0.92); }
        }

        @media (max-width: 900px) {
            .testimonial-slider {
                --testimonial-slide-width: min(70vw, 420px);
            }

            .service-area-banner-image {
                background-attachment: scroll;
            }
        }

        @media (max-width: 640px) {
            .testimonial-slider {
                --testimonial-slide-width: 82vw;
                --testimonial-gap: 18px;
            }
        }
    </style>
</head>
<body class="bg-white font-sans text-brand-ink">
<div class="min-h-screen bg-white">
    <header class="border-b border-brand-line bg-white">
        <div class="sticky top-0 z-[90] border-b border-brand-line bg-white/95 shadow-sm backdrop-blur lg:static lg:border-b-0 lg:bg-white lg:shadow-none">
            <div class="mx-auto flex w-full max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
            <a class="flex items-center gap-3 text-brand-ink no-underline" href="<?= page_url('home') ?>">
                <img class="w-14 sm:w-20" src="<?= asset_url('assets/images/logo.png') ?>" alt="<?= htmlspecialchars($site['name']) ?> logo">
                <span class="hidden text-xl font-semibold tracking-tight sm:inline"><?= htmlspecialchars($site['name']) ?></span>
            </a>
            <div class="hidden flex-wrap items-center justify-end gap-5 text-sm font-medium text-slate-600 lg:flex">
                <a class="transition hover:text-brand-blue" href="<?= htmlspecialchars($site['phone_href']) ?>"><?= htmlspecialchars($site['phone']) ?></a>
                <a class="transition hover:text-brand-blue" href="<?= htmlspecialchars($site['email_href']) ?>"><?= htmlspecialchars($site['email']) ?></a>
            </div>
            <button
                type="button"
                class="inline-flex h-11 w-11 items-center justify-center rounded-full text-brand-blue transition hover:bg-brand-soft lg:hidden"
                aria-label="Toggle menu"
                aria-expanded="false"
                data-mobile-menu-button
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" data-mobile-menu-open-icon>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" data-mobile-menu-close-icon>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18" />
                </svg>
            </button>
        </div>
        </div>
        <div class="border-t border-brand-line/80 bg-white px-4 py-4 lg:hidden">
            <div class="mx-auto flex w-full max-w-7xl justify-center">
                <a class="inline-flex min-w-[180px] items-center justify-center rounded-full bg-brand-blue px-7 py-3 text-base font-semibold text-white transition hover:bg-sky-800" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer">Book Online</a>
            </div>
        </div>
        <div class="border-t border-brand-line/80 bg-white/95 backdrop-blur">
            <div class="mx-auto hidden w-full max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:flex lg:px-8">
                <nav aria-label="Primary">
                    <ul class="flex flex-wrap items-center gap-x-6 gap-y-3 text-[15px] font-semibold text-slate-600">
                    <?php foreach ($navItems as $slug => $item): ?>
                        <li>
                            <a class="transition hover:text-brand-blue<?= $slug === $currentPage ? ' text-brand-blue' : '' ?>" href="<?= htmlspecialchars($item['href']) ?>">
                                <?= htmlspecialchars($item['label']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </nav>
                <a class="inline-flex items-center justify-center rounded-full bg-brand-blue px-7 py-3 text-base font-semibold text-white transition hover:bg-sky-800" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer">Book Online</a>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Sidebar -->
    <div class="fixed inset-0 z-[100] opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden" data-mobile-menu>
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm" data-mobile-menu-close></div>
        
        <!-- Sidebar -->
        <div class="fixed inset-y-0 right-0 flex w-[66.6667vw] max-w-[66.6667vw] translate-x-full flex-col bg-brand-blue shadow-2xl transition-transform duration-300 ease-out" data-mobile-menu-drawer>
            <div class="flex items-center justify-end p-5">
                <button type="button" class="p-2 text-white/80 hover:text-white" data-mobile-menu-close aria-label="Close menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <nav class="flex-1 overflow-y-auto px-8 py-4">
                <ul class="space-y-7">
                    <?php foreach ($navItems as $slug => $item): ?>
                        <li>
                            <a class="block text-xl font-semibold text-white/90 transition hover:text-white <?= $slug === $currentPage ? 'text-white' : '' ?>" href="<?= htmlspecialchars($item['href']) ?>" data-mobile-menu-close>
                                <?= htmlspecialchars($item['label']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="mt-12 border-t border-white/10 pt-10 text-white/85">
                    <div class="space-y-4 text-base font-medium">
                        <a class="block hover:text-white" href="<?= htmlspecialchars($site['phone_href']) ?>" data-mobile-menu-close><?= htmlspecialchars($site['phone']) ?></a>
                        <a class="block break-all hover:text-white" href="<?= htmlspecialchars($site['email_href']) ?>" data-mobile-menu-close><?= htmlspecialchars($site['email']) ?></a>
                    </div>
                </div>
                <div class="mt-10 border-t border-white/10 pt-10">
                    <a class="inline-flex w-full items-center justify-center rounded-full bg-white px-7 py-4 text-lg font-bold text-brand-blue transition hover:bg-slate-100" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer">Book Online</a>
                </div>
            </nav>
        </div>
    </div>

    <main>
<?php
}

function render_footer(array $site): void
{
    ?>
    </main>
    <footer class="mt-0 bg-white">
        <div class="bg-brand-blue py-12 text-center text-white sm:py-24">
            <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="mx-auto max-w-[280px] text-3xl font-normal leading-tight tracking-tight sm:max-w-none sm:text-5xl">Reliable Appliance Repair Starts Here</h2>
            </div>
        </div>
        <div class="bg-white py-12 sm:py-20">
            <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-[1.15fr_1fr_1fr_0.7fr] lg:px-8">
                <div class="flex justify-center sm:col-span-2 lg:col-span-1">
                    <img class="w-32 sm:w-48" src="<?= asset_url('assets/images/logo.png') ?>" alt="<?= htmlspecialchars($site['name']) ?> logo">
                </div>
                <div class="text-center">
                    <h3 class="mb-4 text-xl font-medium text-brand-blue sm:text-2xl">Contact</h3>
                    <p class="mb-1 text-[1rem] text-slate-700 sm:text-lg"><a class="text-brand-blue hover:underline" href="<?= htmlspecialchars($site['phone_href']) ?>"><?= htmlspecialchars($site['phone']) ?></a></p>
                    <p class="text-[1rem] text-slate-700 sm:text-lg"><a class="break-all text-brand-blue hover:underline sm:break-normal" href="<?= htmlspecialchars($site['email_href']) ?>"><?= htmlspecialchars($site['email']) ?></a></p>
                </div>
                <div class="mx-auto w-full max-w-[280px] text-center sm:max-w-sm">
                    <h3 class="mb-4 text-xl font-medium text-brand-blue sm:text-2xl">Opening Hours</h3>
                    <div class="mb-1 flex items-center justify-between gap-10 text-[1rem] text-slate-700 sm:text-lg"><span>Mon - Fri</span><span>9:00 - 17:00</span></div>
                    <div class="flex items-center justify-between gap-10 text-[1rem] text-slate-700 sm:text-lg"><span>Sat - Sun</span><span>Closed</span></div>
                </div>
                <div class="flex items-center justify-center sm:col-span-2 lg:col-span-1 lg:items-start lg:pt-12">
                    <ul class="flex items-center gap-6 text-brand-blue">
                        <li>
                            <a class="inline-flex h-11 w-11 items-center justify-center rounded-full transition hover:bg-brand-blue/10" href="<?= htmlspecialchars($site['socials']['Instagram']) ?>" target="_blank" rel="noreferrer" aria-label="Instagram">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current" aria-hidden="true"><path d="M7.5 2h9A5.5 5.5 0 0 1 22 7.5v9A5.5 5.5 0 0 1 16.5 22h-9A5.5 5.5 0 0 1 2 16.5v-9A5.5 5.5 0 0 1 7.5 2Zm0 1.8A3.7 3.7 0 0 0 3.8 7.5v9a3.7 3.7 0 0 0 3.7 3.7h9a3.7 3.7 0 0 0 3.7-3.7v-9a3.7 3.7 0 0 0-3.7-3.7h-9Zm9.65 1.35a1.05 1.05 0 1 1 0 2.1 1.05 1.05 0 0 1 0-2.1ZM12 6.6A5.4 5.4 0 1 1 6.6 12 5.4 5.4 0 0 1 12 6.6Zm0 1.8A3.6 3.6 0 1 0 15.6 12 3.6 3.6 0 0 0 12 8.4Z"/></svg>
                            </a>
                        </li>
                        <li>
                            <a class="inline-flex h-11 w-11 items-center justify-center rounded-full transition hover:bg-brand-blue/10" href="<?= htmlspecialchars($site['socials']['Facebook']) ?>" target="_blank" rel="noreferrer" aria-label="Facebook">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current" aria-hidden="true"><path d="M13.4 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.2-1.5 1.5-1.5h1.7V3.6c-.3 0-1.3-.1-2.5-.1-2.4 0-4.1 1.5-4.1 4.3v2.1H7.3V13h2.6v8h3.5Z"/></svg>
                            </a>
                        </li>
                        <li>
                            <a class="inline-flex h-11 w-11 items-center justify-center rounded-full transition hover:bg-brand-blue/10" href="<?= htmlspecialchars($site['socials']['LinkedIn']) ?>" target="_blank" rel="noreferrer" aria-label="LinkedIn">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current" aria-hidden="true"><path d="M6.94 8.5H3.56V20h3.38V8.5ZM5.25 3A1.97 1.97 0 1 0 5.3 6.94 1.97 1.97 0 0 0 5.25 3ZM20.44 12.9c0-3.46-1.84-5.07-4.3-5.07a3.73 3.73 0 0 0-3.36 1.85V8.5H9.4c.04.78 0 11.5 0 11.5h3.38v-6.42c0-.34.02-.68.13-.92a2.22 2.22 0 0 1 2.08-1.48c1.47 0 2.06 1.12 2.06 2.76V20h3.39v-7.1Z"/></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="relative bg-black py-5 text-center text-white/85">
            <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <p class="text-[0.75rem] sm:text-base">&copy; <?= date('Y') ?> All Rights Reserved | <?= htmlspecialchars($site['name']) ?></p>
            </div>
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="absolute right-4 top-1/2 -translate-y-1/2 rounded bg-slate-800 p-2 text-white transition hover:bg-slate-700 sm:right-8" aria-label="Scroll to top">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            </button>
        </div>
    </footer>
</div>
</body>
</html>
<?php
}

function render_cta(array $site, string $title, string $copy): void
{
    ?>
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto w-full max-w-6xl rounded-[28px] border border-brand-line bg-white px-8 py-10 shadow-panel">
            <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-brand-blue">Schedule Service</p>
                    <h2 class="mb-3 text-3xl font-semibold tracking-tight text-brand-ink sm:text-4xl"><?= htmlspecialchars($title) ?></h2>
                    <p class="max-w-2xl text-lg leading-8 text-slate-600"><?= htmlspecialchars($copy) ?></p>
                </div>
                <div class="flex flex-col gap-4 sm:flex-row">
                    <a class="inline-flex items-center justify-center rounded-full bg-brand-blue px-7 py-3 text-base font-semibold text-white transition hover:bg-sky-800" href="<?= htmlspecialchars($site['book_url']) ?>" target="_blank" rel="noreferrer">Book Online</a>
                    <a class="inline-flex items-center justify-center rounded-full border border-brand-line bg-white px-7 py-3 text-base font-semibold text-brand-blue transition hover:border-brand-blue/40 hover:bg-brand-soft" href="<?= htmlspecialchars($site['phone_href']) ?>">Call <?= htmlspecialchars($site['phone']) ?></a>
                </div>
            </div>
        </div>
    </section>
<?php
}
