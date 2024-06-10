<?php 

add_theme_support( 'post-thumbnails' );

function register_my_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Primary' ),
            'secondary' => __( 'Secondary' ),
            'footer_first' => __( 'Footer (column 1)' ),
            'footer_second' => __( 'Footer (column 2)' ),
        )
    );
}
add_action( 'init', 'register_my_menus' );

function enqueue_styles() {
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('boxicons', get_template_directory_uri() . '/css/boxicons.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

wp_enqueue_script('ui', get_template_directory_uri() . '/js/ui.js', array(), rand(111,9999), true);
$wp_data_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
wp_localize_script( 'ui', 'wpData', $wp_data_array );


// Remove contact form formatting
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_form_elements', function($content) {
    $content = str_replace('<span', '<div', $content);
    $content = str_replace('</span', '</div', $content);
    return $content;
});

// Add documentation with Notion iframe
function register_menu_document() {
    add_menu_page(
        'Documentation',        // Page title
        'Documentation',        // Menu title
        'read',                 // Capability
        'documentation',        // Menu slug
        'documentation_page_callback', // Callback function
        'dashicons-editor-help',  // Icon URL
        99                       // Position
    );
}
add_action( 'admin_menu', 'register_menu_document' );

function documentation_page_callback() {
    $url = get_template_directory_uri() . '/documentation/index.html';
    ?>
    <div class="wrap">
        <iframe src="<?php echo $url ?>" style="width: 100%; height: 100vh; border: 0; padding: 0"></iframe>
    </div>
    <?php
}


?>

