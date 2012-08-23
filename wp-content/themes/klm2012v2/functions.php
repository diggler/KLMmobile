<?php

/*

 * KLM2012 functions and definitions

 *

 * @package WordPress

 * @subpackage KLM2012

 * @since KLM2012 1.0

 */

 

// This theme uses wp_nav_menu() in one location. 

	register_nav_menu( 'primary', 'Primary Menu' );
	register_nav_menu( 'mobile', 'Mobile Menu' );

	

// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images

	add_theme_support( 'post-thumbnails' );

	

// Registers all the widget areas for the theme



if ( function_exists('register_sidebar')) { 

	register_sidebar(array(

		'name'=> 'Sidebar-Page-Top',

		

		'before_widget' => '',

		'after_widget' => '',

		'before_title' => '',

		'after_title' => '',

	));

	register_sidebar(array(

		'name'=> 'Sidebar-Page-Bottom',

		

		'before_widget' => '',

		'after_widget' => '',

		'before_title' => '',

		'after_title' => '',

	));

	

	register_sidebar(array(

		'name'=> 'Contribute',

		

		'before_widget' => '<section>',

		'after_widget' => '</section>',

		'before_title' => '<h3>',

		'after_title' => '<span class="red">&gt;&gt;</span></h3>',

	));
	
	register_sidebar(array(

		'name'=> 'Front-Page-leaderboard-top',

		

		'before_widget' => '<section>',

		'after_widget' => '</section>',

		'before_title' => '<h3>',

		'after_title' => '<span class="red">&gt;&gt;</span></h3>',

	));
	
	register_sidebar(array(

		'name'=> 'Front-Page-leaderboard-bottom',

		

		'before_widget' => '<section>',

		'after_widget' => '</section>',

		'before_title' => '<h3>',

		'after_title' => '<span class="red">&gt;&gt;</span></h3>',

	));
	
	register_sidebar(array(

		'name'=> 'Post-leaderboard-top',

		

		'before_widget' => '<section>',

		'after_widget' => '</section>',

		'before_title' => '<h3>',

		'after_title' => '<span class="red">&gt;&gt;</span></h3>',

	));
	
	register_sidebar(array(

		'name'=> 'Post-leaderboard-bottom',

		

		'before_widget' => '<section>',

		'after_widget' => '</section>',

		'before_title' => '<h3>',

		'after_title' => '<span class="red">&gt;&gt;</span></h3>',

	));

}



//The following section will create the custom txonomies City, Venue, Band, Genre

//	

//This create the City Taxonomy

add_action( 'init', 'create_city' );

function create_city() {

 $labels = array(

    'name' => _x( 'City', 'taxonomy general name' ),

    'singular_name' => _x( 'City', 'taxonomy singular name' ),

	'plural_name' => _x( 'Cities', 'taxonomy plural name' ),

    'search_items' =>  __( 'Search Cities' ),

    'all_items' => __( 'All Cities' ),

    'parent_item' => __( 'Parent City' ),

    'parent_item_colon' => __( 'Parent City:' ),

    'edit_item' => __( 'Edit City' ),

    'update_item' => __( 'Update City' ),

    'add_new_item' => __( 'Add New City' ),

    'new_item_name' => __( 'New City Name' ),

  ); 	



  register_taxonomy('city',array('event','venue_profile','band_profile','specials','post'),array(

    'hierarchical' => true,

    'labels' => $labels

  ));

}

//Creates Venue Taxonomy

add_action( 'init', 'create_venue' );

function create_venue() {

 $labels = array(

    'name' => _x( 'Venue', 'taxonomy general name' ),

    'singular_name' => _x( 'Venue', 'taxonomy singular name' ),

	'plural_name' => _x( 'Venues', 'taxonomy plural name' ),

    'search_items' =>  __( 'Search Locations' ),

    'all_items' => __( 'All Vanues' ),

    'parent_item' => __( 'Parent Venue' ),

    'parent_item_colon' => __( 'Parent Venue:' ),

    'edit_item' => __( 'Edit Venue' ),

    'update_item' => __( 'Update Venue' ),

    'add_new_item' => __( 'Add New Venue' ),

    'new_item_name' => __( 'New Venue Name' ),

  ); 	



  register_taxonomy('venue',array('event','venue_profile','specials','post'),array(

    'hierarchical' => true,

    'labels' => $labels

  ));

}

//Creates Band Taxonomy

add_action( 'init', 'create_band' );

function create_band() {

 $labels = array(

    'name' => _x( 'Band', 'taxonomy general name' ),

    'singular_name' => _x( 'Band', 'taxonomy singular name' ),

	'plural_name' => _x( 'Bands', 'taxonomy plural name' ),

    'search_items' =>  __( 'Search Locations' ),

    'all_items' => __( 'All Bands' ),

    'parent_item' => __( 'Parent Band' ),

    'parent_item_colon' => __( 'Parent Band:' ),

    'edit_item' => __( 'Edit Band' ),

    'update_item' => __( 'Update Band' ),

    'add_new_item' => __( 'Add New Band' ),

    'new_item_name' => __( 'New Band Name' ),

  ); 	



  register_taxonomy('band',array('event', 'band_profile','post'),array(

    'hierarchical' => true,

    'labels' => $labels

  ));

}

//Creates Genre Taxonomy

add_action( 'init', 'create_genres' );

function create_genres() {

 $labels = array(

    'name' => _x( 'Genre', 'taxonomy general name' ),

    'singular_name' => _x( 'Genre', 'taxonomy singular name' ),

	'plural_name' => _x( 'Genres', 'taxonomy plural name' ),

    'search_items' =>  __( 'Search Genres' ),

    'all_items' => __( 'All Genres' ),

    'parent_item' => __( 'Parent Genre' ),

    'parent_item_colon' => __( 'Parent Genre:' ),

    'edit_item' => __( 'Edit Genre' ),

    'update_item' => __( 'Update Genre' ),

    'add_new_item' => __( 'Add New Genre' ),

    'new_item_name' => __( 'New Genre Name' ),

  ); 	



  register_taxonomy('genres', array('event','band_profile','post'),array(

    'hierarchical' => true,

    'labels' => $labels

  ));

}



//Creates Weekday Taxonomy

add_action( 'init', 'create_weekday' );

function create_weekday() {

 $labels = array(

    'name' => _x( 'Weekday', 'taxonomy general name' ),

    'singular_name' => _x( 'Weekday', 'taxonomy singular name' ),

	'plural_name' => _x( 'Weekdays', 'taxonomy plural name' ),

    'search_items' =>  __( 'Search Weekdays' ),

    'all_items' => __( 'All Weekdays' ),

    'parent_item' => __( 'Parent Weekday' ),

    'parent_item_colon' => __( 'Parent Weekday:' ),

    'edit_item' => __( 'Edit Weekday' ),

    'update_item' => __( 'Update Weekday' ),

    'add_new_item' => __( 'Add New Weekday' ),

    'new_item_name' => __( 'New Weekday Name' ),

  ); 	



  register_taxonomy('weekday',array('specials'),array(

    'hierarchical' => true,

    'labels' => $labels

  ));

}

//Creates Other Tags Taxonomy

add_action( 'init', 'other_tags' );

function other_tags() {

 $labels = array(

    'name' => _x( 'Other Tags', 'taxonomy general name' ),

    'singular_name' => _x( 'Other Tags', 'taxonomy singular name' ),

	'plural_name' => _x( 'Other Tags', 'taxonomy plural name' ),

    'search_items' =>  __( 'Search Other Tags' ),

    'all_items' => __( 'All Other Tags' ),

    'parent_item' => __( 'Parent Other Tag' ),

    'parent_item_colon' => __( 'Parent Other Tags:' ),

    'edit_item' => __( 'Edit Other Tags' ),

    'update_item' => __( 'Update Other Tags' ),

    'add_new_item' => __( 'Add New Other Tag' ),

    'new_item_name' => __( 'New Other Tag Name' ),

  ); 	



  register_taxonomy('other_tags',array('event','post'),array(

    'hierarchical' => true,

    'labels' => $labels

  ));

}

//Creates featured Taxonomy

add_action( 'init', 'create_featured' );

function create_featured() {

 $labels = array(

    'name' => _x( 'Featured', 'taxonomy general name' ),

    'singular_name' => _x( 'Featured', 'taxonomy singular name' ),

	'plural_name' => _x( 'Featured', 'taxonomy plural name' ),

    'search_items' =>  __( 'Search Featured' ),

    'all_items' => __( 'All Featured' ),

    'parent_item' => __( 'Parent Featured' ),

    'parent_item_colon' => __( 'Parent Featured:' ),

    'edit_item' => __( 'Edit Featured' ),

    'update_item' => __( 'Update Featured' ),

    'add_new_item' => __( 'Add New Featured' ),

    'new_item_name' => __( 'New Venue Featured' ),

  );

 

register_taxonomy('featured',array('event','post'),array(

    'hierarchical' => true,

    'labels' => $labels

  ));

}

//

//Section Creates Custom post types for Events, Band Profile, and Venue Profiles

//



//Creates Custom Post type Events

add_action( 'init', 'create_events' );

function create_events() {

  $labels = array(

    'name' => _x('Events', 'post type general name'),

    'singular_name' => _x('Event', 'post type singular name'),

    'add_new' => _x('Add New', 'Event'),

    'add_new_item' => __('Add New Event'),

    'edit_item' => __('Edit Event'),

    'new_item' => __('New Event'),

    'view_item' => __('View Event'),

    'search_items' => __('Search Events'),

    'not_found' =>  __('No Events found'),

    'not_found_in_trash' => __('No Events found in Trash'),

    'parent_item_colon' => '',

	'show_in_nav_menus' => true,

  );



  $supports = array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes');



  register_post_type( 'event',

    array(

      'labels' => $labels,

	  'rewrite' => array('slug' => 'event', 'with_front' => FALSE),

      'public' => true,

	  'query_var'=> true,

      'supports' => $supports

    )

  );

}



//Creates Custom Post type Band Profile

add_action( 'init', 'create_band_profile' );

function create_band_profile() {

  $labels = array(

    'name' => _x('Band Profiles', 'post type general name'),

    'singular_name' => _x('Band Profile', 'post type singular name'),

    'add_new' => _x('Add New', 'Band Profile'),

    'add_new_item' => __('Add New Band Profile'),

    'edit_item' => __('Edit Band Profile'),

    'new_item' => __('New Band Profile'),

    'view_item' => __('View Band Profile'),

    'search_items' => __('Search Band Profiles'),

    'not_found' =>  __('No Band Profiles found'),

    'not_found_in_trash' => __('No Band Profiles found in Trash'),

    'parent_item_colon' => '',

	'show_in_nav_menus' => true

  );



  $supports = array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes');



  register_post_type( 'band_profile',

    array(

      'labels' => $labels,

	  'rewrite' => array('slug' => 'bands', 'with_front' => FALSE),

      'public' => true,

	  'query_var'=> true,

      'supports' => $supports

    )

  );

}



//Creates Custom Post type Venue Profile

add_action( 'init', 'create_venue_profile' );

function create_venue_profile() {

  $labels = array(

    'name' => _x('Venue Profiles', 'post type general name'),

    'singular_name' => _x('venue Profile', 'post type singular name'),

    'add_new' => _x('Add New', 'Venue Profile'),

    'add_new_item' => __('Add New Venue Profile'),

    'edit_item' => __('Edit Venue Profile'),

    'new_item' => __('New Venue Profile'),

    'view_item' => __('View Venue Profile'),

    'search_items' => __('Search Venue Profiles'),

    'not_found' =>  __('No Venue Profiles found'),

    'not_found_in_trash' => __('No Venue Profiles found in Trash'),

    'parent_item_colon' => '',

	'show_in_nav_menus' => true,

  );



  $supports = array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes');



  register_post_type( 'venue_profile',

    array(

      'labels' => $labels,

	  'rewrite' => array('slug' => 'venue-profile', 'with_front' => FALSE),

      'public' => true,

	  'query_var'=> true,

      'supports' => $supports

    )

  );

}

//Creates Custom Post type Specials

add_action( 'init', 'create_specials' );

function create_specials() {

  $labels = array(

    'name' => _x('Specials', 'post type general name'),

    'singular_name' => _x('Special', 'post type singular name'),

    'add_new' => _x('Add New', 'Special'),

    'add_new_item' => __('Add New Special'),

    'edit_item' => __('Edit Special'),

    'new_item' => __('New Special'),

    'view_item' => __('View Special'),

    'search_items' => __('Search Specials'),

    'not_found' =>  __('No Specials found'),

    'not_found_in_trash' => __('No Specials found in Trash'),

    'parent_item_colon' => '',

	'show_in_nav_menus' => true,

  );



  $supports = array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes');



  register_post_type( 'specials',

    array(

      'labels' => $labels,

	  'rewrite' => array('slug' => 'specials', 'with_front' => FALSE),

      'public' => true,

	  'query_var'=> true,

      'supports' => $supports

    )

  );

}



// get taxonomies terms links

function custom_taxonomies_terms_links() {

	global $post, $post_id;

	// get post by post id

	$post = &get_post($post->ID);

	// get post type by post

	$post_type = $post->post_type;

	// get post type taxonomies

	$taxonomies = get_object_taxonomies($post_type);

	foreach ($taxonomies as $taxonomy) {

		// get the terms related to post

		$terms = get_the_terms( $post->ID, $taxonomy );

		if ( !empty( $terms ) ) {

			$out = array();

			foreach ( $terms as $term )

				$out[] = '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';

			$return = join( ', ', $out );

		}

		return $return;

	}

} 



//Adding the Open Graph in the Language Attributes

function add_opengraph_doctype( $output ) {

		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';

	}

add_filter('language_attributes', 'add_opengraph_doctype');



//Lets add Open Graph Meta Info



function insert_fb_in_head() {

	global $post;

	if ( !is_singular()) //if it is not a post or a page

		return;

        echo '<meta property="fb:admins" content="10101517890152780"/>';

	echo '<meta property="fb:app_id" content="119453834803440"/>';

        echo '<meta property="og:title" content="' . get_the_title() . '"/>';

        echo '<meta property="og:type" content="article"/>';

        echo '<meta property="og:url" content="' . get_permalink() . '"/>';

        echo '<meta property="og:site_name" content="Kalamazoo Local Music - Kalamazoo Live Music | Live Music, Event Calendar, Music Magazine"/>';

	if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image

		$default_image="http://kalamazoolocalmusic.com/wp-content/uploads/2012/03/KLM-Logo.jpg"; //replace this with a default image on your server or an image in your media library

		echo '<meta property="og:image" content="' . $default_image . '"/>';

	}

	else{

		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );

		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';

	}

	echo "\n";

}

add_action( 'wp_head', 'insert_fb_in_head', 5 );

?>