<?php
/**
 * The main template file.
 * Template Name: Page Template
 *
 * @package WordPress
 * @subpackage KLM2012
 */

get_header(); ?>

		<div id="primary" class="page">
	
            <div id="content" class="grid_17 suffix_1">
            
				<?php if ( have_posts() ) : ?>


				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<article>
                
                    <header>
                    	<h1><?php the_title();?></h1>

					<?php 
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                      echo '<div class=\'alignleft\'>';
					  the_post_thumbnail('');
					  echo '</div>';
                    } 
                    ?>

                    	<?php the_content();?>
                        
                    </header>
                    
                    
                    
                
                </article>

				<?php endwhile; ?>

				

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title">Oh know! The needle skipped!</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>