<?php $items = $attributes['items']; ?>
<?php 
    if ($attributes['ratio'] !== "false") {
        $ratio = 'aspect-[' . esc_attr($attributes['ratio']) . ']';
    }
?>

<style>
    .slider-content{
        display:flex;
        flex-direction: column;
        gap: 8px;
    }
    .slider-item{
        display: flex;
        flex-direction: row;
        gap: 24px;
        border-bottom: 1px solid #e6e6e6;
        align-items: center;
    }
    .slider-item img{
        width: 150px;
        padding: 16px 0;
        aspect-ratio: <?= $attributes['ratio'] ?>
    }
</style>



<div class="slider">
    <div class="container">
        <div class="news-header">
            <?php if ($attributes['title']) : ?>
                <h2 class="title-1 flex-auto mb-0"><?= $attributes['title'] ?></h2>
            <?php endif; ?>
        </div>
        <div class="slider-content flex gap-24">
            <?php foreach ($items as $item): ?>
                <div class="slider-item w-1/3 shrink-0">
                    <img src="<?= esc_url($item['image']['url']) ?>" class="w-full <?= $ratio ?>" alt="<?= esc_attr($item['title'] ?? 'Placeholder') ?>" />
                    <span><?= esc_html($item['title']) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>