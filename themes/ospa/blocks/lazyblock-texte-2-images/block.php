<?php
/**
 * Texte + 2 images
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<div class="photos-2 pt-80">
    <div class="container flex flex-col gap-64">
        <div class="content w-full lg:w-2/3 z-10">
            <?php if (!empty($attributes['pretitle'])) { ?>
                <span class="pretitle-1"><?= esc_html( $attributes['pretitle'] ) ?></span>
            <?php } ?>
            <h2 class="title-1 mt-8"><?= esc_html($attributes['title']) ?></h2>
            <p>
            <?= $attributes['content'] ?>
            </p>
        </div>
        <div class="images flex flex-col md:flex-row gap-24 z-10">
            <img src="<?= esc_html($attributes['image-1']['url']) ?>" class="w-full md:w-1/2 rounded" />
            <img src="<?= esc_html($attributes['image-2']['url']) ?>" class="w-full md:w-1/2 rounded" />
        </div>
    </div>
</div>