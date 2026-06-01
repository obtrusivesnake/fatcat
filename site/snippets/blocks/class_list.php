<?php
/**
 * Class Listing block
 *
 * Reads the studio's group classes from the "classes" parent page (each class
 * is a subpage managed in the Panel) and renders them as a grid. This block
 * carries no class content itself — editing a class is done on its own page,
 * so the data stays consistent everywhere it is used across the site.
 */

$classesPage = page("classes");
$classes = $classesPage
  ? $classesPage->children()->listed()
  : new Kirby\Cms\Pages();

// Map the lowercase day key stored in the field to a readable label.
$dayLabels = [
  "sunday" => "Sunday",
  "monday" => "Monday",
  "tuesday" => "Tuesday",
  "wednesday" => "Wednesday",
  "thursday" => "Thursday",
  "friday" => "Friday",
  "saturday" => "Saturday",
];

$levelLabels = [
  "all-levels" => "All Levels",
  "beginner" => "Beginner",
  "intermediate" => "Intermediate",
  "advanced" => "Advanced",
];
?>

<section class="pb-20 md:pb-28">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <?php if ($block->heading()->isNotEmpty()): ?>
            <h2 class="font-display text-3xl sm:text-4xl text-white mb-10 font-normal leading-snug text-center">
                <?= $block->heading()->html() ?>
            </h2>
        <?php endif; ?>

        <?php if ($classes->isEmpty()): ?>
            <p class="text-center text-stone-500">Classes will be listed here soon. Check back shortly!</p>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-white/[0.12]">
                <?php foreach ($classes as $class): ?>
                    <?php
                    $dayKey = $class->day()->value();
                    $dayLabel = $dayLabels[$dayKey] ?? $dayKey;
                    $levelKey = $class->level()->value();
                    $level = $levelLabels[$levelKey] ?? $levelKey;
                    $isFree = (int) $class->price()->value() === 0;
                    ?>
                    <article class="bg-stone-950 p-6 sm:p-8 flex flex-col">

                        <!-- Day + Time header -->
                        <div class="flex items-baseline justify-between gap-4 mb-5">
                            <span class="text-xs uppercase tracking-[0.2em] text-[#c9a96e]">
                                <?= esc($dayLabel) ?>
                            </span>
                            <span class="text-xs uppercase tracking-[0.15em] text-stone-400">
                                <?= esc($class->class_time()) ?>
                            </span>
                        </div>

                        <!-- Class name -->
                        <h3 class="text-white text-lg font-medium tracking-wide leading-snug mb-1">
                            <?= esc($class->title()) ?>
                        </h3>

                        <!-- Instructor + Level -->
                        <p class="text-sm text-stone-500 mb-4">
                            <?php if ($class->instructor()->isNotEmpty()): ?>
                                <?= esc($class->instructor()) ?> &middot;
                            <?php endif; ?>
                            <?= esc($level) ?>
                        </p>

                        <!-- Description -->
                        <?php if ($class->description()->isNotEmpty()): ?>
                            <p class="text-stone-400 text-sm leading-relaxed mb-4 flex-1">
                                <?= esc($class->description()) ?>
                            </p>
                        <?php else: ?>
                            <div class="flex-1"></div>
                        <?php endif; ?>

                        <!-- Note -->
                        <?php if ($class->note()->isNotEmpty()): ?>
                            <p class="text-stone-600 text-xs tracking-wide mb-5">
                                <?= esc($class->note()) ?>
                            </p>
                        <?php endif; ?>

                        <!-- Price + Action -->
                        <div class="flex items-end justify-between gap-4 mt-auto pt-5">
                            <?php if ($isFree): ?>
                                <span class="font-display text-2xl text-emerald-400 italic">Free</span>
                                <span class="text-sm text-stone-600 tracking-wide">Walk in</span>
                            <?php else: ?>
                                <span class="font-display text-2xl text-white"><?= esc(
                                  $class
                                    ->price_label()
                                    ->or('$' . $class->price()->value()),
                                ) ?></span>
                                <a href="<?= $class->url() ?>" class="inline-flex items-center bg-[#c9a96e] hover:bg-[#d4b87d] text-stone-950 font-semibold text-sm px-5 py-2.5 rounded transition-colors tracking-wide">
                                    Reserve
                                    <svg class="w-3.5 h-3.5 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                                </a>
                            <?php endif; ?>
                        </div>

                    </article>
                <?php endforeach; ?>
                <?php if ($classes->count() % 2 !== 0): ?>
                    <div class="bg-stone-950"></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
