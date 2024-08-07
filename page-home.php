<?php
/*
Template Name: Home
*/

get_header();
?>

<?php 
    $block1 = get_field("bloc-1");
    $block2 = get_field("bloc-2");
    $block3 = get_field("bloc-3");
?>

<div class="hero-full flex flex-col gap-48 items-center justify-center h-screen bg-mineral-green-400 text-pure-white px-24">
    <div class="md:container flex flex-row justify-center">
        <div class="content flex md:w-1/2 gap-8 flex-col justify-center items-center text-center">
            <span class="pretitle-1 animatecss animatecss-fadeInDown">Centre de soins et de bien-être</span>
            <h1 class="title-1 text-pure-white animatecss animatecss-fadeInDown mb-8">Votre oasis de bien-être</h1>
            <p class="animatecss animatecss-fadeInDown">Prenez du temps pour vous dans un écrin de douceur et de volupté lors d’un voyage entre aquathérapie et soins de bien-être.</p>
        </div>
    </div>
    <i class="bx bx-sm bx-down-arrow-circle absolute mt-[350px] animatecss animatecss-pulse animatecss-infinite"></i>
</div>

<div class="spabysothys container flex items-center justify-center my-80">
    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/spabysothys.png" alt="Spa by Sothys" class="w-[150px]" />
</div>

<div class="bloc-2 container flex flex-col max-sm:flex-col gap-32 lg:flex-row justify-between items-center my-80 max-md:overflow-hidden">
    <div class="basis-1/2 relative">
        <img src="<?= get_field('intro-image') ?>" alt="alt" class="rounded z-10 relative" />
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/gold-1.png" class="absolute bottom-[-118px] right-[-96px] z-0 w-[274px]" />
    </div>
    <div class="content basis-5/12">
        <span class="pretitle-1"><?= esc_html( get_field('intro-pretitle') ) ?></span>
        <h2 class="title-1 mt-8"><?= esc_html( get_field('intro-title') ) ?></h2>
        <p class="mb-24">
            <?= esc_html( get_field('intro-content') ) ?>
        </p>
    </div>
</div>

<div class="bloc-3col my-80 z-10 relative">
    <div class="separator bg-soft-white-200"></div>
    <div class="container flex max-md:flex-col justify-center gap-24 -mt-[232px]">
        <div class="column-item md:w-1/3 overflow-hidden rounded bg-soft-white-50 shadow-md">
            <img src="<?= esc_html( $block1['image'] ) ?>" />
            <div class="content m-24">
                <h2 class="title-2 mb-8 text-mineral-green-600"><?= esc_html( $block1['title'] ) ?></h2>
                <p><?= esc_html( $block1['content'] ) ?></p>
                <?php if( $block1['link'] === true ){ ?>
                    <a class="btn btn-tertiary mt-16" href="<?= esc_html( $block1['link-url'] ) ?>"><?= esc_html( $block1['link-label'] ) ?></a>
                <?php } ?>
            </div>
        </div>
        <div class="column-item md:w-1/3 overflow-hidden rounded bg-soft-white-50 shadow-md">
            <img src="<?= esc_html( $block2['image'] ) ?>" />
            <div class="content m-24">
                <h2 class="title-2 mb-8 text-mineral-green-600"><?= esc_html( $block2['title'] ) ?></h2>
                <p><?= esc_html( $block2['content'] ) ?></p>
                <?php if( $block2['link'] === true ){ ?>
                    <a class="btn btn-tertiary mt-16" href="<?= esc_html( $block2['link-url'] ) ?>"><?= esc_html( $block2['link-label'] ) ?></a>
                <?php } ?>
            </div>
        </div>
        <div class="column-item md:w-1/3 overflow-hidden rounded bg-soft-white-50 shadow-md">
            <img src="<?= esc_html( $block3['image'] ) ?>" />
            <div class="content m-24">
                <h2 class="title-2 mb-8 text-mineral-green-600"><?= esc_html( $block3['title'] ) ?></h2>
                <p><?= esc_html( $block3['content'] ) ?></p>
                <?php if( $block3['link'] === true ){ ?>
                    <a class="btn btn-tertiary mt-16" href="<?= esc_html( $block3['link-url'] ) ?>"><?= esc_html( $block3['link-label'] ) ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="container my-80">
    <div class="banner">
        <div class="content text-center">
            <span class="pretitle-1 mb-8"><?= esc_html( get_field('banner-pretitle') ) ?></span>
            <h2 class="title-1 mb-24"><?= esc_html( get_field('banner-title') ) ?></h2>
            <p class="mb-24">
                <?= esc_html( get_field('banner-content') ) ?>
            </p>
            <a class="btn btn-secondary" href="<?= esc_html( get_field('banner-cta-link') ) ?>"><?= esc_html( get_field('banner-cta-label') ) ?></a>
        </div>
    </div>
</div>
<div class="news my-80 overflow-hidden" id="slider">
    <div class="container">
        <div class="news-header flex justify-between items-center mb-24">
            <h2 class="title-1 flex-auto mb-0">Dernières actualités</h2>
            <div class="controls shrink-0">
                <i class="bx bx-md bx-left-arrow-alt slide-left cursor-pointer"></i>
                <i class="bx bx-md bx-right-arrow-alt slide-right cursor-pointer"></i>
            </div>
        </div>

        <div class="slider-content flex gap-24">
            <?php
            // Define the query arguments
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1, // -1 to get all posts
            );

            // Execute the query
            $query = new WP_Query($args);

            // Check if we have posts
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_stylesheet_directory_uri() . '/img/default.jpg'; 
                ?>
                
                    <div class="slider-item">
                        <a href="<?= the_permalink() ?>">
                            <img src="<?= $thumbnail_url ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-auto object-cover aspect-[11/8]" />
                            <span class="date pretitle-2 text-outer-space-400"><?php echo get_the_date('j F Y'); ?></span>
                            <h3 class="title-3"><?php the_title(); ?></h3>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); // Reset the global post object
                else : ?>
                    <p><?php _e("Il n'y a pas d'articles.", 'text-domain'); ?></p>
                <?php endif; ?>
        </div>
    </div>
    <div class="separator bg-soft-white-200 -mt-[243px]"></div>
</div>
<div class="bloc-2 container flex flex-col gap-32 lg:flex-row justify-between items-center my-80">
    <div class="basis-1/2">
        <img src="<?= get_field('obistroy-image') ?>" alt="alt" class="rounded" />
    </div>
    <div class="content basis-5/12">
        <span class="pretitle-1"><?= esc_html( get_field('obistroy-pretitle') ) ?></span>
        <h2 class="title-1 mt-8"><?= esc_html( get_field('obistroy-title') ) ?></h2>
        <p class="mb-24">
            <?= esc_html( get_field('obistroy-content') ) ?>
        </p>
        <a class="btn btn-primary" href="https://o-bistroy.com">Découvrir</a>
    </div>
</div>

<?php get_footer(); ?>