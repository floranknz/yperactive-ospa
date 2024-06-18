<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="https://www.instagram.com/o_spa_by_sothys" target="_blank"><i class="bx bx-sm bxl-instagram"></i></a>
            </div>
        </div>
        <div class="separator hidden md:block w-full h-[1px] bg-pure-white opacity-30"></div>
        <div class="main-nav max-md:h-96 md:container max-md:mx-24 nav flex justify-between items-center">
            <div class="logo w-[80px] h-[80px] flex items-center justify-center">
                <?php if ( has_custom_logo() ) {
                    the_custom_logo();
                } else { ?>
                    <a href="<?= get_site_url() ?>"><img src="<?= get_stylesheet_directory_uri(); ?>/img/ospa-white.svg" alt="<?php bloginfo('name'); ?>" /></a>
                <?php } ?>
            </div>
            <div class="navbar flex gap-32 items-center">
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
                $header_button_page_id = get_theme_mod( 'header_button_page' );
                if ( $header_button_page_id ) {
                    $header_button_url = get_permalink( $header_button_page_id );
                } else {
                    $header_button_url = '#';
                }
                ?>
                <a href="<?php echo esc_url( $header_button_url ); ?>" class="btn btn-primary">Réserver</a>
                <div class="mobile-menu md:hidden flex items-center justify-center h-40 w-40 border border-soft-white-100/25 rounded cursor-pointer"><i class="bx bx-sm bx-menu-alt-right"></i></div>
            </div>
        </div>
    </header>
