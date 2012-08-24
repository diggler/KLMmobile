
<div data-role="content" data-theme="b" >
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

                        
						<?php if (the_content()){
                    	echo '<h3>Event Description</h3>'.the_content();}?>

                        

                    </header>

                    

                    

                    

                

                </article>

                <?php endwhile; endif;?>
</div>