<style>
    .bloc-3col .blocrow{
        display: flex;
        flex-direction: row;
        width: 100%;
        gap: 24px;
        justify-content: center;
    }
    .bloc-3col .column-item{
        flex-grow: 0;
        flex-basis: 33.33%;
        margin-right: 10px;
    }
    .bloc-3col img{
        width: 100%;
    }
    .bloc-3col h2{
        margin: 8px 0 0 0;
        padding: 0;
        font-size: 20px;
    }
    .bloc-3col p{
        margin: 4px 0 8px 0;
    }
    .bloc-3col .button{
        border-bottom: 1px solid #000;
        padding: 4px 0;
        display: inline-block;
    }
    .bloc-3col .separator{
        background-color: #F6F6F5;
        height: 275px;
    }
    .bloc-3col.boxed .container{
        margin-top: -232px;
    }
    .bloc-3col.boxed .column-item{
        background: white;
        box-shadow: 0px 4px 6px 0px rgba(0, 0, 0, 0.07);
        border-radius: 4px;
        overflow: hidden;
    }
    .bloc-3col.boxed .column-item .content{
        margin: 24px;
    }
    .bloc-3col .blocrow{
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    .bloc-3col > .container{
        display: flex;
        flex-direction: column;
        gap: 48px;
    }
</style>

<?php
$boxed = ($attributes['design'] === 'boxed') ? true : false;
?>

<div class="bloc-3col my-80 z-10 relative <?php echo $boxed ? "boxed" : ""; ?>">

    <?php if ($boxed): ?>
        <div class="separator bg-soft-white-200"></div>
    <?php endif; ?>
    
    <div class="container">
        <?php $smallBlock = $attributes['smallBlock']; ?>
        <?php for ($i = 0; $i < count($smallBlock); $i += 3): ?>
            <div class="blocrow flex justify-center <?php echo $boxed ? 'gap-24' : 'gap-40'; ?> <?php if ($boxed): ?> -mt-[232px] <?php endif; ?>">
                <?php for ($j = $i; $j < min($i + 3, count($smallBlock)); $j++): ?>
                    <div class="column-item md:w-1/3 overflow-hidden <?php if ($boxed): ?> rounded bg-soft-white-50 shadow-md <?php endif; ?>">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/bain.jpg" <?php if (!$boxed): ?>class="rounded shadow-md"<?php endif; ?> />
                        <div class="content <?php echo $boxed ? 'm-24' : 'my-24'; ?>">
                            <h2 class="title-2 mb-8 text-mineral-green-600"><?= $smallBlock[$j]['title'] ?></h2>
                            <p><?= $smallBlock[$j]['content'] ?></p>
                            <?php if (!empty($smallBlock[$j]['link-label'])): ?>
                                <a class="btn btn-tertiary mt-16" href="<?= esc_html($smallBlock[$j]['link-url']) ?>"><?= $smallBlock[$j]['link-label'] ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
    </div>