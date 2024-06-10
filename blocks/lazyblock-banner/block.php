<?php
/**
 * Bannière
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>

<?php
    $borderurl = get_stylesheet_directory_uri() . "/img/borders/" . esc_html( $attributes['border'] ) . ".jpg";
?>

<style>
    .banner{
        background-image: url("<?= $borderurl ?>");
    }
</style>

<div class="container my-80">
 <div class="banner">
     <div class="content text-center">
         <span class="pretitle-1 mb-8"><?= esc_html( $attributes['pretitle'] ) ?></span>
         <h2 class="title-1"><?= esc_html( $attributes['title'] ) ?></h2>
         <p class="mb-24">
         <?= esc_html( $attributes['content'] ) ?>
         </p>
         <a class="btn btn-secondary" href="<?= esc_html( $attributes['cta-link'] ) ?>"><?= esc_html( $attributes['cta-label'] ) ?></a>
     </div>
 </div>
</div>