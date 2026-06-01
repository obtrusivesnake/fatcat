<?php
/**
 * Trust Strip block
 *
 * A horizontal strip of reassurance points (e.g. "Walk in anytime",
 * "No partner needed") shown below the hero. Each point is an editable item
 * with a chosen icon, a short title, and a one-line description, so the client
 * can add, remove, or reorder points freely in the Panel.
 */

$items = $block->items()->toStructure();
?>

<?php if ($items->isNotEmpty()): ?>
<section class="border-y border-white/[0.06]">
    <div class="max-w-5xl mx-auto px-4 py-12 sm:py-14 grid grid-cols-2 md:grid-cols-4 gap-10 md:gap-12">

        <?php foreach ($items as $item): ?>
            <?php $iconKey = $item->icon()->or('check')->value(); ?>
            <div class="text-center">
                <?= icon($iconKey, 'w-7 h-7 mx-auto mb-3 text-[#c9a96e]') ?>
                <div class="text-white text-sm sm:text-base font-medium tracking-wide"><?= esc($item->title()) ?></div>
                <?php if ($item->description()->isNotEmpty()): ?>
                    <div class="text-stone-500 text-xs sm:text-sm mt-1.5"><?= esc($item->description()) ?></div>
                <?php endif ?>
            </div>
        <?php endforeach ?>

    </div>
</section>
<?php endif ?>
