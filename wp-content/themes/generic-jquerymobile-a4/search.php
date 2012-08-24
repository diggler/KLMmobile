<?php get_header(); ?>

	<h2><?php echo __('Search results for','genericjqm'); ?> &#8216;<?php the_search_query(); ?>&#8217; </h2>
	
	<br/>
	
	<ul data-role="listview" data-theme="<?php jqtheme_mainlist(); ?>">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li>
				<p>
					<?php the_date('Y-m-d'); ?>
				</p>
				<h3>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?><?php the_title(); ?></a>
				</h3>
			</li>
		<?php endwhile;?>
	</ul>
	<p>
	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>	
	</p>

	<?php else : ?>

		<h2><?php echo __('No posts found.'); ?></h2>

	<?php endif; ?>
	
	<br />

<?php get_sidebar(); ?>

<?php get_footer(); ?>
