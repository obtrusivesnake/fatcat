<?php
/**
 * Dual Printable block
 *
 * Renders two printable images side by side (stacked on mobile). Each image
 * has an attached "Print" button that opens the browser's print dialog for the
 * PDF linked to that image. Same-origin PDFs print directly via a hidden
 * iframe; cross-origin PDFs gracefully fall back to opening in a new tab.
 */

// Build a clean list of the (up to) two printables, keeping only those that
// actually have something to show.
$printables = [];

foreach ([1, 2] as $i) {
  $image = $block->{"image_$i"}()->toFile();
  $pdf = $block->{"pdf_$i"}();

  if ($image || $pdf->isNotEmpty()) {
    $printables[] = [
      "image" => $image,
      "pdf" => $pdf->value(),
    ];
  }
}
?>

<?php if (!empty($printables)): ?>
<section class="pb-20 md:pb-28 px-4">
    <div class="max-w-4xl mx-auto">

        <?php if ($block->heading()->isNotEmpty()): ?>
            <div class="text-center mb-12">
                <h2 class="font-display text-3xl sm:text-4xl text-white font-normal leading-snug whitespace-pre-wrap">
                    <?= $block->heading()->html() ?>
                </h2>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 md:gap-10">
            <?php foreach ($printables as $item): ?>
                <figure class="group flex flex-col">
                    <?php if ($item["image"]): ?>
                        <div class="overflow-hidden border border-white/[0.08] bg-stone-900">
                            <img
                                src="<?= $item["image"]->url() ?>"
                                alt="<?= esc(
                                  $item["image"]->alt()->or("Printable"),
                                ) ?>"
                                loading="lazy"
                                class="w-full h-auto object-cover transition-transform duration-500">
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($item["pdf"])): ?>
                        <button
                            type="button"
                            onclick="fatcatPrintPDF('<?= esc($item["pdf"]) ?>')"
                            class="mt-4 inline-flex items-center justify-center gap-2 bg-[#c9a96e] hover:bg-[#d4b87d] text-stone-950 font-semibold text-sm px-6 py-3 rounded transition-colors tracking-wide">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><path d="M6 9V2a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7"/><rect x="6" y="14" width="12" height="8" rx="1"/></svg>
                            Print
                        </button>
                    <?php endif; ?>
                </figure>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<script>
/**
 * Opens the print dialog for a PDF. Loads it in a hidden iframe and triggers
 * print. If the PDF is cross-origin (browser blocks scripted printing),
 * fall back to opening it in a new tab so the user can print manually.
 */
function fatcatPrintPDF(url) {
    var frame = document.createElement('iframe');
    frame.style.position = 'fixed';
    frame.style.right = '0';
    frame.style.bottom = '0';
    frame.style.width = '0';
    frame.style.height = '0';
    frame.style.border = '0';
    frame.setAttribute('aria-hidden', 'true');

    var fellBack = false;
    var fallback = function () {
        if (!fellBack) {
            fellBack = true;
            window.open(url, '_blank', 'noopener');
        }
    };

    frame.onload = function () {
        try {
            frame.contentWindow.focus();
            frame.contentWindow.print();
        } catch (e) {
            fallback();
        }
    };
    frame.onerror = fallback;

    document.body.appendChild(frame);

    // Safety net: if the iframe never loads (e.g. blocked), open in a new tab.
    setTimeout(fallback, 3000);

    frame.src = url;
}
</script>
<?php endif; ?>
