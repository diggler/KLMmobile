<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">

			<h1><?php the_title(); ?></h1>

			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">

				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => __('Pages: ','genericjqm') , 'next_or_number' => 'number')); ?>

			</div>


		</div>
		
	<?php comments_template(); ?>

	<?php endwhile; endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
