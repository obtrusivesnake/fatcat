<?php
/**
 * Fitness Listing block
 *
 * Reads the studio's fitness classes from the "fitness" parent page (each
 * fitness class is a subpage managed in the Panel) and renders them as a grid.
 * Like the group-class listing, this block carries no class content itself —
 * editing a fitness class happens on its own page so the data stays consistent
 * everywhere it is used across the site.
 */

$fitnessPage = page("fitness");
$classes = $fitnessPage
  ? $fitnessPage->children()->listed()
  : new Kirby\Cms\Pages();
?>

<section class="pb-20 md:pb-28">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <?php if ($block->heading()->isNotEmpty()): ?>
            <h2 class="font-display text-3xl sm:text-4xl text-white mb-10 font-normal leading-snug text-center">
                <?= $block->heading()->html() ?>
            </h2>
        <?php endif; ?>

        <?php if ($classes->isEmpty()): ?>
            <p class="text-center text-stone-500">Fitness classes will be listed here soon. Check back shortly!</p>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-white/[0.12]">

                <?php foreach ($classes as $class): ?>
                    <?php $isFree = (int) $class->price()->value() === 0; ?>
                    <article class="bg-stone-950 p-6 sm:p-8 flex flex-col">

                        <!-- Schedule + Time header -->
                        <div class="flex items-baseline justify-between gap-4 mb-5">
                            <span class="text-xs uppercase tracking-[0.2em] text-[#c9a96e]">
                                <?= esc($class->schedule()) ?>
                            </span>
                            <span class="text-xs uppercase tracking-[0.15em] text-stone-400">
                                <?= esc($class->class_time()) ?>
                            </span>
                        </div>

                        <!-- Class name -->
                        <h3 class="text-white text-lg font-medium tracking-wide leading-snug mb-1">
                            <?= esc($class->title()) ?>
                        </h3>

                        <!-- Instructor -->
                        <?php if ($class->instructor()->isNotEmpty()): ?>
                            <p class="text-sm text-stone-500 mb-4">
                                <?= esc($class->instructor()) ?>
                            </p>
                        <?php endif; ?>

                        <!-- Description -->
                        <?php if ($class->description()->isNotEmpty()): ?>
                            <p class="text-stone-400 text-sm leading-relaxed mb-4 flex-1">
                                <?= esc($class->description()) ?>
                            </p>
                        <?php else: ?>
                            <div class="flex-1"></div>
                        <?php endif; ?>

                        <!-- By-request note -->
                        <?php if ($class->by_request()->isTrue()): ?>
                            <p class="text-stone-600 text-xs tracking-wide mb-5">
                                <?= esc(
                                  $class
                                    ->request_note()
                                    ->or(
                                      "Available upon request — please call or text the day before to attend.",
                                    ),
                                ) ?>
                            </p>
                        <?php endif; ?>

                        <!-- Price + Action -->
                        <div class="flex items-end justify-between gap-4 mt-auto pt-5">
                            <?php if ($isFree): ?>
                                <span class="font-display text-2xl text-emerald-400 italic">Free</span>
                            <?php else: ?>
                                <span class="font-display text-2xl text-white"><?= esc(
                                  $class
                                    ->price_label()
                                    ->or('$' . $class->price()->value()),
                                ) ?></span>
                            <?php endif; ?>
                            <span class="text-sm text-stone-600 tracking-wide">Walk in</span>
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
