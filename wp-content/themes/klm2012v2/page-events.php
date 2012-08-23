<?php
/**
 * Template Name: Page Event Template
 * @package WordPress
 * @subpackage KLM2012
 */

get_header(); ?>

		<div id="primary">
	
            <div id="col1" class="grid_7 suffix_1">

			<section class="ft-events">
                    <h3>All Events <span class="red"><span class="red">&gt;&gt;</span></span></h3>
                    
                    <div class="content">
<?php 
//Today's events query
$todaysDate = date('m/d/y');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('posts_per_page=10&post_type=event&meta_key=date&meta_compare=>=&meta_value=' . $todaysDate. '&orderby=meta_value&order=ASC&paged='.$paged); ?>                    
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>                    
                        <article>
                            <a href="<?php the_permalink(); ?>">
                                <header>
                                    <h4><?php the_title(); ?></h4>
                                    <span><?php echo date('F j',strtotime(get_post_meta($post->ID, 'date', true)));?> - <?php $venue = get_the_terms( $post->ID, 'venue' ); foreach ( $venue as $venue) {$venue = $venue->name;} echo $venue;?> - <?php $city = get_the_terms( $post->ID, 'city' ); foreach ( $city as $city ) {$city = $city->name;} echo $city;?></span>
                                </header>
                            </a>
                        </article>
<?php endwhile; else: ?>
<p>Sorry, no featured events!</p>
<?php endif; ?>  
                     

			</div><!-- #col1 -->
<div class="navigation" style="text-align:center;"><p><?php posts_nav_link(); ?></p></div>
		</div><!-- #primary -->

<div id="col2" class="grid_9 suffix_1">
            	
                <section class="headlines">
                    <h3>Headlines <span class="red">&gt;&gt;</span></h3>

<?php 
//headline articles
query_posts('showposts=5&post_type=post'); ?>                    
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>                    
                    <article>
                    	<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('medium');
} else{
echo "<img src=\"http://klm.apt2labs.com/wp-content/uploads/2012/02/no-image.png\" alt=\"\" title=\"\" height=\"110px\" width=\"110px\" />";
}
?>
                        <header>
                        	<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                            <span>Written by: <?php the_author(); ?></span>
                        </header>
                        <div class="readmore">
                        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More</a>
                            <a href="http://www.addthis.com/bookmark.php" 
        style="text-decoration:none;" 
        class="addthis_button" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">Share</a>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=dproczko"></script>
<!-- AddThis Button END -->
                        </div>
                    </article>
<?php endwhile; else: ?>
<p>Sorry, no headlines found!</p>
<?php endif; ?>                        
<?php wp_reset_query(); ?>                    
                    
                    
                    <a href="/magazine/" title="Magazine" class="major_link">Current Issue</a>
               </section>
            
            </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>