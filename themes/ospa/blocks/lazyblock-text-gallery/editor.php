<style>
    .bloc-gallery{
        display: flex;
        flex-direction: column;
        gap: 40px;
    }
    .bloc-2{
        display: flex;
        gap: 32px;
        flex-direction: row-reverse;
    }
    .bloc-2 img{
        width: 40%;
        object-fit: contain;
    }
    .bloc-2 .content{
        flex-grow: 1;
    }
    .gallery{
        display: flex;
        flex-direction: row;
        gap: 24px;
        flex-wrap: nowrap;
    }
    .gallery .image-item{
        flex: 1 1 0px;
    }
    .pretitle{
        text-transform: uppercase;
        font-size: 14px;
        margin: 0;
    }
    h2{
        margin:0;
        padding:0;
    }
</style>

<div class="bloc-gallery">
    <div class="background-container">
        <div class="container">
            <div class="bloc-2">
                <img src="<?= esc_html($attributes['image']['url']) ?>" alt="alt" class="rounded z-10 relative" />
                <div class="content">
                    <span class="pretitle"><?= esc_html( $attributes['pretitle'] ) ?></span>
                    <h2 class="title-1 mt-8"><?= esc_html( $attributes['title'] ) ?></h2>
                    <p class="mb">
                        <?= $attributes['content'] ?>                    
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery">
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