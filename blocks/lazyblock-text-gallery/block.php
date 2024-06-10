<?php
/**
 * Petits blocs
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<div class="bloc-gallery mt-80">
    <div class="background-container bg-soft-white-200 pt-48 pb-128">
        <div class="container">
            <div class="bloc-2 flex flex-col gap-32 lg:flex-row-reverse justify-between items-center">
                <div class="basis-1/2 relative">
                    <img src="<?= esc_html($attributes['image']['url']) ?>" alt="alt" class="rounded z-10 relative" />
                </div>
                <div class="content basis-5/12">
                    <span class="pretitle-1"><?= esc_html( $attributes['pretitle'] ) ?></span>
                    <h2 class="title-1 mt-8"><?= esc_html( $attributes['title'] ) ?></h2>
                    <p class="mb">
                        <?= $attributes['content'] ?>                    
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container gallery flex flex-col md:flex-row gap-24 -mt-64">
        <?php foreach ($attributes['gallery'] as $galleryItem): ?>
            <div class="image-item rounded flex-1 overflow-hidden relative">
                <img src="<?= esc_url($galleryItem['image']['url']) ?>" alt="<?= esc_attr($galleryItem['alt']) ?>" class="w-full" />
                <span class="image-caption absolute bottom-0 left-0 p-8 w-full text-pure-white bg-gradient-to-t from-pure-black/50">
                    <?= esc_html($galleryItem['caption']) ?>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</div>