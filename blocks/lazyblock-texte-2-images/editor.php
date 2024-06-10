<style>
    .pretitle{
        font-size: 14px;
        text-transform: uppercase;
        margin: 0;
    }
    .images{
        display: flex;
        flex-direction: row;
        gap: 24px;
    }
    .images img {
        flex: 1 1 50%;
        min-width: 0;
    }
    .photos-2 {
        max-width: 100%;
        overflow: hidden;
    }
</style>

<div class="photos-2">
    <div class="container">
        <div class="content">
            <span class="pretitle"><?= esc_html($attributes['pretitle']) ?></span>
            <h2 class="title-1"><?= esc_html($attributes['title']) ?></h2>
            <p>
            <?= $attributes['content'] ?>
            </p>
        </div>
        <div class="images">
            <img src="<?= esc_html($attributes['image-1']['url']) ?>" />
            <img src="<?= esc_html($attributes['image-2']['url']) ?>" />
        </div>
    </div>
</div>