<?php

/**

 * Template Name: Single Event Template

 * @package WordPress

 * @subpackage KLM2012

 */



get_header(); ?>



		<div id="primary" class="single single-event ">

			<div id="content" role="main" class="grid_18">



			<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

				<?php while ( have_posts() ) : the_post(); ?>

				<?php //meta info holders

                $genre = get_the_terms( $post->ID, 'genres' ); if(is_array($genre)){foreach ( $genre as $genre ) {$genreslug = $genre->slug; $genre = $genre->name;}};

				$venue= get_the_terms( $post->ID, 'venue' ); if(is_array($venue)){foreach ( $venue as $venue ) { $venueslug = $venue->slug; $venue = $venue->name;}};

				$band = get_the_terms( $post->ID, 'band' ); if(is_array($band)){foreach ( $band as $band ) {$bandslug = $band->slug; $bandname = $band->name;}};

				$city = get_the_terms( $post->ID, 'city' ); if(is_array($city)){foreach ( $city as $city ) {$city = $city->name;}};

				?>

                <article>

                <?php 

                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

                      the_post_thumbnail('large');

                    } //else{

                    //echo "<img src=\"http://klm.apt2labs.com/wp-content/uploads/2012/02/no-image.png\" alt=\"\" title=\"\" height=\"260px\" width=\"260px\" />";

                    //}

                    ?>

                    <header>

                    	<h1><?php the_title();?></h1>

                        <ul>

                        	<li><b>Date:</b> <time><?php echo date('F j',strtotime(get_post_meta($post->ID, 'date', true)));?></time></li>

                            <li><b>Time:</b> <?php echo date('g:i a',strtotime(get_post_meta($post->ID, 'start_time', true)));?></li>

                            <?php 

							$cover = get_post_meta($post->ID, 'cover', false);

							if(isset($cover[0])){?>

                            <li><b>Cover:</b> $<?php echo $cover[0];?></li>

                            <?php }?>

                            <li><b>Venue:</b> <a href="/venue-profile/<?php echo $venueslug;?>"><?php echo $venue; ?></a></li>

                            <li><b>Genre:</b> <a href="/genres/<?php echo $genreslug;?>"><?php echo $genre ?></a></li>

                            <?php $band = get_the_terms( $post->ID, 'band' );

								if(is_array($band)){

									echo "<li><b>Bands:</b> ";

									foreach ( $band as $band ) {echo "<a href=\"/bands/".$band->slug."\">".$band->name."</a>"; };

									echo "</li>";

								}; ?>

                                

                        </ul>

                        

                    	<h3>Event Description</h3>

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

	'tax_query' => array(

		'relation' => 'OR',

		array(

			'taxonomy' => 'band',

			'field' => 'slug',

			'terms' => $bandname

		),

		array(

			'taxonomy' => 'venue',

			'field' => 'slug',

			'terms' => $venue

		),

		array(

			'taxonomy' => 'genres',

			'field' => 'slug',

			'terms' => $genre

		)

	)

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

                <h3>Similar Events <span class="red">&gt;&gt;</span></h3>

                <div class="content">

<?php 

//related events query

$todaysDate = date('m/d/y');

$args = array(

    'order' => 'ASC',

	'meta_key' => 'date', 

	'meta_value' => $todaysDate, 

	'meta_compare' => '>=',

	'posts_per_page' => 5,

	'post_type' => array('event'),

	'tax_query' => array(

		'relation' => 'OR',

		array(

			'taxonomy' => 'band',

			'field' => 'slug',

			'terms' => $bandname

		),

		array(

			'taxonomy' => 'venue',

			'field' => 'slug',

			'terms' => $venue

		),

		array(

			'taxonomy' => 'genres',

			'field' => 'slug',

			'terms' => $genre

		)

	)

);

$query = new WP_Query( $args );	



?>

       

                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>                       

                        <article>

                            <a href="<?php the_permalink(); ?>">

                                <header>

                                    <h4><?php the_title(); ?></h4>

                                    <span><?php echo date('F j',strtotime(get_post_meta($post->ID, 'date', true)));?> - <?php $venue = get_the_terms( $post->ID, 'venue' ); foreach ( $venue as $venue) {

		$venue = $venue->name;} echo $venue;?> - <?php $city = get_the_terms( $post->ID, 'city' ); foreach ( $city as $city) {echo $city->name;}?></span>

                                 </header>

                            </a>

                        </article>

                    

                    <?php endwhile; else: ?>

                    <p>Sorry, no related articles found!</p>

                    <?php endif; ?>



<?php // Reset Post Data

wp_reset_postdata();

?> 

                	</div><!-- END Related Events Content -->

                </div>

                

                <div class="grid_6 related_links">

                <h3>Share This Event <span class="red">&gt;&gt;</span></h3>

                

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

            

            

            </section>

					               

		</div><!-- #primary -->          

				





<?php get_sidebar(); ?>

<?php get_footer(); ?>

