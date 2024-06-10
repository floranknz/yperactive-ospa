<?php
    $borderurl = get_stylesheet_directory_uri() . "/img/borders/" . esc_html( $attributes['border'] ) . ".jpg";
?>

<style>
    .banner{
        padding: 32px;
        background-image: url("<?= $borderurl ?>");
        background-size: cover;
        background-position: center;
    }
    .banner .content{
        text-align: center;
        background-color: white;
        padding: 32px;
    }
    .banner .pretitle{
        font-size: 14px;
        text-transform: uppercase;
        margin: 0;
    }
    .banner h2{
        margin:0;
        padding:0;
    }
    .banner .button{
        height: 40px;
        padding: 0 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 100px;
        background: none;
        border: 1px solid #395551;
    }
</style>

<div class="banner">
     <div class="content">
         <span class="pretitle"><?= esc_html( $attributes['pretitle'] ) ?></span>
         <h2 class="title-1 mb-24"><?= esc_html( $attributes['title'] ) ?></h2>
         <p class="mb-24">
         <?= esc_html( $attributes['content'] ) ?>
         </p>
         <div class="button"><?= esc_html( $attributes['cta-label'] ) ?></div>
     </div>
 </div>