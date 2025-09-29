<?php
/**
 * Prestations Custom Post Type and Category Management
 * 
 * This file contains all functionality related to the Prestations custom post type
 * and its category management system.
 */

// Register Custom Post Type: Prestations
function register_prestations_post_type() {
    $labels = array(
        'name'                  => _x( 'Prestations', 'Post Type General Name', 'ospa' ),
        'singular_name'         => _x( 'prestation', 'Post Type Singular Name', 'ospa' ),
        'menu_name'             => __( 'Prestations', 'ospa' ),
        'name_admin_bar'        => __( 'Prestation', 'ospa' ),
        'archives'              => __( 'Archives des prestations', 'ospa' ),
        'attributes'            => __( 'Attributs de la prestation', 'ospa' ),
        'parent_item_colon'     => __( 'Prestation parente:', 'ospa' ),
        'all_items'             => __( 'Toutes les prestations', 'ospa' ),
        'add_new_item'          => __( 'Ajouter une nouvelle prestation', 'ospa' ),
        'add_new'               => __( 'Ajouter une nouvelle', 'ospa' ),
        'new_item'              => __( 'Nouvelle prestation', 'ospa' ),
        'edit_item'             => __( 'Modifier la prestation', 'ospa' ),
        'update_item'           => __( 'Mettre à jour la prestation', 'ospa' ),
        'view_item'             => __( 'Voir la prestation', 'ospa' ),
        'view_items'            => __( 'Voir les prestations', 'ospa' ),
        'search_items'          => __( 'Rechercher des prestations', 'ospa' ),
        'not_found'             => __( 'Aucune prestation trouvée', 'ospa' ),
        'not_found_in_trash'    => __( 'Aucune prestation trouvée dans la corbeille', 'ospa' ),
        'featured_image'        => __( 'Image mise en avant', 'ospa' ),
        'set_featured_image'    => __( 'Définir l\'image mise en avant', 'ospa' ),
        'remove_featured_image' => __( 'Supprimer l\'image mise en avant', 'ospa' ),
        'use_featured_image'    => __( 'Utiliser comme image mise en avant', 'ospa' ),
        'insert_into_item'      => __( 'Insérer dans la prestation', 'ospa' ),
        'uploaded_to_this_item' => __( 'Téléchargé pour cette prestation', 'ospa' ),
        'items_list'            => __( 'Liste des prestations', 'ospa' ),
        'items_list_navigation' => __( 'Navigation de la liste des prestations', 'ospa' ),
        'filter_items_list'     => __( 'Filtrer la liste des prestations', 'ospa' ),
    );
    
    $args = array(
        'label'                 => __( 'Prestation', 'ospa' ),
        'description'           => __( 'Prestations du spa', 'ospa' ),
        'labels'                => $labels,
        'supports'              => array( 'title' ),
        'taxonomies'            => array( 'prestations_categories' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-store',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'prestations', $args );
}
add_action( 'init', 'register_prestations_post_type', 0 );

// Register Custom Taxonomy: Prestations Categories
function register_prestations_categories() {
    $labels = array(
        'name'                       => _x( 'Catégories de prestations', 'Taxonomy General Name', 'ospa' ),
        'singular_name'              => _x( 'Catégorie de prestation', 'Taxonomy Singular Name', 'ospa' ),
        'menu_name'                  => __( 'Catégories', 'ospa' ),
        'all_items'                  => __( 'Toutes les catégories', 'ospa' ),
        'parent_item'                => __( 'Catégorie parente', 'ospa' ),
        'parent_item_colon'          => __( 'Catégorie parente:', 'ospa' ),
        'new_item_name'              => __( 'Nouvelle catégorie', 'ospa' ),
        'add_new_item'               => __( 'Ajouter une nouvelle catégorie', 'ospa' ),
        'edit_item'                  => __( 'Modifier la catégorie', 'ospa' ),
        'update_item'                => __( 'Mettre à jour la catégorie', 'ospa' ),
        'view_item'                  => __( 'Voir la catégorie', 'ospa' ),
        'separate_items_with_commas' => __( 'Séparer les catégories par des virgules', 'ospa' ),
        'add_or_remove_items'        => __( 'Ajouter ou supprimer des catégories', 'ospa' ),
        'choose_from_most_used'      => __( 'Choisir parmi les plus utilisées', 'ospa' ),
        'popular_items'              => __( 'Catégories populaires', 'ospa' ),
        'search_items'               => __( 'Rechercher des catégories', 'ospa' ),
        'not_found'                  => __( 'Aucune catégorie trouvée', 'ospa' ),
        'no_terms'                   => __( 'Aucune catégorie', 'ospa' ),
        'items_list'                 => __( 'Liste des catégories', 'ospa' ),
        'items_list_navigation'      => __( 'Navigation de la liste des catégories', 'ospa' ),
    );
    
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => false,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    
    register_taxonomy( 'prestations_categories', array( 'prestations' ), $args );
}
add_action( 'init', 'register_prestations_categories', 0 );

// Hide the default Categories page from ALL users
function hide_default_categories_menu() {
    // Hide from Prestations submenu for all users
    remove_submenu_page( 'edit.php?post_type=prestations', 'edit-tags.php?taxonomy=prestations_categories&post_type=prestations' );
    
    // Also try alternative menu slug formats
    remove_submenu_page( 'edit.php?post_type=prestations', 'edit-tags.php?taxonomy=prestations_categories' );
    
    // Remove the taxonomy menu completely
    remove_menu_page( 'edit-tags.php?taxonomy=prestations_categories' );
}
add_action( 'admin_menu', 'hide_default_categories_menu', 999 );

// Remove permissions for taxonomy management
function remove_prestations_categories_capabilities() {
    // Remove manage_categories capability for all users except administrators
    if ( ! current_user_can( 'administrator' ) ) {
        $user = wp_get_current_user();
        $user->remove_cap( 'manage_categories' );
        $user->remove_cap( 'edit_prestations_categories' );
        $user->remove_cap( 'delete_prestations_categories' );
        $user->remove_cap( 'assign_prestations_categories' );
    }
}
add_action( 'admin_init', 'remove_prestations_categories_capabilities' );

// Add custom admin page for category management
function add_category_management_page() {
    add_submenu_page(
        'edit.php?post_type=prestations',
        'Gérer les catégories',
        'Gérer les catégories',
        'manage_categories',
        'manage-categories',
        'category_management_page_callback'
    );
}
add_action( 'admin_menu', 'add_category_management_page' );

function category_management_page_callback() {
    // Enqueue necessary scripts and styles
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_style( 'wp-jquery-ui-dialog' );
    
    // Get all categories
    $categories = get_terms( array(
        'taxonomy' => 'prestations_categories',
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
    ) );
    
    // Sort categories by position meta, with fallback to name
    usort( $categories, function( $a, $b ) {
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
    
    // Clear any term cache to ensure fresh data
    wp_cache_delete( 'all_ids', 'prestations_categories' );
    clean_term_cache( array(), 'prestations_categories' );
    
    // Debug: Log category positions
    error_log('=== CATEGORY MANAGEMENT PAGE LOAD ===');
    foreach ( $categories as $category ) {
        $position = get_term_meta( $category->term_id, 'category_position', true );
        error_log("Category: {$category->name} (ID: {$category->term_id}) - Position: $position");
    }
    
    // Organize categories by parent-child relationship
    $parent_categories = array();
    $child_categories = array();
    
    if ( ! is_wp_error( $categories ) ) {
        foreach ( $categories as $category ) {
            if ( $category->parent == 0 ) {
                $parent_categories[] = $category;
            } else {
                $child_categories[$category->parent][] = $category;
            }
        }
    }
    ?>
    <div class="wrap">
        <h1>Gérer les catégories</h1>
        <p>Glissez-déposez les catégories pour les réorganiser, puis cliquez sur "Sauvegarder l'ordre des catégories".</p>
        
        <?php if ( isset( $_GET['message'] ) && $_GET['message'] === 'positions_saved' ): ?>
            <div class="notice notice-success is-dismissible">
                <p>L'ordre des catégories a été sauvegardé avec succès!</p>
            </div>
        <?php endif; ?>
        
        <form id="category-positions-form" method="post" action="">
            <?php wp_nonce_field( 'save_category_positions', 'category_positions_nonce' ); ?>
            <input type="hidden" name="action" value="save_category_positions">
            
            <div id="category-management-container">
                <?php foreach ( $parent_categories as $parent ) : ?>
                    <?php 
                    $is_soins_or_cours = ( strtolower( $parent->name ) === 'soins' || strtolower( $parent->name ) === 'cours' );
                    $has_children = isset( $child_categories[$parent->term_id] ) && ! empty( $child_categories[$parent->term_id] );
                    ?>
                    <div class="parent-category-group" data-parent-id="<?php echo $parent->term_id; ?>">
                        <div class="parent-category-header">
                            <h3 class="parent-category-title">
                                <span class="category-name"><?php echo esc_html( $parent->name ); ?></span>
                                <span class="category-count">(<?php echo $parent->count; ?> prestations)</span>
                            </h3>
                            <?php if ( ! $is_soins_or_cours ) : ?>
                                <div class="category-actions">
                                    <button class="button button-small edit-category" data-term-id="<?php echo $parent->term_id; ?>">Modifier</button>
                                    <button class="button button-small delete-category" data-term-id="<?php echo $parent->term_id; ?>">Supprimer</button>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <?php if ( $has_children && ! ( strtolower( $parent->name ) === 'cours' ) ) : ?>
                            <div class="child-categories-container" data-parent-id="<?php echo $parent->term_id; ?>">
                                <?php foreach ( $child_categories[$parent->term_id] as $child ) : ?>
                                    <?php 
                                    $position = get_term_meta( $child->term_id, 'category_position', true );
                                    if ( $position === '' ) {
                                        $position = 999; // Default position for categories without position meta
                                    }
                                    ?>
                                    <div class="child-category-item" data-term-id="<?php echo $child->term_id; ?>" data-parent-id="<?php echo $parent->term_id; ?>" data-position="<?php echo $position; ?>">
                                        <div class="drag-handle">⋮⋮</div>
                                        <div class="category-info">
                                            <span class="category-name"><?php echo esc_html( $child->name ); ?></span>
                                            <span class="category-count">(<?php echo $child->count; ?> prestations)</span>
                                        </div>
                                        <div class="category-actions">
                                            <button class="button button-small edit-category" data-term-id="<?php echo $child->term_id; ?>">Modifier</button>
                                            <button class="button button-small delete-category" data-term-id="<?php echo $child->term_id; ?>">Supprimer</button>
                                        </div>
                                        <input type="hidden" name="category_positions[<?php echo $child->term_id; ?>]" value="<?php echo $position; ?>" class="position-input">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="save-positions-section">
                <button type="submit" class="button button-primary">Sauvegarder l'ordre des catégories</button>
            </div>
        </form>
        
        <div class="add-category-section">
            <h3>Ajouter une nouvelle catégorie</h3>
            <form id="add-category-form">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="new-category-name">Nom de la catégorie</label>
                        </th>
                        <td>
                            <input type="text" id="new-category-name" name="category_name" required />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="new-category-parent">Catégorie parente</label>
                        </th>
                        <td>
                            <select id="new-category-parent" name="category_parent" disabled>
                                <option value="0">Aucune (catégorie principale)</option>
                                <?php foreach ( $parent_categories as $parent ) : ?>
                                    <?php if ( strtolower( $parent->name ) === 'soins' ) : ?>
                                        <option value="<?php echo $parent->term_id; ?>" selected><?php echo esc_html( $parent->name ); ?></option>
                                    <?php elseif ( strtolower( $parent->name ) !== 'cours' ) : ?>
                                        <option value="<?php echo $parent->term_id; ?>"><?php echo esc_html( $parent->name ); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="category_parent" value="<?php 
                                $soins_parent_id = 0;
                                foreach ( $parent_categories as $parent ) {
                                    if ( strtolower( $parent->name ) === 'soins' ) {
                                        $soins_parent_id = $parent->term_id;
                                        break;
                                    }
                                }
                                echo $soins_parent_id;
                            ?>" />
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <button type="submit" class="button button-primary">Ajouter la catégorie</button>
                </p>
            </form>
        </div>
    </div>
    
    <!-- Edit Category Dialog -->
    <div id="edit-category-dialog" title="Modifier la catégorie" style="display: none;">
        <form id="edit-category-form">
            <input type="hidden" id="edit-category-id" name="category_id" />
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="edit-category-name">Nom de la catégorie</label>
                    </th>
                    <td>
                        <input type="text" id="edit-category-name" name="category_name" required />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="edit-category-parent">Catégorie parente</label>
                    </th>
                    <td>
                        <select id="edit-category-parent" name="category_parent" disabled>
                            <option value="0">Aucune (catégorie principale)</option>
                            <?php foreach ( $parent_categories as $parent ) : ?>
                                <?php if ( strtolower( $parent->name ) === 'soins' ) : ?>
                                    <option value="<?php echo $parent->term_id; ?>" selected><?php echo esc_html( $parent->name ); ?></option>
                                <?php elseif ( strtolower( $parent->name ) !== 'cours' ) : ?>
                                    <option value="<?php echo $parent->term_id; ?>"><?php echo esc_html( $parent->name ); ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" id="edit-category-parent-hidden" name="category_parent" value="<?php 
                            foreach ( $parent_categories as $parent ) {
                                if ( strtolower( $parent->name ) === 'soins' ) {
                                    echo $parent->term_id;
                                    break;
                                }
                            }
                        ?>" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
    <style>
    .parent-category-group {
        margin-bottom: 30px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: #fff;
    }
    
    .parent-category-header {
        background: #f9f9f9;
        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .parent-category-title {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
    }
    
    .category-count {
        color: #666;
        font-weight: normal;
        font-size: 14px;
    }
    
    .child-categories-container {
        padding: 10px;
        min-height: 50px;
    }
    
    .child-category-item {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        margin: 5px 0;
        background: #f9f9f9;
        border: 1px solid #e0e0e0;
        border-radius: 3px;
        cursor: move;
    }
    
    .child-category-item:hover {
        background: #f0f0f0;
    }
    
    .drag-handle {
        margin-right: 10px;
        color: #999;
        font-size: 16px;
        cursor: grab;
    }
    
    .drag-handle:active {
        cursor: grabbing;
    }
    
    .category-info {
        flex-grow: 1;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .category-actions {
        display: flex;
        gap: 5px;
    }
    
    .sortable-placeholder {
        height: 50px;
        background: #e8f4fd;
        border: 2px dashed #0073aa;
        margin: 5px 0;
        border-radius: 3px;
    }
    
    .ui-sortable-helper {
        background: #fff !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        transform: rotate(2deg);
    }
    
    .add-category-section {
        margin-top: 40px;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 5px;
    }
    
    .form-table th {
        width: 150px;
    }
    
    .drag-handle {
        cursor: move;
        color: #999;
        font-size: 16px;
        margin-right: 10px;
        user-select: none;
    }
    
    .drag-handle:hover {
        color: #666;
    }
    
    .sortable-placeholder {
        height: 50px;
        background: #f0f0f0;
        border: 2px dashed #ccc;
        margin-bottom: 5px;
    }
    
    .child-category-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        margin-bottom: 5px;
        background: #fff;
    }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        // Make child categories sortable
        $('.child-categories-container').sortable({
            items: '.child-category-item',
            cursor: 'move',
            axis: 'y',
            handle: '.drag-handle',
            placeholder: 'sortable-placeholder',
            tolerance: 'pointer',
            containment: 'parent',
            update: function(event, ui) {
                updatePositionValues();
            }
        });
        
        // Update position values when items are reordered
        function updatePositionValues() {
            $('.child-categories-container').each(function() {
                var $container = $(this);
                var $items = $container.find('.child-category-item');
                
                // Get all current positions
                var positions = [];
                $items.each(function() {
                    positions.push(parseInt($(this).find('.position-input').val()));
                });
                
                // Sort positions to get new order
                positions.sort(function(a, b) { return a - b; });
                
                // Assign new positions based on DOM order
                $items.each(function(index) {
                    $(this).find('.position-input').val(positions[index]);
                });
            });
        }
        
        
        // Add category form
        $('#add-category-form').on('submit', function(e) {
            e.preventDefault();
            
            var formData = {
                action: 'add_category',
                category_name: $('#new-category-name').val(),
                category_parent: $('input[name="category_parent"]').val(),
                nonce: '<?php echo wp_create_nonce( 'category_management' ); ?>'
            };
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Erreur: ' + response.data);
                    }
                }
            });
        });
        
        // Edit category dialog
        $('#edit-category-dialog').dialog({
            autoOpen: false,
            modal: true,
            width: 500,
            buttons: {
                'Sauvegarder': function() {
                    var formData = {
                        action: 'edit_category',
                        category_id: $('#edit-category-id').val(),
                        category_name: $('#edit-category-name').val(),
                        category_parent: $('#edit-category-parent-hidden').val(),
                        nonce: '<?php echo wp_create_nonce( 'category_management' ); ?>'
                    };
                    
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                location.reload();
                            } else {
                                alert('Erreur: ' + response.data);
                            }
                        }
                    });
                },
                'Annuler': function() {
                    $(this).dialog('close');
                }
            }
        });
        
        // Edit category button
        $('.edit-category').on('click', function() {
            var termId = $(this).data('term-id');
            var categoryName = $(this).closest('.parent-category-group, .child-category-item').find('.category-name').first().text();
            var parentId = $(this).closest('.parent-category-group').data('parent-id') || 0;
            
            $('#edit-category-id').val(termId);
            $('#edit-category-name').val(categoryName);
            $('#edit-category-parent').val(parentId);
            $('#edit-category-parent-hidden').val(parentId);
            
            $('#edit-category-dialog').dialog('open');
        });
        
        // Delete category button
        $('.delete-category').on('click', function() {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')) {
                var termId = $(this).data('term-id');
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'delete_category',
                        category_id: termId,
                        nonce: '<?php echo wp_create_nonce( 'category_management' ); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert('Erreur: ' + response.data);
                        }
                    }
                });
            }
        });
        
    });
    </script>
    <?php
}

// AJAX handlers for category management
function handle_add_category() {
    if ( ! wp_verify_nonce( $_POST['nonce'], 'category_management' ) ) {
        wp_send_json_error( 'Security check failed' );
        return;
    }
    
    if ( ! current_user_can( 'manage_categories' ) ) {
        wp_send_json_error( 'Insufficient permissions' );
        return;
    }
    
    $category_name = sanitize_text_field( $_POST['category_name'] );
    $category_parent = intval( $_POST['category_parent'] );
    
    if ( empty( $category_name ) ) {
        wp_send_json_error( 'Category name is required' );
        return;
    }
    
    // Force new categories to be children of "Soins" if no parent is specified or if parent is 0
    if ( $category_parent == 0 ) {
        // Try different ways to find the "Soins" category
        $soins_term = get_term_by( 'slug', 'soins', 'prestations_categories' );
        if ( ! $soins_term || is_wp_error( $soins_term ) ) {
            $soins_term = get_term_by( 'name', 'Soins', 'prestations_categories' );
        }
        if ( ! $soins_term || is_wp_error( $soins_term ) ) {
            $soins_term = get_term_by( 'name', 'soins', 'prestations_categories' );
        }
        
        if ( $soins_term && ! is_wp_error( $soins_term ) ) {
            $category_parent = $soins_term->term_id;
        }
    }
    
    // Prevent creating categories under "Cours"
    if ( $category_parent > 0 ) {
        $parent_term = get_term( $category_parent, 'prestations_categories' );
        if ( $parent_term && ! is_wp_error( $parent_term ) && strtolower( $parent_term->name ) === 'cours' ) {
            wp_send_json_error( 'Cannot create categories under "Cours"' );
            return;
        }
    }
    
    $result = wp_insert_term( $category_name, 'prestations_categories', array(
        'parent' => $category_parent
    ) );
    
    if ( is_wp_error( $result ) ) {
        wp_send_json_error( $result->get_error_message() );
    } else {
        // Set a default position for the new category so it appears in the management interface
        $term_id = $result['term_id'];
        update_term_meta( $term_id, 'category_position', 999 ); // High number to put it at the end
        
        wp_send_json_success( 'Category added successfully' );
    }
}
add_action( 'wp_ajax_add_category', 'handle_add_category' );

function handle_edit_category() {
    if ( ! wp_verify_nonce( $_POST['nonce'], 'category_management' ) ) {
        wp_send_json_error( 'Security check failed' );
        return;
    }
    
    if ( ! current_user_can( 'manage_categories' ) ) {
        wp_send_json_error( 'Insufficient permissions' );
        return;
    }
    
    $category_id = intval( $_POST['category_id'] );
    $category_name = sanitize_text_field( $_POST['category_name'] );
    $category_parent = intval( $_POST['category_parent'] );
    
    if ( empty( $category_name ) ) {
        wp_send_json_error( 'Category name is required' );
        return;
    }
    
    // Prevent moving categories under "Cours"
    if ( $category_parent > 0 ) {
        $parent_term = get_term( $category_parent, 'prestations_categories' );
        if ( $parent_term && ! is_wp_error( $parent_term ) && strtolower( $parent_term->name ) === 'cours' ) {
            wp_send_json_error( 'Cannot move categories under "Cours"' );
            return;
        }
    }
    
    $result = wp_update_term( $category_id, 'prestations_categories', array(
        'name' => $category_name,
        'parent' => $category_parent
    ) );
    
    if ( is_wp_error( $result ) ) {
        wp_send_json_error( $result->get_error_message() );
    } else {
        wp_send_json_success( 'Category updated successfully' );
    }
}
add_action( 'wp_ajax_edit_category', 'handle_edit_category' );

function handle_delete_category() {
    if ( ! wp_verify_nonce( $_POST['nonce'], 'category_management' ) ) {
        wp_send_json_error( 'Security check failed' );
        return;
    }
    
    if ( ! current_user_can( 'manage_categories' ) ) {
        wp_send_json_error( 'Insufficient permissions' );
        return;
    }
    
    $category_id = intval( $_POST['category_id'] );
    
    $result = wp_delete_term( $category_id, 'prestations_categories' );
    
    if ( is_wp_error( $result ) ) {
        wp_send_json_error( $result->get_error_message() );
    } else {
        wp_send_json_success( 'Category deleted successfully' );
    }
}
add_action( 'wp_ajax_delete_category', 'handle_delete_category' );

function handle_save_category_positions() {
    // Check if this is a form submission for saving positions
    if ( isset( $_POST['action'] ) && $_POST['action'] === 'save_category_positions' ) {
        if ( ! wp_verify_nonce( $_POST['category_positions_nonce'], 'save_category_positions' ) ) {
            wp_die( 'Security check failed' );
        }
        
        if ( ! current_user_can( 'manage_categories' ) ) {
            wp_die( 'Insufficient permissions' );
        }
        
        $positions = $_POST['category_positions'];
        $updated_count = 0;
        
        error_log('Saving category positions: ' . print_r($positions, true));
        
        foreach ( $positions as $term_id => $position ) {
            $term_id = intval( $term_id );
            $position = intval( $position );
            
            error_log("Saving term $term_id with position $position");
            
            if ( $term_id > 0 ) {
                $result = update_term_meta( $term_id, 'category_position', $position );
                error_log("Update result for term $term_id: " . ($result ? 'success' : 'failed'));
                $updated_count++;
            }
        }
        
        error_log("Total positions saved: $updated_count");
        
        // Redirect back with success message
        wp_redirect( add_query_arg( 'message', 'positions_saved', wp_get_referer() ) );
        exit;
    }
}
add_action( 'admin_init', 'handle_save_category_positions' );

// Create default categories for prestations
function create_default_prestations_categories() {
    // First create the parent "Soins" category
    $soins_parent = wp_insert_term( 'Soins', 'prestations_categories' );
    $soins_parent_id = 0;
    
    if ( ! is_wp_error( $soins_parent ) ) {
        $soins_parent_id = $soins_parent['term_id'];
    } else {
        // If it already exists, get its ID
        $existing_soins = get_term_by( 'name', 'Soins', 'prestations_categories' );
        if ( $existing_soins && ! is_wp_error( $existing_soins ) ) {
            $soins_parent_id = $existing_soins->term_id;
        }
    }
    
    // Create child categories under "Soins"
    $child_categories = array(
        'Soins visage',
        'Soins corps', 
        'Massages',
        'Rituels'
    );
    
    foreach ( $child_categories as $index => $category ) {
        if ( ! term_exists( $category, 'prestations_categories' ) ) {
            $result = wp_insert_term( $category, 'prestations_categories', array(
                'parent' => $soins_parent_id
            ) );
            
            // Set position meta for the new category
            if ( ! is_wp_error( $result ) ) {
                update_term_meta( $result['term_id'], 'category_position', $index );
            }
        } else {
            // Ensure existing categories have position meta
            $existing_term = get_term_by( 'name', $category, 'prestations_categories' );
            if ( $existing_term && ! is_wp_error( $existing_term ) ) {
                $existing_position = get_term_meta( $existing_term->term_id, 'category_position', true );
                if ( empty( $existing_position ) ) {
                    update_term_meta( $existing_term->term_id, 'category_position', $index );
                }
            }
        }
    }
    
    // Create "Cours" as a separate top-level category
    if ( ! term_exists( 'Cours', 'prestations_categories' ) ) {
        $result = wp_insert_term( 'Cours', 'prestations_categories' );
        
        // Set position meta for the new category
        if ( ! is_wp_error( $result ) ) {
            update_term_meta( $result['term_id'], 'category_position', 999 );
        }
    } else {
        // Ensure existing "Cours" category has position meta
        $existing_cours = get_term_by( 'name', 'Cours', 'prestations_categories' );
        if ( $existing_cours && ! is_wp_error( $existing_cours ) ) {
            $existing_position = get_term_meta( $existing_cours->term_id, 'category_position', true );
            if ( empty( $existing_position ) ) {
                update_term_meta( $existing_cours->term_id, 'category_position', 999 );
            }
        }
    }
}
add_action( 'after_switch_theme', 'create_default_prestations_categories' );

// Ensure all existing categories have position meta fields
function ensure_categories_have_position_meta() {
    $all_categories = get_terms( array(
        'taxonomy' => 'prestations_categories',
        'hide_empty' => false,
    ) );
    
    if ( ! is_wp_error( $all_categories ) && ! empty( $all_categories ) ) {
        foreach ( $all_categories as $index => $category ) {
            $existing_position = get_term_meta( $category->term_id, 'category_position', true );
            if ( empty( $existing_position ) ) {
                // Set a default position based on the category order
                update_term_meta( $category->term_id, 'category_position', $index + 100 );
            }
        }
    }
}
add_action( 'admin_init', 'ensure_categories_have_position_meta' );

// Remove WYSIWYG editor and thumbnail for Prestations
function remove_prestations_editor() {
    remove_post_type_support( 'prestations', 'editor' );
    remove_post_type_support( 'prestations', 'thumbnail' );
}
add_action( 'init', 'remove_prestations_editor' );

// Remove taxonomy meta box from right panel for Prestations
function remove_prestations_taxonomy_meta_box() {
    remove_meta_box( 'prestations_categoriesdiv', 'prestations', 'side' );
}
add_action( 'admin_menu', 'remove_prestations_taxonomy_meta_box' );

// Add custom fields for Prestations
function add_prestations_meta_boxes() {
    add_meta_box(
        'prestations_details',
        __( 'Détails de la prestation', 'ospa' ),
        'prestations_meta_box_callback',
        'prestations',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_prestations_meta_boxes' );

function prestations_meta_box_callback( $post ) {
    wp_nonce_field( 'prestations_meta_box', 'prestations_meta_box_nonce' );
    
    $description = get_post_meta( $post->ID, '_prestation_description', true );
    $prix = get_post_meta( $post->ID, '_prestation_prix', true );
    $lien_solo = get_post_meta( $post->ID, '_prestation_lien_solo', true );
    $lien_duo = get_post_meta( $post->ID, '_prestation_lien_duo', true );
    $lien_trio = get_post_meta( $post->ID, '_prestation_lien_trio', true );
    
    // Get current categories
    $current_categories = wp_get_post_terms( $post->ID, 'prestations_categories', array( 'fields' => 'ids' ) );
    
    // Get all categories except the "soins" parent category, sorted by position
    $all_categories = get_terms( array(
        'taxonomy' => 'prestations_categories',
        'hide_empty' => false,
        'orderby' => 'meta_value_num',
        'meta_key' => 'category_position',
        'order' => 'ASC',
    ) );
    
    // If no categories have position meta, fallback to name ordering
    if ( empty( $all_categories ) ) {
        $all_categories = get_terms( array(
            'taxonomy' => 'prestations_categories',
            'hide_empty' => false,
            'orderby' => 'name',
            'order' => 'ASC',
        ) );
    }
    
    // Filter out the "soins" parent category from the list
    if ( ! is_wp_error( $all_categories ) && ! empty( $all_categories ) ) {
        $soins_parent = get_term_by( 'slug', 'soins', 'prestations_categories' );
        if ( $soins_parent && ! is_wp_error( $soins_parent ) ) {
            $all_categories = array_filter( $all_categories, function( $category ) use ( $soins_parent ) {
                return $category->term_id !== $soins_parent->term_id;
            } );
        }
    }
    ?>
    <div style="margin: 20px 0;">
        <div style="margin-bottom: 20px;">
            <label for="prestation_description" style="display: block; font-weight: 600; margin-bottom: 8px;"><?php _e( 'Description', 'ospa' ); ?></label>
            <textarea id="prestation_description" name="prestation_description" rows="4" style="width: 100%;" required><?php echo esc_textarea( $description ); ?></textarea>
        </div>


        <div style="margin-bottom: 20px;">
            <label for="prestation_prix" style="display: block; font-weight: 600; margin-bottom: 8px;"><?php _e( 'Prix', 'ospa' ); ?></label>
            <div style="display: flex; align-items: center; gap: 5px;">
                <input type="text" id="prestation_prix" name="prestation_prix" value="<?php echo esc_attr( $prix ); ?>" style="width: 80px;" required />
                <span style="font-weight: 600;">€</span>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="prestation_categories" style="display: block; font-weight: 600; margin-bottom: 8px;"><?php _e( 'Catégories', 'ospa' ); ?></label>
            <div id="category-tags" style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 4px; min-height: 40px;">
                <?php if ( ! is_wp_error( $all_categories ) && ! empty( $all_categories ) ) : ?>
                    <?php foreach ( $all_categories as $category ) : ?>
                        <button type="button" class="category-tag" data-category-id="<?php echo esc_attr( $category->term_id ); ?>" style="padding: 6px 12px; border: none; border-radius: 4px; background: #e0e0e0; color: #333; cursor: pointer; font-size: 14px; display: flex; align-items: center; gap: 6px;">
                            <span class="check-icon" style="font-size: 12px;">×</span>
                            <span class="category-name"><?php echo esc_html( $category->name ); ?></span>
                        </button>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p style="color: #666; font-style: italic;"><?php _e( 'Aucune catégorie disponible', 'ospa' ); ?></p>
                <?php endif; ?>
            </div>
            
            <!-- Hidden inputs to store selected categories -->
            <div id="selected-categories-inputs"></div>
            
            <p class="description">
                <?php _e( 'Cliquez sur les catégories pour les sélectionner. Pour ajouter des catégories, ', 'ospa' ); ?>
                <a href="<?php echo admin_url( 'edit-tags.php?taxonomy=prestations_categories&post_type=prestations' ); ?>" target="_blank">
                    <?php _e( 'cliquez ici', 'ospa' ); ?>
                </a>
            </p>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryTags = document.querySelectorAll('.category-tag');
            const selectedCategoriesInputs = document.getElementById('selected-categories-inputs');
            let selectedCategories = [];
            
            // Initialize with current categories
            <?php if ( ! empty( $current_categories ) ) : ?>
                selectedCategories = <?php echo json_encode( $current_categories ); ?>;
                updateSelectedCategories();
            <?php endif; ?>
            
            categoryTags.forEach(tag => {
                tag.addEventListener('click', function() {
                    const categoryId = parseInt(this.getAttribute('data-category-id'));
                    
                    if (selectedCategories.includes(categoryId)) {
                        // Remove from selection
                        selectedCategories = selectedCategories.filter(id => id !== categoryId);
                        this.style.background = '#e0e0e0';
                        this.style.color = '#333';
                        this.querySelector('.check-icon').textContent = '×';
                    } else {
                        // Add to selection
                        selectedCategories.push(categoryId);
                        this.style.background = '#0073aa';
                        this.style.color = '#fff';
                        this.querySelector('.check-icon').textContent = '✓';
                    }
                    
                    updateSelectedCategories();
                });
            });
            
            function updateSelectedCategories() {
                // Clear existing inputs
                selectedCategoriesInputs.innerHTML = '';
                
                // Create hidden inputs for selected categories
                selectedCategories.forEach(categoryId => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'prestation_categories[]';
                    input.value = categoryId;
                    selectedCategoriesInputs.appendChild(input);
                });
                
                // Update visual state of tags
                categoryTags.forEach(tag => {
                    const categoryId = parseInt(tag.getAttribute('data-category-id'));
                    if (selectedCategories.includes(categoryId)) {
                        tag.style.background = '#0073aa';
                        tag.style.color = '#fff';
                        tag.querySelector('.check-icon').textContent = '✓';
                    } else {
                        tag.style.background = '#e0e0e0';
                        tag.style.color = '#333';
                        tag.querySelector('.check-icon').textContent = '×';
                    }
                });
            }
        });
        </script>

        <div style="margin-bottom: 20px;">
            <h4 style="margin: 0 0 15px 0;"><?php _e( 'Liens de réservation', 'ospa' ); ?></h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px;">
                <div>
                    <label for="prestation_lien_solo" style="display: block; font-weight: 600; margin-bottom: 8px;"><?php _e( 'Solo', 'ospa' ); ?></label>
                    <input type="url" id="prestation_lien_solo" name="prestation_lien_solo" value="<?php echo esc_attr( $lien_solo ); ?>" placeholder="https://..." style="width: 100%;" />
                </div>
                <div>
                    <label for="prestation_lien_duo" style="display: block; font-weight: 600; margin-bottom: 8px;"><?php _e( 'Duo', 'ospa' ); ?></label>
                    <input type="url" id="prestation_lien_duo" name="prestation_lien_duo" value="<?php echo esc_attr( $lien_duo ); ?>" placeholder="https://..." style="width: 100%;" />
                </div>
                <div>
                    <label for="prestation_lien_trio" style="display: block; font-weight: 600; margin-bottom: 8px;"><?php _e( 'Trio', 'ospa' ); ?></label>
                    <input type="url" id="prestation_lien_trio" name="prestation_lien_trio" value="<?php echo esc_attr( $lien_trio ); ?>" placeholder="https://..." style="width: 100%;" />
                </div>
            </div>
        </div>
    </div>
    <?php
}

function save_prestations_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['prestations_meta_box_nonce'] ) ) {
        return;
    }
    
    if ( ! wp_verify_nonce( $_POST['prestations_meta_box_nonce'], 'prestations_meta_box' ) ) {
        return;
    }
    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    if ( isset( $_POST['post_type'] ) && 'prestations' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    
    $fields = array(
        'prestation_description',
        'prestation_prix',
        'prestation_lien_solo',
        'prestation_lien_duo',
        'prestation_lien_trio'
    );
    
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
        }
    }
    
    // Handle categories from dropdown selection
    if ( isset( $_POST['prestation_categories'] ) ) {
        $category_ids = array_map( 'intval', $_POST['prestation_categories'] );
        $category_ids = array_filter( $category_ids ); // Remove empty values
        
        // Validate that at least one category is selected
        if ( empty( $category_ids ) ) {
            add_action( 'admin_notices', function() {
                echo '<div class="notice notice-error"><p>Veuillez sélectionner au moins une catégorie.</p></div>';
            });
            return;
        }
        
        // Set the categories for this post
        wp_set_post_terms( $post_id, $category_ids, 'prestations_categories' );
    } else {
        // If no categories selected, show error
        add_action( 'admin_notices', function() {
            echo '<div class="notice notice-error"><p>Veuillez sélectionner au moins une catégorie.</p></div>';
        });
        return;
    }
}
add_action( 'save_post', 'save_prestations_meta_box_data' );

// Add client-side validation for required fields
function add_prestations_validation_script() {
    global $post_type;
    if ( $post_type == 'prestations' ) {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('#post');
            if (form) {
                // Function to show error message
                function showError(field, message) {
                    // Remove existing error
                    const existingError = field.parentNode.querySelector('.field-error');
                    if (existingError) {
                        existingError.remove();
                    }
                    
                    // Add red border
                    field.style.borderColor = '#dc3232';
                    
                    // Create error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'field-error';
                    errorDiv.style.color = '#dc3232';
                    errorDiv.style.fontSize = '12px';
                    errorDiv.style.marginTop = '4px';
                    errorDiv.textContent = message;
                    
                    // Insert after the field
                    field.parentNode.insertBefore(errorDiv, field.nextSibling);
                }
                
                // Function to clear error
                function clearError(field) {
                    const existingError = field.parentNode.querySelector('.field-error');
                    if (existingError) {
                        existingError.remove();
                    }
                    field.style.borderColor = '';
                }
                
                form.addEventListener('submit', function(e) {
                    const description = document.getElementById('prestation_description');
                    const price = document.getElementById('prestation_prix');
                    const categories = document.getElementById('prestation_categories');
                    
                    let hasErrors = false;
                    
                    // Clear previous errors
                    clearError(description);
                    clearError(price);
                    clearError(categories);
                    
                    // Validate description
                    if (!description.value.trim()) {
                        showError(description, 'La description est requise.');
                        hasErrors = true;
                    }
                    
                    // Validate price
                    if (!price.value.trim()) {
                        showError(price, 'Le prix est requis.');
                        hasErrors = true;
                    }
                    
                    // Validate categories
                    const selectedCategories = Array.from(categories.selectedOptions);
                    if (selectedCategories.length === 0) {
                        showError(categories, 'Veuillez sélectionner au moins une catégorie.');
                        hasErrors = true;
                    }
                    
                    if (hasErrors) {
                        e.preventDefault();
                        return false;
                    }
                });
            }
        });
        </script>
        <?php
    }
}
add_action( 'admin_footer', 'add_prestations_validation_script' );

// Custom admin menu order
function custom_admin_menu_order( $menu_order ) {
    if ( ! $menu_order ) return true;
    
    return array(
        'index.php', // Dashboard
        'edit.php?post_type=page', // Pages
        'edit.php?post_type=prestations', // Prestations
        'edit.php', // Posts (Articles)
        'upload.php', // Media
        'edit.php?post_type=attachment', // Attachments
        'edit-comments.php', // Comments
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
    );
}
add_filter( 'custom_menu_order', 'custom_admin_menu_order' );
add_filter( 'menu_order', 'custom_admin_menu_order' );

// Disable Yoast SEO for Prestations custom post type
function disable_yoast_seo_for_prestations() {
    if ( class_exists( 'WPSEO_Metabox' ) ) {
        remove_meta_box( 'wpseo_meta', 'prestations', 'normal' );
    }
}
add_action( 'add_meta_boxes', 'disable_yoast_seo_for_prestations', 20 );

// Alternative method to disable Yoast SEO for specific post types
function disable_yoast_seo_prestations( $post_types ) {
    if ( isset( $post_types['prestations'] ) ) {
        unset( $post_types['prestations'] );
    }
    return $post_types;
}
add_filter( 'wpseo_accessible_post_types', 'disable_yoast_seo_prestations' );
