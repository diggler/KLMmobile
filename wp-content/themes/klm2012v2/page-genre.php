<?php
/**
 * The Top Level Genre landing page.
 *
 *
 * Template Name: Page Genre List Template
 * @package WordPress
 * @subpackage KLM2012
 */

get_header(); ?>

	<div id="primary" class="landing-genre">
	
            <div id="col1" class="grid_17 suffix_1">
            
				<section class="genre_list">


                    <h3>Genres <span class="red">&gt;&gt;</span></h3>
                    
                    <div class="content">
                    
                    	<?php $args = array(
							'smallest'                  => '12', 
							'largest'                   => '12',
							'unit'                      => 'px', 
							'number'                    => 0,  
							'format'                    => 'list',
							'separator'                 => '',
							'orderby'                   => 'name', 
							'order'                     => 'ASC',
							'exclude'                   => null, 
							'include'                   => null, 
							'topic_count_text_callback' => default_topic_count_text,
							'link'                      => 'view', 
							'taxonomy'                  => 'genres', 
							'echo'                      => true );
						
						$tag = wp_tag_cloud($args );?>

                       </div>
               </section>
               
	
			</div>
            
            	
                <?php get_sidebar(); ?> 
            
            
           
	</div><!-- #primary -->
    
	<div class="clear"></div>
    
    <section class="grid_24 leaderboard">
    
    	<img src="http://localhost/klm2012/wp-content/themes/klm2012/images/ad-728x90.png" />
    
    </section>
    
    <div class="clear"></div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>