<?php
/**
 * Carousel
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<?php $items = $attributes['items']; ?>
<?php 
    if ($attributes['ratio'] !== "false") {
        $ratio = 'aspect-[' . esc_attr($attributes['ratio']) . ']';
    }
?>



<div class="slider my-80 overflow-hidden" id="slider">
    <div class="container">
        <div class="news-header flex <?php echo $attributes['title'] ? 'justify-between' : 'justify-end'; ?> items-center mb-24">
            <?php if ($attributes['title']) : ?>
                <h2 class="title-1 flex-auto mb-0"><?= $attributes['title'] ?></h2>
            <?php endif; ?>
            <div class="controls shrink-0">
                <i class="bx bx-md bx-left-arrow-alt slide-left cursor-pointer"></i>
                <i class="bx bx-md bx-right-arrow-alt slide-right cursor-pointer"></i>
            </div>
        </div>

        <div class="slider-content flex gap-24">
            <?php foreach ($items as $item): ?>
                <div class="slider-item w-1/3 shrink-0">
                    <img src="<?= esc_url($item['image']['url']) ?>" class="w-full <?= $ratio ?>" alt="<?= esc_attr($item['title'] ?? 'Placeholder') ?>" />
                    <h3 class="title-3 mt-8"><?= esc_html($item['title']) ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>