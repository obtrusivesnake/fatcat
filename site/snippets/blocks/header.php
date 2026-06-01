<section class="pt-32 pb-14 sm:pb-16 px-4">
    <div class="max-w-4xl mx-auto text-center">
        <?php if ($block->eyebrow()->isNotEmpty()): ?>
            <p class="text-[#c9a96e] text-xs uppercase tracking-[0.3em] mb-5"><?= $block
              ->eyebrow()
              ->html() ?></p>
        <?php endif; ?>
        <h1 class="font-display text-4xl sm:text-5xl text-white font-normal mb-6 leading-tight">
            <?= $block->heading()->html() ?>
        </h1>
        <?php if ($block->subheading()->isNotEmpty()): ?>
            <p class="text-base text-stone-400 leading-relaxed mt-4 max-w-xl mx-auto whitespace-pre-wrap"><?= $block
              ->subheading()
              ->kt() ?></p>
        <?php endif; ?>
    </div>
</section>
