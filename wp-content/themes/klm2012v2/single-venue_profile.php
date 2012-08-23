<?php
/**
 * Template Name: Single Venue Template
 * @package WordPress
 * @subpackage KLM2012
 */

get_header(); ?>

		<div id="primary" class="single single-venue ">
			<div id="content" role="main" class="grid_18">

			<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php //meta info holders
				$venue= get_the_terms( $post->ID, 'venue' ); foreach ( $venue as $venue ) {$venue = $venue->name;};
				$city = get_the_terms( $post->ID, 'city' ); foreach ( $city as $city ) {$city = $city->name;}
				?>
                <article>
                <?php 
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                      the_post_thumbnail('large');
                    } else{
                    echo "<img src=\"http://klm.apt2labs.com/wp-content/uploads/2012/02/no-image.png\" alt=\"\" title=\"\" height=\"260px\" width=\"260px\" />";
                    }
                    ?>
                    <header>
                    	<h1><?php the_title();?></h1>
                        <ul>
                        <?php
						$custom_field_keys = get_post_custom_keys();
						$custom_fields = get_post_custom();
						foreach ( $custom_field_keys as $key => $value ) {
							$my_custom_field = $custom_fields[$value];
							echo $values;
							if ($value == 'Venue Address'){
								foreach ( $my_custom_field as $set => $link ){
									echo "<b>".$value."</b>:".$link ;
								}
							}
							
  						}
						?>
                        	<li><b>City:</b> <?php echo $city ?></li>
                        <?php
						$custom_field_keys = get_post_custom_keys();
						$custom_fields = get_post_custom();
						foreach ( $custom_field_keys as $key => $value ) {
							$my_custom_field = $custom_fields[$value];
							echo $values;
							if ($value == 'Zip'){
								foreach ( $my_custom_field as $set => $link ){
									echo "<b>".$value."</b>:".$link ;
								}
							}
							
  						}
						?>
                        </ul>
                        
                        <h3>Links</h3>
                        <ul>
                        <?php
						 $custom_field_keys = get_post_custom_keys();
						 $custom_fields = get_post_custom();
  foreach ( $custom_field_keys as $key => $value ) {
	  $my_custom_field = $custom_fields[$value];
	  echo $values;
	  if ($value != '_edit_last' && $value != '_edit_lock' && $value != '_thumbnail_id' && $value != 'Venue Address' && $value != 'Zip'){
		  foreach ( $my_custom_field as $set => $link ){
				echo "<li><a href=\"".$link."\">".$value . "</a></li>";
	  		  }
	  	  }
		  
  }
						?>
						</ul>
                        
                    	<h3>Venue Description</h3>
                    	<?php the_content();?>
                        
                    </header>
                    
                    
                    
                
                </article>
                <?php endwhile; ?>
				<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title">OH NO! The needle skipped!</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p>Apologies, but no results were found. Perhaps searching will help find a related post.</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
            
            <?php wp_reset_query(); 
			wp_reset_postdata();?>
			</div><!-- #content -->
		
            <div class="clear"></div>
            
            <section class="related">
            
                <div class="grid_6 related_posts">
                    <h3>Related Articles <span class="red">&gt;&gt;</span></h3>
<?php 
//related articles query
$args = array(
	'posts_per_page' => 3,
	'post_type' => array('post'),
	'venue' => $venue
);
$query = new WP_Query( $args );	

?>
       
                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>                       
                                        <article>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                                                <?php 
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                      the_post_thumbnail(array(50,50));
                    } else{
                    echo "<img src=\"http://klm.apt2labs.com/wp-content/uploads/2012/02/no-image.png\" alt=\"\" title=\"\" height=\"50px\" width=\"50px\" />";
                    }
                    ?>
                                                <header>
                                                    <h4><?php the_title();?></h4>
                                                </header>
                                                <p>Added: <?php the_time('M j, Y'); ?></p>
                                            </a>
                                        </article>
                    
                    <?php endwhile; else: ?>
                    <p>Sorry, no related articles found!</p>
                    <?php endif; ?>

<?php // Reset Post Data
wp_reset_postdata();
?>                       
                    
                </div>
                
                <div class="grid_6 related_events">
                <h3>Upcoming Events <span class="red">&gt;&gt;</span></h3>
                <div class="content">
<?php 
//related events query
$todaysDate = date('m/d/y');
$args = array(
    'order' => 'ASC',
	'meta_key' => 'date', 'meta_value' => $todaysDate, 'meta_compare' => '>=',
	'post_type' => array('event'),
	'venue'=> $venue
);
$query = new WP_Query( $args );	

?>
       
                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>                       
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
                    <p>Sorry, no upcoming events found!</p>
                    <?php endif; ?>

<?php // Reset Post Data
wp_reset_postdata();
?> 
                	</div><!-- END Related Events Content -->
                </div>
                
                <div class="grid_6 related_links">
                <h3>Share This Venue <span class="red">&gt;&gt;</span></h3>
                
                <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
<a class="addthis_button_tweet" tw:count="vertical"></a>
<a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
<div class="clear"></div>
<!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=dproczko"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d8f827b0ab46e3c"></script>
<!-- AddThis Button END -->
                
                </div>
<div class="clear"></div>
<div class="grid_11">            
<h3>Comments</h3>
<?php comments_template( '', true ); ?>            
</div>            
            
            </section>
					               
		</div><!-- #primary -->          
				


<?php get_sidebar(); ?>
<?php get_footer(); ?>
