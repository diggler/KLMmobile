<?php

/**

 * Template Name: Single Event Template

 * @package WordPress

 * @subpackage KLM2012

 */



get_header(); ?>



<?php if (mobile_browser()>0){
	include (TEMPLATEPATH . '/inc/mobile-singleevent.php' );
}else{
	include (TEMPLATEPATH . '/inc/main-singleevent.php' ); 
}?>
<?php get_footer(); ?>

