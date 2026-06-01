<?php snippet("header"); ?>

<?php if ($page->blocks()->isNotEmpty()): ?>
    <?= $page->blocks()->toBlocks() ?>
<?php else: ?>
    <section class="pt-32 pb-20 px-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="font-display text-4xl sm:text-5xl text-white font-normal mb-8 leading-tight">
                <?= $page->title()->html() ?>
            </h1>
            <?php if ($page->text()->isNotEmpty()): ?>
                <div class="text-stone-400 text-lg leading-relaxed prose-invert">
                    <?= $page->text()->kt() ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php snippet("footer"); ?>
