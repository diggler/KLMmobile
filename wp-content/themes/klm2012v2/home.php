<?php
/**
 * The main template file.
 *
 *
 *
 * @package WordPress
 * @subpackage KLM2012
 */

get_header(); ?>

<?php if (mobile_browser()>0){
	include (TEMPLATEPATH . '/inc/mobile-home.php' );
}else{
	include (TEMPLATEPATH . '/inc/main-home.php' ); 
}?>
<?php get_footer(); ?>