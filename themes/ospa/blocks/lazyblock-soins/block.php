<?php
/**
 * Soins
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

$direction = $attributes["reverse"] ? "flex-row" : "flex-row-reverse";
$bg = $attributes["grey-bg"] ? "bg-soft-white-200" : "";
if ($attributes["ornement"] === "none") {
    $ornement = "";
} else {
    $ornement = $attributes["ornement"];
}
if ($direction === "flex-row") {
    $ornement_position = "right-[-96px]";
} else {
    $ornement_position = "left-[-128px]";
}
?>

<div class="bloc-soin py-80 <?= $bg ?>">
    <div class="container w-full mb-40">
        <?php if (!empty($attributes['pretitle'])) { ?>
            <span class="pretitle-1"><?= esc_html($attributes['pretitle']) ?></span>
        <?php } ?>
        <h2 class="title-1 mt-8"><?= esc_html($attributes['title']) ?></h2>
        <?= $attributes['intro'] ?>
    </div>
    <div class="container flex flex-col lg:<?= $direction ?> gap-32 justify-between items-stretch">
        <?php if (!empty($attributes['image'])) { ?>
            <div class="basis-3/12 relative flex-shrink-0">
                <img src="<?= esc_html($attributes['image']['url']) ?>" alt="alt" class="rounded z-10 h-full object-cover" />
            </div>
        <?php } ?>
        <div class="content basis-8/12 flex flex-col justify-center">
            <div class="wysiwyg mb-24">
                <?= $attributes['content'] ?>
            </div>
        </div>
    </div>
</div>

