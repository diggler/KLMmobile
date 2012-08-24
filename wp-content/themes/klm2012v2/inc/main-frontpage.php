<div id="primary">
            <div id="col1" class="grid_7 suffix_1">
				<section class="ft-events">
                    <h3>Featured Events <span class="red">&gt;&gt;</span></h3>
                    <div class="content">
<?php 
//featured events query
$todaysDate = date('m/d/y');
query_posts('showposts=5&post_type=event&featured=featured&meta_key=date&meta_compare=>=&meta_value=' . $todaysDate. '&orderby=meta_value_num&order=ASC'); ?>                    
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>                    
                        <article>
                            <a href="<?php the_permalink(); ?>">
                                <header>
                                    <h4><?php the_title(); ?></h4>
                                    <span><?php echo date('F j',strtotime(get_post_meta($post->ID, 'date', true)));?> - <?php $venue = get_the_terms( $post->ID, 'venue' ); foreach ( $venue as $venue) {
		$venue = $venue->name;} echo $venue;?> - <?php $city = get_the_terms( $post->ID, 'city' ); foreach ( $city as $city ) {
		$city = $city->name;} echo $city;?></span>
                                 </header>
                            </a>
                        </article>
<?php endwhile; else: ?>
<?php endif; ?>                        
<?php wp_reset_query(); ?>

						<article>
                            <a href="/feature-your-event/">
                                <header>
                                    <span>Feature your event</span>
                                </header>
                            </a>
                        </article>
                       </div>
               </section>

               <section class="ft-events">
                    <h3>Upcoming Events <span class="red"><span class="red">&gt;&gt;</span></span></h3>
                    <div class="content">
<?php 
//Today's events query
$todaysDate = date('m/d/y');
query_posts('showposts=5&post_type=event&meta_key=date&meta_compare=>=&meta_value=' . $todaysDate. '&orderby=meta_value&order=ASC'); ?>                    
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
<?php wp_reset_query(); ?>
	             	  <article>
                            <a href="/events/">
                                <header>
                                    <span>All Events</span>
                                </header>
                            </a>
                        </article>
                        <article>
                            <a href="/submit-event">
                                <header>
                                    <span>List your event</span>
                                </header>
                            </a>
                        </article>
                   </div>
               </section>
			</div>
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
                            <a href="http://www.addthis.com/bookmark.php" style="text-decoration:none;"mclass="addthis_button" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">Share</a>
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
	</div><!-- #primary -->

    <section class="grid_24 leaderboard">
		<?php if ( !function_exists('dynamic_sidebar')
            || !dynamic_sidebar('Front-Page-leaderboard-top') ) : ?>
        <?php endif; ?>     	
    </section>
    <div id="secondary">
    	<div id="col4" class="grid_8">
        	<section class="specials">
                    <h3>Featured Specials <span class="red">&gt;&gt;</span></h3>
                    <div class="content">
<?php 
//bnew Venue profiles
query_posts('showposts=5&post_type=specials&weekday='.$todaysDay); ?>                    
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>                    
                        <article>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                                <header>
                                    <h4><?php the_title();?></h4>
                                    <span><?php $venue = get_the_terms( $post->ID, 'venue' ); foreach ( $venue as $venue) {$venue = $venue->name;} echo $venue;?></span>
                                </header>
                            </a>
                        </article>
<?php endwhile; else: ?>
                        <article>
                            <span>Sorry, no specials found!</span>
                        </article>
<?php endif; ?>                        
<?php wp_reset_query(); ?>                        
                       <!-- <article>
                            <a href="">
                                <header>
                                    <span>All Specials</span>
                                </header>
                            </a>
                        </article> -->
					</div>
             </section>
        </div>
    	<div id="col5" class="grid_8">
        	<section class="new_profiles">
                    <h3>New Bands Profiles <span class="red">&gt;&gt;</span></h3>
<?php 
//New Band profiles
query_posts('showposts=3&post_type=band_profile'); ?>                    
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>                       
                    <article>
                    	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                            <?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('thumbnail');
} else{
echo "<img src=\"http://klm.apt2labs.com/wp-content/uploads/2012/02/no-image.png\" alt=\"\" title=\"\" height=\"70px\" width=\"70px\" />";
}
?>
                            <header>
                                <h4><?php the_title();?></h4>
                                <span><?php $city = get_the_terms( $post->ID, 'city' ); foreach ( $city as $city ) {
		$city = $city->name;} echo $city;?></span>
                            </header>
                            <p>Added: <?php the_time('M j, Y'); ?></p>
                        </a>
                    </article>
<?php endwhile; else: ?>
<p>Sorry, no band profiles found!</p>
<?php endif; ?>                        
<?php wp_reset_query(); ?>                    
                    <a href="/bands/" title="" class="major_link">All Bands</a>
			</section>
        </div>
        <div id="col6" class="grid_8">
        	<section class="new_profiles">
                    <h3>New Venue Profiles <span class="red">&gt;&gt;</span></h3>
<?php 
//New Venue profiles
query_posts('showposts=3&post_type=venue_profile'); ?>                    
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>                    
                    <article>
                    	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('thumbnail');
} else{
echo "<img src=\"http://klm.apt2labs.com/wp-content/uploads/2012/02/no-image.png\" alt=\"\" title=\"\" height=\"70px\" width=\"70px\" />";
}
?>
                            <header>
                                <h4><?php the_title();?></h4>
                                <span><?php $city = get_the_terms( $post->ID, 'city' ); foreach ( $city as $city ) {
		$city = $city->name;} echo $city;?></span>
                            </header>
                            <p>Added: <?php the_time('M j, Y'); ?></p>
                        </a>
                    </article>

<?php endwhile; else: ?>
<p>Sorry, no band profiles found!</p>
<?php endif; ?>                        
<?php wp_reset_query(); ?>                     
                    <a href="/venues/" title="" class="major_link">All Venues</a>
             </section>
        </div>
	</div><!-- #secondary -->
	<div class="clear"></div>
    <section class="grid_24 leaderboard">
    	<?php if ( !function_exists('dynamic_sidebar')
        	|| !dynamic_sidebar('Front-Page-leaderboard-bottom') ) : ?>
		<?php endif; ?> 
    </section>
    <div class="clear"></div>
<?php get_sidebar(); ?>