<?php get_header(); ?>

	<ul data-role="listview" data-theme="<?php jqtheme_mainlist(); ?>">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li>
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?>
					<p>
						<?php the_date('Y-m-d'); ?>
					</p>
					<h2>
						<?php the_title(); ?>
					</h2>
				</a>
			</li>
		<?php endwhile;?>
	</ul>
	
	<p>
	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>	
	</p>
	
	<br />

	<?php else : ?>

		<h2><?php echo __('Not Found','genericjqm'); ?></h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
