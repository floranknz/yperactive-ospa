<?php get_header(); ?>

    <?php 
        if (have_posts()) :
            while (have_posts()) : the_post();
    ?>

    <?php if( get_field('mode') === 'small'){ ?>
        <div class="hero flex flex-col gap-48 items-center justify-center h-[400px] bg-mineral-green-400 text-pure-white px-24 pt-96">
            <div class="md:container flex flex-row justify-center">
                <div class="content flex md:w-1/2 gap-8 flex-col justify-center items-center text-center">
                    <span class="pretitle-1 animatecss animatecss-fadeInDown"><?= esc_html( get_field('pretitle') ); ?></span>
                    <h1 class="title-1 text-pure-white animatecss animatecss-fadeInDown"><?= esc_html( get_field('title') ); ?></h1>
                </div>
            </div>
        </div>       
    <?php }else{ ?>
        <div class="hero-full flex flex-col gap-48 items-center justify-center h-screen bg-mineral-green-400 text-pure-white px-24" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= get_field('header-image') ?>')">
            <div class="md:container flex flex-row justify-center">
                <div class="content flex md:w-1/2 gap-8 flex-col justify-center items-center text-center">
                    <span class="pretitle-1 animatecss animatecss-fadeInDown"><?= esc_html( get_field('pretitle') ); ?></span>
                    <h1 class="title-1 text-pure-white animatecss animatecss-fadeInDown mb-8"><?= esc_html( get_field('title') ); ?></h1>
                    <p class="animatecss animatecss-fadeInDown"><?= esc_html( get_field('subtitle') ); ?></p>
                </div>
            </div>
            <i class="bx bx-sm bx-down-arrow-circle absolute mt-[350px] animatecss animatecss-pulse animatecss-infinite"></i>
        </div>
    <?php } ?>
        
        <div class="page-content mb-80">
            <?php the_content(); ?>
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