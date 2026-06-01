<section class="relative min-h-screen flex items-center justify-center">
    <!-- Background image -->
    <?php if ($image = $block->hero_image()->toFile()): ?>
        <img src="<?= $image->url() ?>" alt="" class="absolute inset-0 w-full h-full object-cover" />
    <?php endif; ?>

    <div class="relative z-10 text-center px-4 sm:px-6 max-w-3xl mx-auto pt-20">
        <h1 class="font-display text-4xl sm:text-5xl md:text-6xl font-normal text-white leading-normal md:leading-normal mb-8">
            <span class="text-highlight">
                <?= $block->hero_title()->html() ?>
            </span>
        </h1>
        <?php if ($block->hero_subtitle()->isNotEmpty()): ?>
            <p class="text-lg sm:text-xl text-white/90 mb-12 max-w-2xl mx-auto tracking-wide">
                <span class="text-highlight-sm">
                    <?= $block->hero_subtitle()->html() ?>
                </span>
            </p>
        <?php endif; ?>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <?php if ($block->cta_url()->isNotEmpty()): ?>
                <a href="<?= $block->cta_url() ?>" class="w-full sm:w-auto bg-[#c9a96e] hover:bg-[#d4b87d] text-stone-950 font-semibold text-base px-10 py-4 rounded transition-colors tracking-wide">
                    <?= $block->cta_label()->or("Book Online") ?>
                </a>
            <?php endif; ?>
            <?php if ($block->cta2_url()->isNotEmpty()): ?>
                <a href="<?= $block->cta2_url() ?>" class="w-full sm:w-auto border border-white/25 bg-stone-950/50 backdrop-blur-sm hover:bg-stone-950/70 text-white font-medium text-base px-10 py-4 rounded transition-all tracking-wide">
                    <?= $block->cta2_label() ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
