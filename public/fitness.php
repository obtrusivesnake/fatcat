<?php
$page_title = "Fitness Classes | Fatcat Ballroom & Dance Company";

// ─────────────────────────────────────────────────────────────
// Fitness class data
// ─────────────────────────────────────────────────────────────
$fitness_classes = [
    [
        "name" => "Zumba",
        "instructor" => "Sarah Lloyd, Lexi Kenrick, Judy &amp; Jill",
        "schedule" => "Every day except Tuesdays",
        "time" => "9:15 AM",
        "price" => 5,
        "price_label" => '$5',
        "by_request" => false,
        "description" =>
            "Dance your way to fitness! This high-energy class blends easy-to-follow dance moves with upbeat Latin and international music for a feel-good workout. No experience needed &mdash; just bring your energy and have fun while you sweat.",
    ],
    [
        "name" => "Strength Training",
        "instructor" => "Sarah Lloyd",
        "schedule" => "Tuesday &amp; Thursday &middot; By request",
        "time" => "8:15 AM",
        "price" => 8,
        "price_label" => '$8',
        "by_request" => true,
        "description" =>
            "Build strength, tone muscle, and boost your energy with this resistance-based workout. Perfect for all fitness levels, you&rsquo;ll work at your own pace while building a stronger, healthier body.",
    ],
    [
        "name" => "Holy Yoga",
        "instructor" => "Haley Cloud",
        "schedule" => "Tuesdays",
        "time" => "9:15 AM",
        "price" => 5,
        "price_label" => '$5',
        "by_request" => false,
        "description" =>
            "Connect mind, body, and spirit in this faith-centered yoga practice. Move through gentle stretches and poses designed to bring relaxation, flexibility, and peace. All experience levels are welcome.",
    ],
    [
        "name" => "Chair Yoga",
        "instructor" => "Patricia",
        "schedule" => "Fridays",
        "time" => "11:00 AM",
        "price" => 5,
        "price_label" => '$5',
        "by_request" => false,
        "description" =>
            "Enjoy the benefits of yoga from the comfort of a chair. This gentle, accessible class improves flexibility, balance, and circulation &mdash; ideal for those who prefer a low-impact, supportive practice.",
    ],
];
?>
<?php include "includes/header.php"; ?>

<!-- ── Hero ─────────────────────────────────────────────────── -->
<section class="pt-32 pb-14 sm:pb-16 px-4 border-b border-white/[0.06]">
    <div class="max-w-4xl mx-auto text-center">
        <p class="text-[#c9a96e] text-xs uppercase tracking-[0.3em] mb-5">Feel-good fitness, yoga &amp; more</p>
        <h1 class="font-display text-4xl sm:text-5xl text-white font-normal mb-6 leading-tight">
            Fitness Classes
        </h1>
        <p class="text-base text-stone-400 leading-relaxed max-w-xl mx-auto">
            Independent instructors offer feel-good fitness, yoga, and dance classes at our studio
            for increased energy, relaxation, and fun. Check the weekly lineup below and join us &mdash;
            no registration required.
        </p>
    </div>
</section>

<!-- ── Class grid ───────────────────────────────────────────── -->
<section class="py-20 md:py-28">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-white/[0.12]">

            <?php foreach ($fitness_classes as $class): ?>
                <article class="bg-stone-950 p-6 sm:p-8 flex flex-col">

                    <!-- Schedule + Time header -->
                    <div class="flex items-baseline justify-between gap-4 mb-5">
                        <span class="text-xs uppercase tracking-[0.2em] text-[#c9a96e]">
                            <?php echo $class["schedule"]; ?>
                        </span>
                        <span class="text-xs uppercase tracking-[0.15em] text-stone-400">
                            <?php echo $class["time"]; ?>
                        </span>
                    </div>

                    <!-- Class name -->
                    <h3 class="text-white text-lg font-medium tracking-wide leading-snug mb-1">
                        <?php echo $class["name"]; ?>
                    </h3>

                    <!-- Instructor -->
                    <p class="text-sm text-stone-500 mb-4">
                        <?php echo $class["instructor"]; ?>
                    </p>

                    <!-- Description -->
                    <p class="text-stone-400 text-sm leading-relaxed mb-4 flex-1">
                        <?php echo $class["description"]; ?>
                    </p>

                    <!-- By-request note -->
                    <?php if ($class["by_request"]): ?>
                        <p class="text-stone-600 text-xs tracking-wide mb-5">
                            Available upon request &mdash; please call or text the day before to attend.
                        </p>
                    <?php endif; ?>

                    <!-- Price + Action -->
                    <div class="flex items-end justify-between gap-4 mt-auto pt-5">
                        <span class="font-display text-2xl text-white"><?php echo $class[
                            "price_label"
                        ]; ?></span>
                        <span class="text-sm text-stone-600 tracking-wide">Walk in</span>
                    </div>

                </article>
            <?php endforeach; ?>
            <?php if (count($fitness_classes) % 2 !== 0): ?>
                <div class="bg-stone-950"></div>
            <?php endif; ?>

        </div>

    </div>
</section>

<!-- ── Reservation note ─────────────────────────────────────── -->
<section class="pb-20 md:pb-28">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
        <div class="border-t border-white/[0.06] pt-12">
            <!-- Phone icon -->
            <svg class="w-10 h-10 text-[#c9a96e] mb-5 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
            </svg>
            <h2 class="font-display text-2xl sm:text-3xl text-white mb-4 font-normal leading-snug">
                Classes available on request
            </h2>
            <p class="text-stone-400 text-lg leading-relaxed mb-6">
                Strength Training is offered upon request. To attend, please call or text the day before
                so the instructor can plan accordingly.
            </p>
            <a href="tel:6023320152"
               class="inline-flex items-center bg-[#c9a96e] hover:bg-[#d4b87d] text-stone-950 font-semibold text-sm px-6 py-3 rounded transition-colors tracking-wide">
                Call or text (602) 332-0152
            </a>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>
