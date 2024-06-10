<?php
$direction = $attributes["reverse"] ? "row" : "row-reverse";
?>

<script>
    const blocsTexteImage = document.querySelectorAll('.bloc-texte-image')
    blocsTexteImage.forEach(bloc => {
        document.querySelectorAll('p').forEach(p => {
    if (p.innerHTML.includes('&nbsp;')) {
        p.style.margin = "0";
        p.style.lineHeight = "1";
    }
});

    })
</script>

<style>
    .bloc-soin {
        display: flex;
        flex-direction: column;
        gap: 32px;
        height: auto;
    }
    .bloc-texte-image {
        display: flex;
        gap: 32px;
        flex-direction: <?= $direction ?>;
        height: 100%; /* Ensure the parent container has a defined height */
        align-items: stretch; /* Make sure children stretch to the same height */
    }
    .bloc-texte-image img {
        width: 40%;
        object-fit: cover; /* Ensure the image scales within its box while maintaining aspect ratio */
    }
    .bloc-texte-image .content {
        flex-grow: 1;
    }
    .bloc-texte-image .pretitle {
        text-transform: uppercase;
        font-size: 14px;
        margin: 0;
    }
    .bloc-texte-image h2 {
        margin: 0;
        padding: 0;
        font-size: 18px;
    }
</style>
<div class="bloc-soin">
    <div class="bloc-intro">
        <span class="pretitle"><?php echo esc_html( $attributes['pretitle'] ) ?></span>
        <h2><?php echo esc_html( $attributes['title'] ) ?></h2>
        <?php echo $attributes['intro'] ?>
    </div>
    <div class="bloc-texte-image container">
        <img src="<?php echo esc_html($attributes['image']['url']) ?>" />
        <div class="block-texte content">
            <?php echo $attributes['content'] ?>
        </div>
    </div>
</div>
