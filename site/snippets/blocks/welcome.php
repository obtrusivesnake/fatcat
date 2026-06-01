<?php
// site/snippets/blocks/welcome.php - Dynamic Welcome section
?>

<section class="py-20 sm:py-28 px-4">
    <div class="max-w-3xl mx-auto text-center">
        <img src="/assets/cat_icon.svg" alt="" class="w-12 h-12 mx-auto mb-4">
        <?php if ($block->heading()->isNotEmpty()): ?>
        <h2 class="font-display text-3xl sm:text-4xl text-white mb-8 font-normal leading-snug">
            <?= $block->heading()->html() ?>
        </h2>
        <?php endif ?>
        <?php if ($block->text()->isNotEmpty()): ?>
        <div class="text-lg text-stone-400 leading-relaxed">
            <?= $block->text()->kt() ?>
        </div>
        <?php endif ?>
    </div>
</section>
