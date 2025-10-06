<?php
/*
Template Name: Carte des soins
*/

get_header();
?>

<div class="hero flex flex-col gap-48 items-center justify-center h-[400px] bg-mineral-green-400 text-pure-white px-24 pt-96">
    <div class="md:container flex flex-row justify-center mt-24">
        <div class="content flex md:w-1/2 gap-8 flex-col justify-center items-center text-center">
            <h1 class="title-1 text-pure-white animatecss animatecss-fadeInDown"><?= esc_html( get_field('title') ); ?></h1>
        </div>
    </div>
</div>

<div class="container mt-80 mb-48">
    <p><?= get_field('intro'); ?></p>
</div>
<div class="container mb-48">
        <?php
        // Find the "soins" category by slug
        $soins_parent = get_term_by( 'slug', 'soins', 'prestations_categories' );
        
        // Get all subcategories of "soins" (child categories) ordered by custom position
        $soins_subcategories = array();
        if ( $soins_parent && ! is_wp_error( $soins_parent ) ) {
            $soins_subcategories = get_terms( array(
                'taxonomy' => 'prestations_categories',
                'hide_empty' => false,
                'parent' => $soins_parent->term_id,
                'orderby' => 'name', // Get all categories first
                'order' => 'ASC',
            ) );
        }
        
        // Sort categories by position meta, with fallback to name (same logic as admin area)
        if ( ! is_wp_error( $soins_subcategories ) && ! empty( $soins_subcategories ) ) {
            usort( $soins_subcategories, function( $a, $b ) {
                $pos_a = get_term_meta( $a->term_id, 'category_position', true );
                $pos_b = get_term_meta( $b->term_id, 'category_position', true );
                
                // If both have positions, sort by position
                if ( $pos_a !== '' && $pos_b !== '' ) {
                    return intval( $pos_a ) - intval( $pos_b );
                }
                
                // If only one has position, prioritize it
                if ( $pos_a !== '' && $pos_b === '' ) {
                    return -1;
                }
                if ( $pos_a === '' && $pos_b !== '' ) {
                    return 1;
                }
                
                // If neither has position, sort by name
                return strcmp( $a->name, $b->name );
            } );
        }
        
        // Filter subcategories that have posts
        $categories_with_posts = array();
        if ( ! is_wp_error( $soins_subcategories ) && ! empty( $soins_subcategories ) ) {
            foreach ( $soins_subcategories as $category ) {
                $prestations = get_posts( array(
                    'post_type' => 'prestations',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'prestations_categories',
                            'field'    => 'term_id',
                            'terms'    => $category->term_id,
                        ),
                    ),
                ) );
                
                if ( ! empty( $prestations ) ) {
                    $categories_with_posts[] = $category;
                }
            }
        }
        
        ?>
        
        <!-- Category Tags Filter -->
        <div class="tags flex flex-wrap gap-8 mb-48">
            <button class="tag-filter tag py-6 px-12 bg-outer-space-700 text-pure-white rounded inline active" data-category="all">Tous</button>
            <?php foreach ( $categories_with_posts as $category ) : ?>
                <button class="tag-filter tag py-6 px-12 bg-soft-white-300 rounded inline" data-category="<?php echo esc_attr( $category->term_id ); ?>">
                    <?php echo esc_html( $category->name ); ?>
                </button>
            <?php endforeach; ?>
        </div>
        
        <!-- Prestations List -->
        <div id="prestations-list">
            <?php
            // Display "Soins"
            if ( ! empty( $categories_with_posts ) ) {
                foreach ( $categories_with_posts as $category ) {
                    // Get prestations for this category ordered alphabetically
                    $prestations = get_posts( array(
                        'post_type' => 'prestations',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'prestations_categories',
                                'field'    => 'term_id',
                                'terms'    => $category->term_id,
                            ),
                        ),
                    ) );
                    
                    if ( ! empty( $prestations ) ) {
                        echo '<div class="category-section mb-48" data-category="' . esc_attr( $category->term_id ) . '">';
                        echo '<div class="title-2 mb-24">' . esc_html( $category->name ) . '</div>';
                        
                        foreach ( $prestations as $prestation ) {
                            $description = get_post_meta( $prestation->ID, '_prestation_description', true );
                            $prix = get_post_meta( $prestation->ID, '_prestation_prix', true );
                            $lien_solo = get_post_meta( $prestation->ID, '_prestation_lien_solo', true );
                            $lien_duo = get_post_meta( $prestation->ID, '_prestation_lien_duo', true );
                            $lien_trio = get_post_meta( $prestation->ID, '_prestation_lien_trio', true );
                            ?>
                            <div class="soin-item flex flex-col md:flex-row mb-32 md:mb-16 md:items-center">
                                <div class="flex-grow mb-16 md:mb-0">
                                    <div class="title-3 text-cherokee-800"><?php echo esc_html( $prestation->post_title ); ?></div>
                                    <?php if ( $description ) : ?>
                                        <p><?php echo esc_html( $description ); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="flex-none flex gap-24 items-center">
                                    <?php if ( $prix ) : ?>
                                        <span><?php echo esc_html( $prix ); ?> €</span>
                                    <?php endif; ?>
                                    
                                    <?php 
                                    // Check if any booking links are available
                                    $has_booking_links = $lien_solo || $lien_duo || $lien_trio;
                                    
                                    if ( $has_booking_links ) : ?>
                                        <div class="booking-dropdown relative">
                                            <button class="btn btn-secondary booking-dropdown-toggle flex items-center gap-8 pr-[18px]" type="button">
                                                Réserver
                                                <i class="bx bx-chevron-down bx-xs"></i>
                                            </button>
                                            <div class="booking-sub-menu hidden absolute top-full left-0 mt-8 py-8 shadow-md bg-soft-white-100 min-w-64 text-outer-space-700 rounded z-50">
                                                <?php if ( $lien_solo ) : ?>
                                                    <a href="<?php echo esc_url( $lien_solo ); ?>" target="_blank" class="block py-8 px-24 hover:bg-soft-white-200">Solo</a>
                                                <?php endif; ?>
                                                <?php if ( $lien_duo ) : ?>
                                                    <a href="<?php echo esc_url( $lien_duo ); ?>" target="_blank" class="block py-8 px-24 hover:bg-soft-white-200">Duo</a>
                                                <?php endif; ?>
                                                <?php if ( $lien_trio ) : ?>
                                                    <a href="<?php echo esc_url( $lien_trio ); ?>" target="_blank" class="block py-8 px-24 hover:bg-soft-white-200">Trio</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                        }
                        echo '</div>';
                    }
                }
            } else {
                echo '<p>Aucune prestation disponible pour le moment.</p>';
            }
            
            ?>
        </div>
        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tag filtering functionality
            const tagFilters = document.querySelectorAll('.tag-filter');
            const categorySections = document.querySelectorAll('.category-section');
            
            tagFilters.forEach(tag => {
                tag.addEventListener('click', function() {
                    const selectedCategory = this.getAttribute('data-category');
                    
                    // Update active tag
                    tagFilters.forEach(t => {
                        t.classList.remove('active', 'bg-outer-space-700', 'text-pure-white');
                        t.classList.add('bg-soft-white-300');
                    });
                    this.classList.remove('bg-soft-white-300');
                    this.classList.add('active', 'bg-outer-space-700', 'text-pure-white');
                    
                    // Show/hide category sections
                    categorySections.forEach(section => {
                        if (selectedCategory === 'all' || section.getAttribute('data-category') === selectedCategory) {
                            section.style.display = 'block';
                        } else {
                            section.style.display = 'none';
                        }
                    });
                });
            });
            
            // Booking dropdown functionality
            const bookingDropdowns = document.querySelectorAll('.booking-dropdown');
            
            bookingDropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.booking-dropdown-toggle');
                const menu = dropdown.querySelector('.booking-sub-menu');
                const chevron = toggle.querySelector('i');
                
                toggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    
                    // Close all other dropdowns
                    bookingDropdowns.forEach(otherDropdown => {
                        if (otherDropdown !== dropdown) {
                            const otherMenu = otherDropdown.querySelector('.booking-sub-menu');
                            const otherChevron = otherDropdown.querySelector('.booking-dropdown-toggle i');
                            otherMenu.classList.remove('open');
                            otherChevron.style.transform = 'rotate(0deg)';
                        }
                    });
                    
                    // Toggle current dropdown
                    if (menu.classList.contains('open')) {
                        menu.classList.remove('open');
                        chevron.style.transform = 'rotate(0deg)';
                    } else {
                        menu.classList.add('open');
                        chevron.style.transform = 'rotate(180deg)';
                    }
                });
            });
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.booking-dropdown')) {
                    bookingDropdowns.forEach(dropdown => {
                        const menu = dropdown.querySelector('.booking-sub-menu');
                        const chevron = dropdown.querySelector('.booking-dropdown-toggle i');
                        menu.classList.remove('open');
                        chevron.style.transform = 'rotate(0deg)';
                    });
                }
            });
        });
        </script>
    </div>
    <?php if( get_field('banner-pdf_display') ) : ?>
    <div class="container banner-pdf relative flex flex-col-reverse md:flex-row rounded-lg w-full overflow-hidden mb-80 bg-soft-white-200">
        <div class="flex flex-col items-start p-24 flex-1">
            <p class="mb-24"><?= esc_html( get_field('banner-pdf_text') ); ?></p>
            <a class="btn btn-secondary" href="<?= esc_html( get_field('banner-pdf_pdf') ); ?>" target="_blank">Télécharger</a>
        </div>
        <img src="<?= esc_html( get_field('banner-pdf_image') ); ?>" alt="PDF" class="block lg:absolute lg:right-0 lg:top-1/2 transform lg:-translate-y-1/2 md:w-[320px] object-contain">
    </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>