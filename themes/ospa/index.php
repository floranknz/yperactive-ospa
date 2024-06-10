<?php get_header(); ?>

<main class="container mx-auto py-8">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('mb-8'); ?>>
                <header class="mb-4">
                    <h2 class="text-2xl font-bold">
                        <a href="<?php the_permalink(); ?>" class="text-blue-500 hover:underline">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                </header>
                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php endwhile; ?>
        <div class="navigation">
            <?php
            // Previous/next page navigation.
            posts_nav_link();
            ?>
        </div>
    <?php else : ?>
        <article class="no-posts">
            <h2 class="text-2xl font-bold">No posts found</h2>
            <p>It seems we can’t find what you’re looking for. Perhaps searching can help.</p>
            <?php get_search_form(); ?>
        </article>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
