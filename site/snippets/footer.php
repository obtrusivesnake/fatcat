<?php
/**
 * Site footer snippet
 *
 * Closes the <main> region opened in the header, then renders the site-wide
 * footer. All editable values are read from the site's content so the client
 * can manage them in the Panel.
 */

$site  = $site ?? site();
$phone = $site->phone()->or('(602) 324-7119');
$tel   = preg_replace('/[^0-9+]/', '', $phone->value());
$email = $site->email()->or('hello@fatcatballroom.com');
?>
    </main>

    <footer class="pt-20 pb-32 md:pb-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">

                <!-- Col 1: Brand -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <div class="mb-4">
                        <span class="font-display text-white text-lg font-medium"><?= esc($site->title()) ?></span>
                        <span class="block text-stone-600 text-[10px] uppercase tracking-[0.25em] mt-1"><?= esc($site->nav_tagline()->or('& Dance Company')) ?></span>
                    </div>
                    <?php if ($site->footer_blurb()->isNotEmpty()): ?>
                        <p class="text-sm leading-relaxed text-stone-500 mb-5">
                            <?= esc($site->footer_blurb()) ?>
                        </p>
                    <?php endif ?>
                    <div class="flex gap-4">
                        <?php if ($site->instagram_url()->isNotEmpty()): ?>
                            <a href="<?= esc($site->instagram_url()) ?>" class="text-stone-600 hover:text-white transition-colors" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                </svg>
                            </a>
                        <?php endif ?>
                        <?php if ($site->facebook_url()->isNotEmpty()): ?>
                            <a href="<?= esc($site->facebook_url()) ?>" class="text-stone-600 hover:text-white transition-colors" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                        <?php endif ?>
                    </div>
                </div>

                <!-- Col 2: Location -->
                <?php if ($site->address()->isNotEmpty()): ?>
                    <div>
                        <h5 class="text-stone-400 font-medium mb-4 text-xs uppercase tracking-[0.2em]">Location</h5>
                        <p class="text-sm leading-relaxed text-stone-400 mb-2">
                            <?= $site->address()->kirbytextinline() ?>
                        </p>
                        <?php if ($site->address_note()->isNotEmpty()): ?>
                            <p class="text-xs text-stone-600 leading-relaxed">
                                <?= esc($site->address_note()) ?>
                            </p>
                        <?php endif ?>
                        <?php if ($site->directions_url()->isNotEmpty()): ?>
                            <a href="<?= esc($site->directions_url()) ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="inline-block mt-3 text-[#c9a96e] hover:text-[#d4b87d] text-sm transition-colors">
                                Get directions &rarr;
                            </a>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <!-- Col 3: Hours -->
                <?php if ($site->hours()->toStructure()->isNotEmpty()): ?>
                    <div>
                        <h5 class="text-stone-400 font-medium mb-4 text-xs uppercase tracking-[0.2em]">Hours</h5>
                        <div class="text-sm space-y-2">
                            <?php foreach ($site->hours()->toStructure() as $row): ?>
                                <div class="flex justify-between gap-4">
                                    <span class="text-stone-400"><?= esc($row->days()) ?></span>
                                    <span class="text-stone-600"><?= esc($row->time()) ?></span>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endif ?>

                <!-- Col 4: Quick Links -->
                <?php if ($site->footer_links()->toStructure()->isNotEmpty()): ?>
                    <div>
                        <h5 class="text-stone-400 font-medium mb-4 text-xs uppercase tracking-[0.2em]">Quick Links</h5>
                        <ul class="space-y-2.5 text-sm">
                            <?php foreach ($site->footer_links()->toStructure() as $link): ?>
                                <li><a href="<?= esc($link->url()) ?>" class="text-stone-500 hover:text-white transition-colors"><?= esc($link->label()) ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

            </div>

            <!-- Bottom bar -->
            <div class="border-t border-white/[0.06] pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex flex-col sm:flex-row items-center gap-4 text-sm text-stone-500">
                    <a href="tel:<?= esc($tel) ?>" class="hover:text-white transition-colors"><?= esc($phone) ?></a>
                    <span class="hidden sm:inline text-stone-800">&middot;</span>
                    <a href="mailto:<?= esc($email) ?>" class="hover:text-white transition-colors"><?= esc($email) ?></a>
                </div>
                <p class="text-xs text-stone-700">
                    &copy; <?= date('Y') ?> <?= esc($site->title()) ?> <?= esc($site->nav_tagline()) ?>. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

</div>
</body>
</html>
