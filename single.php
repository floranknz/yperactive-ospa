<?php get_header(); ?>

    <?php 
        if (have_posts()) :
            while (have_posts()) : the_post();
    ?>  
        
    <div class="container pt-[200px] mb-80 flex justify-center">
        <div class="w-8/12">
            <div class="article-header flex flex-col">
                <span class="title-1 mb-0"><?= the_title() ?></span>
                <span class="pretitle-1 text-outer-space-400 mb-24">Posté le <?= the_date() ?></span>
                <img src="<?= the_post_thumbnail_url() ?>" class="object-cover aspect-[11/8]"/>
            </div>
            <div class="article-content mt-40">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <?php endwhile; ?>

    <?php else : ?>
        <div class="hero flex flex-col gap-48 items-center justify-center h-[400px] bg-mineral-green-400 text-pure-white px-24 pt-80">
        <div class="md:container flex flex-row justify-center">
            <div class="content flex md:w-1/2 gap-8 flex-col justify-center items-center text-center">
                <span class="pretitle-1 animatecss animatecss-fadeInDown">Oups...</span>
                <h1 class="title-1 text-pure-white animatecss animatecss-fadeInDown">La page recherchée n'existe pas</h1>
            </div>
        </div>
    </div>
    <?php endif; ?>

<?php get_footer(); ?>