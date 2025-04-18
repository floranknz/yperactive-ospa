<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('', true,''); ?></title>
    <?php wp_head(); ?>
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/boxicons.min.css" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
    <header class="fixed w-full text-pure-white body-1 z-50 transition duration-300 max-md:border-b border-soft-white-100/30">
        <div class="container prenav hidden md:flex justify-end gap-32 py-12">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'secondary',
                    'container'      => false,
                    'items_wrap'     => '<ul class="flex gap-32 items-center">%3$s</ul>',
                    'fallback_cb'    => false,
                ));
            ?>
            <div class="rs flex gap-8 mt-4">
                <a href="https://www.facebook.com/profile.php?id=61559599148033" target="_blank"><i class="bx bx-sm bxl-facebook-square"></i></a>
                <a href="https://www.instagram.com/ospacarewellness/" target="_blank"><i class="bx bx-sm bxl-instagram"></i></a>
                <a href="https://www.linkedin.com/company/o-spa-care-wellness-spa-by-sothys" target="_blank"><i class="bx bx-sm bxl-linkedin"></i></a>
            </div>
        </div>
        <div class="separator hidden md:block w-full h-[1px] bg-pure-white opacity-30"></div>
        <div class="main-nav max-md:h-96 md:container max-md:mx-24 nav flex justify-between items-center">
            <div class="logo w-80 h-80 md:w-112 md:h-112 flex items-center">
                <?php if ( has_custom_logo() ) {
                    the_custom_logo();
                } else { ?>
                    <a href="<?= get_site_url() ?>"><img src="<?= get_stylesheet_directory_uri(); ?>/img/ospa-white.svg" alt="<?php bloginfo('name'); ?>" /></a>
                <?php } ?>
            </div>
            <div class="navbar flex gap-32 items-center -mt-32">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container' => '',
                    'items_wrap' => '<ul class="navbar-menu gap-32 hidden md:flex">%3$s</ul>',
                ) );
                ?>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container' => '',
                    'items_wrap' => '<ul class="navbar-menu-mobile hidden">%3$s</ul>',
                ) );
                ?>
                <?php
                $link_type = get_theme_mod( 'header_button_link_type', 'page' );
                if ( $link_type === 'page' ) {
                    $header_button_page_id = get_theme_mod( 'header_button_page' );
                    $header_button_url = $header_button_page_id ? get_permalink( $header_button_page_id ) : '#';
                    $target_attr = '';
                } else {
                    $header_button_url = get_theme_mod( 'header_button_url', '#' );
                    $target_attr = ' target="_blank"';
                }
                ?>
                <a href="<?php echo esc_url( $header_button_url ); ?>" class="btn btn-primary bg-pure-white text-mineral-green-800 hover:bg-soft-white-300"<?php echo $target_attr; ?>>Réserver</a>
                <div class="mobile-menu md:hidden flex items-center justify-center h-40 w-40 border border-soft-white-100/25 rounded cursor-pointer"><i class="bx bx-sm bx-menu-alt-right"></i></div>
            </div>
        </div>
    </header>