<?php
/**
 * Page Header block
 *
 * A generic, centered page header used at the top of interior pages. It
 * supports an optional decorative icon, a small uppercase "eyebrow" line, the
 * main title, and an optional subtitle/intro paragraph. Every field is
 * editable in the Panel and each is optional except the title.
 */

$iconKey = $block->icon()->value();
$hasIcon = $iconKey && $iconKey !== "none";
?>

<section class="pt-32 pb-8 sm:pb-8 px-4<?= $block->divider()->isTrue()
  ? " border-b border-white/[0.06]"
  : "" ?>">
    <div class="max-w-4xl mx-auto text-center">

        <?php if ($hasIcon): ?>
            <?= icon($iconKey, "w-12 h-12 text-[#c9a96e] mx-auto mb-6") ?>
        <?php endif; ?>

        <?php if ($block->eyebrow()->isNotEmpty()): ?>
            <p class="text-[#c9a96e] text-xs uppercase tracking-[0.3em] mb-5"><?= $block
              ->eyebrow()
              ->html() ?></p>
        <?php endif; ?>

        <h1 class="font-display text-4xl sm:text-5xl text-white font-normal mb-6 leading-tight">
            <?= $block->heading()->html() ?>
        </h1>

        <?php if ($block->subheading()->isNotEmpty()): ?>
            <p class="text-base text-stone-400 leading-relaxed mt-4 max-w-xl mx-auto">
                <?= $block->subheading()->html() ?>
            </p>
        <?php endif; ?>

    </div>
</section>
