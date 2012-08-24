<?php
	
/*
	Get the theme parameters 
*/
require('inc/preferences.php');

	
/*
	Functions to assign predefined themes 
*/
function jqtheme() {
	global $jqtheme;
	echo $jqtheme;	
	}
function jqtheme_mainlist() {
	global $jqtheme_mainlist;
	echo $jqtheme_mainlist;	
	}
function jqtheme_sidebar() {
	global $jqtheme_sidebar;
	echo $jqtheme_sidebar;	
	}
function jqtheme_sidebar_divider() {
	global $jqtheme_sidebar_divider;
	echo $jqtheme_sidebar_divider;	
	}
	
/*
	Function that returns the sidebar widgets
*/
function jqtheme_get_sidebar() {
	global $jqtheme_sidebar_items;
	
		//	Display header
		if (count($jqtheme_sidebar_items) > 0) {
				?>
				<ul data-role="listview" data-inset="true" data-theme="<?php jqtheme_sidebar(); ?>" data-dividertheme="<?php jqtheme_sidebar_divider(); ?>">
				<?php
			}
			
		//	Display sidebar items 
		foreach ($jqtheme_sidebar_items as $sidebar_item) {
			
			switch ($sidebar_item) {
			    case 'archives':
			        jqtheme_display_sidebar_archives();
			        break;
			    case 'pages':
			        jqtheme_display_sidebar_pages();
			        break;
			    case 'links':
			        jqtheme_display_sidebar_links();
			        break;
			    case 'categories':
			        jqtheme_display_sidebar_categories();
			        break;
			}
			
		}
		
		//	Display footer	
		if (count($jqtheme_sidebar_items) > 0) {
				?>
				</ul>
				<?php
			}
	}
	
/*	Display sidebar archives	*/
function jqtheme_display_sidebar_archives() {
		?>		
		<li data-role="list-divider"><?php echo __('Archives','genericjqm'); ?></li>	
		<?php wp_get_archives('type=monthly'); 	
	}
	
/*	Display sidebar pages	*/
function jqtheme_display_sidebar_pages() {
		?>		
		<li data-role="list-divider"><?php echo __('Pages','genericjqm'); ?></li>	
		<?php wp_list_pages('title_li=<h2>Pages</h2>');	 
	}

/*	Display sidebar links	*/
function jqtheme_display_sidebar_links() {
		?>		
		<li data-role="list-divider"><?php echo __('Links','genericjqm'); ?></li>	
		<?php get_links_list(); 
	}

/*	Display sidebar categories	*/
function jqtheme_display_sidebar_categories() {
		?>		
		<li data-role="list-divider"><?php echo __('Categories','genericjqm'); ?></li>	
		<?php wp_list_categories('show_count=0&title_li='); 	
	}
	
/*	Display extra information in the footer	*/
function jqtheme_display_footer_extra() {
		global $jqtheme_footer_extra;
		echo '<div class="footer-extra">'.$jqtheme_footer_extra.'</div>';
	}

// Load jQuery
if ( !is_admin() ) {
   /*	Ajustement des styles et des scripts	*/	   
   add_action( 'wp_print_scripts', 'my_modified_javascript', 100 );
   add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
}

function my_modified_javascript() {
	//	Unregister predefined scripts 
	global $deregister_scripts;
   foreach ($deregister_scripts as $deregit) {
   	wp_deregister_script($deregit);
   	}
   
   //	Necessary to load jquery so we can use jquerymobile
   wp_deregister_script('jquery');
   wp_register_script('jquery', ("http://code.jquery.com/jquery-1.5.2.min.js"), false);
   wp_enqueue_script('jquery');
   
   //	Here is where you put your custom jquerymobile script file
   wp_register_script('fr-mobile-wp-scripts', ( get_bloginfo('template_url')."/scripts/fr-mobile-wp.js"), false);
   wp_enqueue_script('fr-mobile-wp-scripts');
   
   //	Finally we load the latest jquerymobile library avaiable 
   wp_register_script('jquerymobile', ("http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js"), false);
   wp_enqueue_script('jquerymobile');
}	

function my_deregister_styles() {
	//	To deregister style sheets unused by mobile
	global $deregister_styles;
	foreach ($deregister_styles as $deregit) {
   	wp_deregister_style($deregit);
   	}	
}

/*
	Language files for textdomain genericjqm;
*/
load_theme_textdomain( 'genericjqm', TEMPLATEPATH . '/languages' );
	
// Add RSS links to head section
automatic_feed_links();	


//	This theme supports post-thumbnails, 
//	meaning that if you're using a "featured image" for a post, 
//	it will appear next to the date and title in the listings.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
	


/**
 *
 *	*******	I took this code from WordPress core and modified it.
 *
 * The Gallery shortcode.
 *
 * This implements the functionality of the Gallery Shortcode for displaying
 * WordPress images on a post.
 *
 * @since 2.5.0
 *
 * @param array $attr Attributes attributed to the shortcode.
 * @return string HTML content to display gallery.
 */
function mobile_gallery_shortcode($attr) {
	global $post, $wp_locale;

	static $instance = 0;
	$instance++;

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		
	$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
	//$link = wp_get_attachment_link($id, $size, false, false);

		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon'>
				$link
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '<br style="clear: both" />';
	}

	$output .= "
			<br style='clear: both;' />
		</div>\n";

	return $output;
}
remove_shortcode('gallery');
add_shortcode('gallery', 'mobile_gallery_shortcode');




/*	Footer Text and buttons 	*/
function add_myfooter() {
	  	
    
}
add_action('wp_footer', 'add_myfooter');


/*	
	Nouvelle routine pour les commentaires	
*/
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
         <?php printf(__('<cite class="fn">%s</cite>','genericjqm'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.','genericjqm') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date('Y-m-d'),  get_comment_time('h:i')) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
}


/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function mytheme_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s.', 'genericjqm' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s.', 'genericjqm' );
	} 
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

?>