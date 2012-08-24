<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title( __('Tag Archive for ','genericjqm') ."&quot;"); 
		         echo '&quot; - '; 
		         }
		      elseif (is_archive()) {
		         wp_title(''); 
		         echo __(' Archive - ','genericjqm'); 
		         }
		      elseif (is_search()) {
		         echo __('Search for','genericjqm'). ' &quot;'.wp_specialchars($s).'&quot; - '; 
		         }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); 
		         echo ' - '; 
		         }
		      elseif (is_404()) {
		         echo __('Not Found','genericjqm').' - '; 
		         }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); 
		         }
		      else {
		          bloginfo('name'); 
		          }
		      if ($paged>1) {
		         echo ' - page '. $paged; 
		         }
		   ?>
	</title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>		
</head>
<body <?php body_class(); ?>>

    <div data-role="page" data-theme="<?php jqtheme(); ?>" id="<?php 
    
    if (is_home() || is_front_page()) {
    		echo "home"; 
    	}
    	else
    	{
    		echo basename(get_permalink()); 
    }
    
    ?>">
		
		<div data-role="header" data-theme="<?php jqtheme(); ?>" data-backbtn="false">
			
			<div data-role="controlgroup" data-type="horizontal" data-iconpos="right" id="header_btn">
				<a href="#" data-role="button" data-icon="arrow-l" data-iconpos="notext" data-rel="back" data-direction="reverse"><?php echo __('Back','genericjqm') ?></a>
				<a href="<?php echo bloginfo('url'); ?>" data-role="button" data-icon="home" data-iconpos="notext" data-direction="reverse"><?php echo __('Home','genericjqm') ?></a>			
			</div>
			<h1 class="home-logo"><?php echo bloginfo('title'); ?></h1>
			
			<div data-role="navbar" id="header_navbar">
				<?php 
				wp_page_menu( array( 'sort_column' => 'menu_order' ) ); 
				?>
			</div>
			
		</div>
		
        <div data-role="content" data-theme="<?php jqtheme(); ?>">
           	