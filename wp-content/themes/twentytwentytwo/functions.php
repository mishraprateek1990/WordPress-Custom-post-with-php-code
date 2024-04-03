<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// filter blogs Function to load blog posts via AJAX
add_action('wp_ajax_load_blog_posts', 'load_blog_posts');
add_action('wp_ajax_nopriv_load_blog_posts', 'load_blog_posts');
function load_blog_posts() {
    $category = $_POST['category'];
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category_name' => $category
    );
    $posts = new WP_Query($args);
    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<div>' . get_the_content() . '</div>';
        }
        wp_reset_postdata();
    } else {
        echo 'No posts found';
    }
    die();
}

// custom post type
function custom_post_type() {
    register_post_type('custom_post', array(
        'labels' => array(
            'name' => __('Custom Post Type'),
            'singular_name' => __('Custom Post'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'custom-post'),
    ));
}
add_action('init', 'custom_post_type');

// custom texonomy
function custom_taxonomy() {
    register_taxonomy('prateek_taxonomy', 'custom_post', array(
        'label' => __('Custom Taxonomy'),
        'rewrite' => array('slug' => 'prateek-taxonomy'),
        'hierarchical' => true,
    ));
}
add_action('init', 'custom_taxonomy');



