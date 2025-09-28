<?php get_header(); ?>

    <?php 
        if (have_posts()) :
            while (have_posts()) : the_post();

            $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_stylesheet_directory_uri() . '/img/default.jpg';
    ?>
        
    <div class="container pt-[200px] mb-80 flex justify-center">
        <div class="w-8/12">
            <div class="article-header flex flex-col">
                <span class="title-1 mb-0"><?= the_title() ?></span>
                <span class="pretitle-1 text-outer-space-400 mb-24">Posté le <?= the_date() ?></span>
                <img src="<?= $thumbnail_url ?>" class="object-cover aspect-[11/8]"/>
            </div>
            <div class="article-content mt-40">
                <?php the_content(); ?>
            </div>
            <div class="newsletter mt-48 pt-32 border-t border-outer-space-200">
                <span class="pretitle-1 text-outer-space-400">Suivez-nous</span>
                <p>Recevez nos dernières actualités et offres en vous inscrivant à la newsletter O'Spa</p>
                <div class="newsletter-input w-1/2">
                    <?php echo do_shortcode('[sibwp_form id=1]') ?>
                </div>
            </div>
        </div>
    </div>

    <?php endwhile; ?>

    <?php else : ?>
        <div class="hero flex flex-col gap-48 items-center justify-center h-[400px] bg-mineral-green-400 text-pure-white px-24 pt-80">
        <div class="md:container flex flex-row justify-center mt-24">
            <div class="content flex md:w-1/2 gap-8 flex-col justify-center items-center text-center">
                <span class="pretitle-1 animatecss animatecss-fadeInDown">Oups...</span>
                <h1 class="title-1 text-pure-white animatecss animatecss-fadeInDown">La page recherchée n'existe pas</h1>
            </div>
        </div>
    </div>
    <?php endif; ?>

<?php get_footer(); ?>