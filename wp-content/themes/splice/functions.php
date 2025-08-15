<?php
    if (!defined('ABSPATH')) exit;

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function splice_theme_setup() {
		load_theme_textdomain( 'splice', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'splice' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'splice_theme_setup' );

	if (function_exists('add_theme_support'))
	{
	    // Add Menu Support
	    add_theme_support('menus');

	    // Add Thumbnail Theme Support
	    add_theme_support('post-thumbnails');
	    add_image_size('large', 700, '', true); // Large Thumbnail
	    add_image_size('medium', 250, '', true); // Medium Thumbnail
	    add_image_size('small', 120, '', true); // Small Thumbnail
	    //add_image_size( 'single-post-thumbnail', 400, 267 );
	   

	    // Enables post and comment RSS feed links to head
	    add_theme_support('automatic-feed-links');

	    // Localisation Support
	    load_theme_textdomain('splice', get_template_directory() . '/languages');
	}

	function post_navigation() {
		the_posts_pagination(array(
			'prev_text' => __('&laquo; Previous', 'your-theme-textdomain'),
			'next_text' => __('Next &raquo;', 'your-theme-textdomain'),
			'mid_size'  => 2,
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'your-theme-textdomain') . ' </span>',
		));
	}

	if ( ! function_exists( 'posted_on' ) ) :
	function posted_on() {
		echo '<span class="posted-on">Posted on ' . get_the_date() . '</span>';
	}
	endif;

	function custom_breadcrumbs() {
    echo '<nav aria-label="breadcrumb">';
    echo '<ol class="breadcrumb">';

    // Home link
    echo '<li class="breadcrumb-item"><a href="' . home_url() . '">Home</a></li>';

    if (is_category() || is_single()) {
        // For posts
        $categories = get_the_category();
        if ($categories) {
            $category = $categories[0];
            echo '<li class="breadcrumb-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
        }
        if (is_single()) {
            echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
        }
    } elseif (is_page()) {
        // For pages (including hierarchical pages)
        global $post;
        if ($post->post_parent) {
            $ancestors = get_post_ancestors($post);
            $ancestors = array_reverse($ancestors);
            foreach ($ancestors as $ancestor) {
                echo '<li class="breadcrumb-item"><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
            }
        }
        echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
    } elseif (is_archive()) {
        echo '<li class="breadcrumb-item active" aria-current="page">' . post_type_archive_title('', false) . '</li>';
    } elseif (is_search()) {
        echo '<li class="breadcrumb-item active" aria-current="page">Search results for: ' . get_search_query() . '</li>';
    } elseif (is_404()) {
        echo '<li class="breadcrumb-item active" aria-current="page">404 Not Found</li>';
    }

		echo '</ol>';
		echo '</nav>';
	}

	add_action('pre_get_posts', 'filter_projects_by_date');
	function filter_projects_by_date($query) {
		if ( ! is_admin() && $query->is_main_query() && is_post_type_archive('projects') ) {

			$meta_query = array();

			if (!empty($_GET['start_date'])) {
				$meta_query[] = array(
					'key' => 'start_date',
					'value' => sanitize_text_field($_GET['start_date']),
					'compare' => '>=',
					'type' => 'DATE'
				);
			}

			if (!empty($_GET['end_date'])) {
				$meta_query[] = array(
					'key' => 'start_date',
					'value' => sanitize_text_field($_GET['end_date']),
					'compare' => '<=',
					'type' => 'DATE'
				);
			}

			if ($meta_query) {
				$query->set('meta_query', $meta_query);
			}

			$query->set('orderby', 'meta_value');
			$query->set('meta_key', 'start_date');
			$query->set('order', 'ASC');
		}
	}


// post type for Projects
	add_action('init', 'Projects_init');
	function Projects_init() {    
		$Projects_labels = array (
			'name'                  => _x('Projects', 'post type general name', 'textdomain'),
			'singular_name'         => _x('Project', 'post type singular name', 'textdomain'),
			'all_items'             => __('All Projects', 'textdomain'),
			'add_new'               => __('Add New Project', 'textdomain'),
			'add_new_item'          => __('Add New Project', 'textdomain'),
			'edit_item'             => __('Edit Project', 'textdomain'),
			'new_item'              => __('New Project', 'textdomain'),
			'view_item'             => __('View Project', 'textdomain'),
			'search_items'          => __('Search Projects', 'textdomain'),
			'not_found'             => __('No projects found', 'textdomain'),
			'not_found_in_trash'    => __('No projects found in Trash', 'textdomain'),
			'parent_item_colon'     => ''
		);
		
		$args = array(
			'labels'                => $Projects_labels,
			'public'                => true,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'query_var'             => true,
			'capability_type'       => 'post',
			'hierarchical'          => false,
			'menu_position'         => 8,
			'menu_icon'             => 'dashicons-lightbulb',
			'supports'              => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
			'has_archive'           => true,
			'rewrite'               => array('slug' => 'projects', 'with_front' => false),
			'taxonomies'            => array('post_tag'),
		);
		
		register_post_type('projects', $args);
	}
	
    require_once get_template_directory() . '/inc/rest-projects.php';
?>