<?php
    $direction = $attributes["reverse"] ? "row" : "row-reverse";
?>

<style>
    .bloc-texte-image{
        display: flex;
        gap: 32px;
        flex-direction: <?= $direction ?>;
    }
    .bloc-texte-image img{
        width: 40%;
        object-fit: contain;
    }
    .bloc-texte-image .content{
        flex-grow: 1;
    }
    .bloc-texte-image .pretitle{
        text-transform: uppercase;
        font-size: 14px;
        margin: 0;
    }
    .bloc-texte-image h2{
        margin:0;
        padding:0;
    }
</style>

<div class="bloc-texte-image container">
    <img src="<?php echo esc_html($attributes['image']['url']) ?>" />
    <div class="content">
        <span class="pretitle"><?php echo esc_html( $attributes['pretitle'] ) ?></span>
        <h2><?php echo esc_html( $attributes['title'] ) ?></h2>
        <p>
            <?php echo $attributes['content'] ?>
        </p>
    </div>
</div>


