<?php if ($block->calendar_url()->isNotEmpty()): ?>
<iframe
    title="Events Calendar"
    aria-label="Events Calendar"
    style="width:100%; max-width:978px; height:<?= $block->iframe_height()->or(2883) ?>px; border:0; display:block; margin:0 auto;
               filter: invert(1.00) hue-rotate(180deg);
               background:#f3f5f6;"
    src="<?= $block->calendar_url() ?>"
    allowfullscreen
    allowtransparency="true"
    frameborder="0"
    allow="clipboard-write;autoplay;camera;microphone;geolocation;vr"></iframe>
<?php endif ?>
