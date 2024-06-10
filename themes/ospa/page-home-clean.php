<?php
/*
Template Name: Home (vide)
*/

get_header();
?>

<div class="hero-full flex flex-col gap-48 items-center justify-center h-screen bg-pure-black text-pure-white px-24">
    <div class="md:container flex flex-row justify-center">
        <div class="content flex md:w-1/2 gap-8 flex-col justify-center items-center text-center">
            <span class="pretitle-1 animatecss animatecss-fadeInDown">Centre de soins et de bien-être</span>
            <h1 class="title-1 text-pure-white animatecss animatecss-fadeInDown">Votre oasis de bien-être</h1>
            <p class="animatecss animatecss-fadeInDown">Prenez du temps pour vous dans un écrin de douceur et de volupté lors d’un un voyage entre aquathérapie et soins de bien-être.</p>
        </div>
    </div>
    <i class="bx bx-sm bx-down-arrow-circle absolute mt-[350px] animatecss animatecss-pulse animatecss-infinite"></i>
</div>

<?php 
    if (have_posts()) :
        while (have_posts()) : the_post(); 
?>
    
    <?php the_content(); ?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>