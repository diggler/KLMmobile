<div data-role="content" data-theme="b">

<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

				<?php while ( have_posts() ) : the_post(); ?>

				<?php //meta info holders

                $genre = get_the_terms( $post->ID, 'genres' ); 

		if ( isset($genre) ){foreach ( $genre as $genre ) {$genre = $genre->name;}}

				$venue= get_the_terms( $post->ID, 'venue' );

 

				if ( isset($venue) ){

					foreach ( $venue as $venue ) {$venue = $venue->name;}

				}



				$band = get_the_terms( $post->ID, 'band' ); if ( isset($band) ){foreach ( $band as $band ) {$band = $band->name;}}

				$city = get_the_terms( $post->ID, 'city' ); if ( isset($city) ){foreach ( $city as $city ) {$city = $city->name;}}

				?>
                

                <article>
				

                
                    <header>
                    	<h1><?php the_title();?></h1>
                        <ul>
                        	<li><b>Published:</b> <time><?php the_time('F d, Y g:i a');?></time></li>
                            <li><b>Written by:</b> <?php the_author($POST-ID);?></li>
                        </ul>
                        <?php 

                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

                      the_post_thumbnail('large');
                    } else{
                    echo "<img src=\"http://klm.apt2labs.com/wp-content/uploads/2012/02/no-image.png\" alt=\"\" title=\"\" height=\"260px\" width=\"260px\" />";
                    }
                    ?>
                    	<?php the_content();?>
                   </header>
                </article>

                <?php endwhile; endif;?>


</div>