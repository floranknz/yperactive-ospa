<?php
/**
 * Petits blocs
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<?php
$boxed = ($attributes['design'] === 'boxed') ? true : false;
?>

<div class="bloc-3col my-80 z-10 relative">

    <?php if ($boxed): ?>
        <div class="separator bg-soft-white-200"></div>
    <?php endif; ?>
    
    <div class="container mx-auto">
        <?php $blocks = $attributes['blocks']; ?>
        <?php for ($i = 0; $i < count($blocks); $i += 3): ?>
            <div class="flex justify-center max-sm:flex-wrap <?php echo $boxed ? 'gap-24' : 'gap-40'; ?> <?php if ($boxed): ?> -mt-[232px] <?php endif; ?>">
                <?php for ($j = $i; $j < min($i + 3, count($blocks)); $j++): ?>
                    <div class="column-item w-full md:w-1/3 overflow-hidden <?php if ($boxed): ?> rounded bg-soft-white-50 shadow-md <?php endif; ?>">
                        <img src="<?= $blocks[$j]['image']['url'] ?>" <?php if (!$boxed): ?>class="rounded shadow-md"<?php endif; ?> />
                        <div class="content <?php echo $boxed ? 'm-24' : 'mt-24'; ?>">
                            <h2 class="title-2 mb-8 text-mineral-green-600"><?= $blocks[$j]['title'] ?></h2>
                            <p><?= $blocks[$j]['content'] ?></p>
                            <?php if (!empty($blocks[$j]['link-label'])): ?>
                                <a class="btn btn-tertiary mt-16" href="<?= esc_html($blocks[$j]['link-url']) ?>"><?= $blocks[$j]['link-label'] ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <?php if ($i === 0 && count($blocks) > 3): ?>
                <div class="h-40 w-full"></div><!-- Espacement entre les lignes -->
            <?php endif; ?>
        <?php endfor; ?>
    </div>

</div>