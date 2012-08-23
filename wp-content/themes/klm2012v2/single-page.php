<?php

/**

 * Template Name: Single Page Template

 * @package WordPress

 * @subpackage KLM2012

 */



get_header(); ?>



		<div id="primary" class="single single-post ">

			<div id="content" role="main" class="grid_18">



			<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

				<?php while ( have_posts() ) : the_post(); ?>

				

                <article>

          

                    <header>

                    	<h1><?php the_title();?></h1>



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

           

					               

		</div><!-- #primary -->          

				





<?php get_sidebar(); ?>

<?php get_footer(); ?>

