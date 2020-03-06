<?php
// Register Custom Navigation Walker for function.php
require_once('wp_bootstrap_navwalker.php');

// Register Theme Features
function custom_theme_features()  {

    // Add theme support for Featured Images
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'custom_theme_features' );


// Register Sidebars
function custom_sidebar() {

    $args = array(
        'id'            => 'main-sidebar',
        'name'          => __( 'Main Widget Area', 'text_domain' ),
        'description'   => __( 'Appears on posts and pages in the sidebar.', 'text_domain' ),
        'before_title'  => '<h5 class="card-header">',
        'after_title'   => '</h5><div class="card-body">',
        'before_widget' => '<div class="card my-4" style="width: 100%;margin: auto">',
        'after_widget'  => '</div></div>',
    );
    register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebar' );





add_action( 'init', 'slider' );
/**
 * Register a Custom post type for.
 */
function slider() {
    $labels = array(
        'name'               => _x( 'Slider', 'post type general name'),
        'singular_name'      => _x( 'Slide', 'post type singular name'),
        'menu_name'          => _x( 'Bootstrap Slider', 'admin menu'),
        'name_admin_bar'     => _x( 'Slide', 'add new on admin bar'),
        'add_new'            => _x( 'Add New', 'Slide'),
        'add_new_item'       => __( 'Name'),
        'new_item'           => __( 'New Slide'),
        'edit_item'          => __( 'Edit Slide'),
        'view_item'          => __( 'View Slide'),
        'all_items'          => __( 'All Slide'),
        'featured_image'     => __( 'Featured Image', 'text_domain' ),
        'search_items'       => __( 'Search Slide'),
        'parent_item_colon'  => __( 'Parent Slide:'),
        'not_found'          => __( 'No Slide found.'),
        'not_found_in_trash' => __( 'No Slide found in Trash.'),
    );

    $args = array(
        'labels'             => $labels,
        'menu_icon'      => 'dashicons-star-half',
                'description'        => __( 'Description.'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title','editor','thumbnail')
    );

    register_post_type( 'slider', $args );
}

add_shortcode( 'display_homepage_slider', 'display_custom_post_type' );

function display_custom_post_type(){

    $string = '';
    $query = get_posts(array('post_type' => 'slider', 'posts_per_page' => 5));
    if( $query){
        $string .= '
                <div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
                  <div class="carousel-inner">';
        $count = 0;
        foreach($query as $slide){
            $count++;
            $class = $count == 2? 'active' : '';
            $string .= '<div class="carousel-item '.$class.'">
                      <img class="d-block w-100" src="'.wp_get_attachment_url( get_post_thumbnail_id($slide->ID)).'" alt="Second slide">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>'.$slide->title.'</h5>
                        <p>...</p>
                      </div>
                    </div>';
        }
        $string .= '</div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>';
    }
    wp_reset_postdata();
    return $string;
}