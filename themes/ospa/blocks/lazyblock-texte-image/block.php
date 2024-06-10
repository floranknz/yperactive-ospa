<?php
/**
 * Texte + Image (50/50)
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

$direction = $attributes["reverse"] ? "flex-row" : "flex-row-reverse";
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

<div class="container flex flex-col lg:<?= $direction ?> gap-32 justify-between items-center my-80">
    <div class="basis-1/2 relative">
        <img src="<?= esc_html($attributes['image']['url']) ?>" alt="alt" class="rounded z-10 relative" />
        <?php if (!empty($ornement)) { ?>
            <img src="<?= get_stylesheet_directory_uri() ?>/img/<?= $ornement ?>.png" class="absolute bottom-[-118px] <?= $ornement_position ?> z-0 w-[274px]">
        <?php } ?>
    </div>
    <div class="content basis-5/12">
        <?php if (!empty($attributes['pretitle'])) { ?>
            <span class="pretitle-1"><?= esc_html( $attributes['pretitle'] ) ?></span>
        <?php } ?>
        <h2 class="title-1 mt-8"><?= esc_html( $attributes['title'] ) ?></h2>
        <p class="mb-24">
            <?= $attributes['content'] ?>
        </p>
    </div>
</div>