<?php
$iconKey = $block->section_icon()->value();
$hasIcon = $iconKey && $iconKey !== "none";
?>
<section class="py-20 md:py-28">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row-reverse items-center gap-12 md:gap-16">
            <div class="w-full md:w-1/2">
                <?php if ($image = $block->image()->toFile()): ?>
                    <img src="<?= $image->url() ?>" alt="<?= $block->heading() ?>" class="w-full aspect-[4/3] object-cover">
                <?php endif; ?>
            </div>
            <div class="w-full md:w-1/2">
                <?php if ($hasIcon): ?>
                    <?= icon($iconKey, "w-12 h-12 text-[#c9a96e] mb-5") ?>
                <?php endif; ?>
                <?php if ($block->eyebrow()->isNotEmpty()): ?>
                    <p class="text-[#c9a96e] text-xs uppercase tracking-[0.25em] mb-3"><?= $block
                      ->eyebrow()
                      ->html() ?></p>
                <?php endif; ?>
                <h2 class="font-display text-3xl sm:text-4xl text-white mb-5 font-normal leading-snug">
                    <?= $block->heading()->html() ?>
                </h2>
                <?php if ($block->text()->isNotEmpty()): ?>
                    <div class="text-stone-400 text-lg leading-relaxed mb-6 whitespace-pre-wrap"><?= $block
                      ->text()
                      ->kt() ?></div>
                <?php endif; ?>
                <?php if ($block->link_url()->isNotEmpty()): ?>
                    <?php if ($block->show_button()->isTrue()): ?>
                        <a href="<?= $block->link_url() ?>" class="inline-flex items-center bg-[#c9a96e] hover:bg-[#d4b87d] text-stone-950 font-semibold px-7 py-3.5 rounded transition-colors tracking-wide">
                            <?= $block->link_text() ?>
                            <?= icon("arrow-right", "w-4 h-4 ml-2") ?>
                        </a>
                    <?php else: ?>
                        <a href="<?= $block->link_url() ?>" class="inline-flex items-center text-[#c9a96e] hover:text-[#d4b87d] font-medium text-base transition-colors group tracking-wide">
                            <?= $block->link_text() ?>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
