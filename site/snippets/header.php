<?php snippet('icons') ?>
<?php
/**
 * Site header snippet
 *
 * Renders the document <head>, opening <body>, and the fixed top navigation.
 * All editable values (site name, phone, navigation links, booking link) are
 * pulled from the site's content so the client can manage them in the Panel.
 */

$site  = $site ?? site();
$phone = $site->phone()->or('(602) 324-7119');
$tel   = preg_replace('/[^0-9+]/', '', $phone->value());

// Page <title>: prefer the page's own SEO/meta title, fall back to page + site title.
if ($page->isHomePage()) {
    $metaTitle = $site->title();
} else {
    $metaTitle = $page->title() . ' | ' . $site->title();
}

// Booking link (where the "Book Online" buttons point).
$bookingUrl = $site->booking_url()->or('/classes');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($metaTitle) ?></title>

    <?php if ($page->meta_description()->isNotEmpty()): ?>
        <meta name="description" content="<?= esc($page->meta_description()) ?>">
    <?php elseif ($site->meta_description()->isNotEmpty()): ?>
        <meta name="description" content="<?= esc($site->meta_description()) ?>">
    <?php endif ?>

    <link rel="icon" href="<?= url('assets/favicon.svg') ?>" type="image/svg+xml">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom styles -->
    <link rel="stylesheet" href="<?= url('assets/custom.css') ?>">
</head>
<body>

<div class="min-h-screen bg-stone-950 text-stone-300 antialiased font-body">

    <nav class="fixed top-0 left-0 right-0 z-50 bg-stone-950/80 backdrop-blur-xl border-b border-white/[0.06]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo lock-up -->
                <a href="<?= url('/') ?>" class="flex items-center gap-3">
                    <img src="<?= url('assets/fatcat.png') ?>" class="w-10 h-10" alt="">
                    <div class="hidden sm:block leading-tight">
                        <span class="font-display text-white text-sm font-medium tracking-wide"><?= esc($site->title()) ?></span>
                        <span class="block text-stone-500 text-[10px] uppercase tracking-[0.25em] mt-0.5"><?= esc($site->nav_tagline()->or('& Dance Company')) ?></span>
                    </div>
                </a>

                <!-- Desktop nav links -->
                <div class="hidden md:flex items-center gap-8">
                    <?php foreach ($site->navigation()->toStructure() as $link): ?>
                        <a href="<?= esc($link->url()) ?>"
                           class="text-[13px] text-stone-400 hover:text-white transition-colors duration-300 tracking-widest uppercase">
                            <?= esc($link->label()) ?>
                        </a>
                    <?php endforeach ?>
                </div>

                <div class="flex lg:hidden"></div>

                <!-- Desktop CTAs -->
                <div class="hidden lg:flex items-center gap-6">
                    <a href="tel:<?= esc($tel) ?>" class="text-sm text-stone-500 hover:text-white transition-colors">
                        <?= esc($phone) ?>
                    </a>
                    <a href="<?= esc($bookingUrl) ?>" class="text-[13px] font-semibold tracking-wide px-6 py-2.5 rounded bg-[#c9a96e] hover:bg-[#d4b87d] text-stone-950 transition-colors">
                        Book Online
                    </a>
                </div>

                <!-- Mobile hamburger -->
                <button class="md:hidden p-2 -mr-2 text-stone-400 hover:text-white transition"
                        onclick="toggleMenu()"
                        aria-label="Toggle menu"
                        id="menu-toggle">
                    <svg id="icon-hamburger" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
        </div>

        <!-- Mobile dropdown -->
        <div id="mobile-menu" class="md:hidden bg-stone-900 border-t border-white/[0.06] px-6 pb-6 pt-4 space-y-1 hidden">
            <?php foreach ($site->navigation()->toStructure() as $link): ?>
                <a href="<?= esc($link->url()) ?>"
                   class="block text-stone-300 hover:text-white py-3 text-base tracking-wide"
                   onclick="closeMenu()">
                    <?= esc($link->label()) ?>
                </a>
            <?php endforeach ?>
            <hr class="border-white/[0.06] !my-4">
            <a href="tel:<?= esc($tel) ?>" class="block text-stone-400 py-3 text-base"><?= esc($phone) ?></a>
            <a href="<?= esc($bookingUrl) ?>"
               class="block text-center font-semibold py-3.5 rounded tracking-wide mt-2 bg-[#c9a96e] text-stone-950"
               onclick="closeMenu()">
                Book Online
            </a>
        </div>
    </nav>

    <script>
    function toggleMenu() {
        var menu      = document.getElementById('mobile-menu');
        var iconOpen  = document.getElementById('icon-hamburger');
        var iconClose = document.getElementById('icon-close');

        menu.classList.toggle('hidden');
        iconOpen.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');
    }

    function closeMenu() {
        var menu      = document.getElementById('mobile-menu');
        var iconOpen  = document.getElementById('icon-hamburger');
        var iconClose = document.getElementById('icon-close');

        menu.classList.add('hidden');
        iconClose.classList.add('hidden');
        iconOpen.classList.remove('hidden');
    }
    </script>

    <main>
