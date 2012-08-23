<?php
/**
 * The Top Level Band landing page.
 *
 *
 * Template Name: Page Band List Template
 * @package WordPress
 * @subpackage KLM2012
 */

get_header(); ?>

	<div id="primary" class="landing-bands">
	
            <div id="col1" class="grid_17 suffix_1">
            
				<section class="band_list">


                    <h3>Bands <span class="red">&gt;&gt;</span></h3>
                    
                    <div class="content">
<?php 
//Band query
$posts = query_posts('&posts_per_page=-1&nopaging=true&post_type=band_profile&order=asc&orderby=title'); ?>                    
<?php 
$num_cols = 3;
if (have_posts()) :
  for ( $i=1 ; $i <= $num_cols; $i++ ) :
    echo '<div id="col-'.$i.'" class="col">';
    $counter = $num_cols + 1 - $i;
    while (have_posts()) : the_post();
      if( $counter % $num_cols == 0 ) : ?>                    
                        <article>
                    	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                            <?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail(array(60,60));
} else{
echo "<img src=\"http://klm.apt2labs.com/wp-content/uploads/2012/02/no-image.png\" alt=\"\" title=\"\" height=\"60px\" width=\"60px\" />";
}
?>
                            <header>
                                <h4><?php the_title();?></h4>
                                <span><?php $city = get_the_terms( $post->ID, 'city' ); foreach ( $city as $city ) {
		$city = $city->name;} echo $city;?></span>
                            </header>
                        </a>
                    </article>
<?php endif; $counter++; endwhile;
    rewind_posts();
    echo '</div>'; //closes the column div ?>
	
<?php endfor; else: ?>
<p>Sorry, no featured events!</p>
<?php endif; ?>                        
<?php wp_reset_query(); ?>

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