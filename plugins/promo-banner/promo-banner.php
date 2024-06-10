<?php
/*
Plugin Name: Promo Banner
Description: Permet de créer une bannière avec du texte, une date de début et de fin.
Version: 1.0
Author: Floran Knezevic
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Hook for adding admin menus
add_action('admin_menu', 'promo_banner_menu');

function promo_banner_menu() {
    add_menu_page(
        'Bandeau promotionnel', // Page title
        'Bandeau promotionnel', // Menu title
        'manage_options',  // Capability
        'promo-banner',   // Menu slug
        'promo_banner_page', // Callback function
        'dashicons-megaphone', // Icon URL
        90  // Position
    );
}

function promo_banner_page() {
    ?>
    <div class="wrap">
        <h1>Bandeau promotionnel</h1>
        <p>Ajoutez un bandeau qui apparaîtra en haut de votre site.</p>
        <form method="post" action="options.php">
            <?php settings_fields('promo_banner_settings'); ?>
            <?php do_settings_sections('promo_banner'); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'promo_banner_settings');

function promo_banner_settings() {
    register_setting('promo_banner_settings', 'banner_text');
    register_setting('promo_banner_settings', 'banner_start_date');
    register_setting('promo_banner_settings', 'banner_end_date');
    register_setting('promo_banner_settings', 'banner_link');

    add_settings_section('promo_banner_main', 'Configuration', 'promo_banner_section_text', 'promo_banner');

    add_settings_field('banner_text', 'Texte', 'banner_text_input', 'promo_banner', 'promo_banner_main');
    add_settings_field('banner_start_date', 'Date de début', 'banner_start_date_input', 'promo_banner', 'promo_banner_main');
    add_settings_field('banner_end_date', 'Date de fin', 'banner_end_date_input', 'promo_banner', 'promo_banner_main');
    add_settings_field('banner_link', 'Page associée', 'banner_link_input', 'promo_banner', 'promo_banner_main');
}

function promo_banner_section_text() {
    echo '<p>Personnalisez les réglages ci-dessous. Le bandeau apparaîtra automatiquement entre la date de début et la date de fin.</p>';
}

function banner_text_input() {
    $banner_text = get_option('banner_text');
    echo '<input type="text" id="banner_text" name="banner_text" value="' . esc_attr($banner_text) . '" size="110" maxlength="120" />';
    echo '<p style="font-size: 13px">Maximum 120 caractères</p>';
}

function banner_start_date_input() {
    $banner_start_date = get_option('banner_start_date');
    echo '<input type="date" id="banner_start_date" name="banner_start_date" value="' . esc_attr($banner_start_date) . '" />';
}

function banner_end_date_input() {
    $banner_end_date = get_option('banner_end_date');
    echo '<input type="date" id="banner_end_date" name="banner_end_date" value="' . esc_attr($banner_end_date) . '" />';
}

function banner_link_input() {
    $banner_link = get_option('banner_link');
    echo '<select id="banner_link" name="banner_link">';
    echo '<option value="">Sélectionnez une page ou un article</option>';

    $pages = get_pages();
    $posts = get_posts(array('numberposts' => -1));

    echo '<optgroup label="Pages">';
    foreach ($pages as $page) {
        $selected = ($banner_link == get_permalink($page->ID)) ? 'selected="selected"' : '';
        echo '<option value="' . esc_url(get_permalink($page->ID)) . '" ' . $selected . '>' . esc_html($page->post_title) . '</option>';
    }
    echo '</optgroup>';

    echo '<optgroup label="Posts">';
    foreach ($posts as $post) {
        $selected = ($banner_link == get_permalink($post->ID)) ? 'selected="selected"' : '';
        echo '<option value="' . esc_url(get_permalink($post->ID)) . '" ' . $selected . '>' . esc_html($post->post_title) . '</option>';
    }
    echo '</optgroup>';

    echo '</select>';
}

// Enqueue script for date picker if needed
add_action('admin_enqueue_scripts', 'promo_banner_admin_scripts');

function promo_banner_admin_scripts($hook) {
    if ($hook !== 'toplevel_page_promo-banner') {
        return;
    }
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
}

// Function to display the banner on the front end
function display_banner() {
    $banner_text = get_option('banner_text');
    $banner_start_date = get_option('banner_start_date');
    $banner_end_date = get_option('banner_end_date');
    $banner_link = get_option('banner_link');

    if ($banner_text && $banner_start_date && $banner_end_date) {
        date_default_timezone_set('Europe/Paris');
        $current_date = date('Y-m-d');
        if ($current_date >= $banner_start_date && $current_date <= $banner_end_date) {
            echo '
            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                    var header = document.querySelector("header");
                    if (header) {
                        var banner = document.createElement("div");
                        banner.className = "promotional-banner transition-all";
                        banner.style.marginTop = "-48px";
                        banner.innerHTML = "' . esc_html($banner_text) . '";
                        ' . ($banner_link ? 'banner.innerHTML = "<a href=\"' . esc_url($banner_link) . '\" style=\"color: #FFF; text-decoration: underline;\">' . esc_html($banner_text) . '</a>";' : '') . '
                        header.insertBefore(banner, header.firstChild);

                        if (sessionStorage.getItem("promoBannerSeen") !== "true") {
                            document.body.style.transition = ".5s 1s margin-top ease-in-out";
                            document.body.style.marginTop = "48px";
                            sessionStorage.setItem("promoBannerSeen", "true");
                        } else {
                            banner.style.marginTop = "0px";
                        }
                    }
                });
            </script>';
        }
    }
}
add_action('wp_head', 'display_banner');
