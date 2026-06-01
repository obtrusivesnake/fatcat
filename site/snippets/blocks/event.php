<?php
/** @var \Kirby\Cms\Block $block */

$imageUrl = null;
$altText = $block->heading()->html();

// Try to get an image from the block
$imageField = $block->image();
if ($imageField->isNotEmpty()) {
    // First, try to get it as a file (for images uploaded to Kirby)
    if ($kirbyImage = $imageField->toFile()) {
        $imageUrl = $kirbyImage->url();
        $altText = $kirbyImage->alt()->or($altText);
    } else {
        // If it's not a file, it might be an external URL
        $yaml = $imageField->yaml();
        if (!empty($yaml) && isset($yaml[0]) && filter_var($yaml[0], FILTER_VALIDATE_URL)) {
            $imageUrl = $yaml[0];
        }
    }
}
?>
<section class="py-20 md:py-28">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl sm:text-4xl text-white mb-4 font-normal leading-snug">
            <?= $block->heading()->html() ?>
        </h2>
        <p class="text-[#c9a96e] text-lg mb-8"><?= $block->time()->html() ?></p>
        <?php if ($imageUrl): ?>
            <div class="mb-8">
                <img src="<?= $imageUrl ?>" alt="<?= $altText ?>" class="w-full aspect-video object-cover rounded-lg shadow-lg">
            </div>
        <?php endif; ?>
        <div class="text-stone-400 text-lg leading-relaxed prose-invert">
            <?= $block->text()->kt() ?>
        </div>
    </div>
</section>
