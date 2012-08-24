<?php get_header(); ?>

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; ?>
			
			<?php /* category archive */ if (is_category()) { ?>
				<h2><?php echo __('Archive for Category ','genericjqm'); ?>&#8216;<?php single_cat_title(); ?>&#8217;</h2>

			<?php /* tag archive */ } elseif(is_tag()) { ?>
				<h2><?php echo __('Posts Tagged ','genericjqm'); ?>&#8216;<?php single_tag_title(); ?>&#8217;</h2>

			<?php /* daily archive */ } elseif (is_day()) { ?>
				<h2><?php echo __('Archive for ','genericjqm'); 
							 the_time('F jS, Y'); ?></h2>

			<?php /* monthly archive */ } elseif (is_month()) { ?>
				<h2><?php echo __('Archive for ','genericjqm'); 
							 the_time('F, Y'); ?></h2>

			<?php /* yearly archive */ } elseif (is_year()) { ?>
				<h2 class="pagetitle"><?php echo __('Archive for ','genericjqm'); 
													 the_time('Y'); ?></h2>

			<?php /* author archive */ } elseif (is_author()) { ?>
				<h2 class="pagetitle"><?php echo __('Author Archives','genericjqm'); ?></h2>

			<?php /* paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="pagetitle"><?php echo __('Blog Archives','genericjqm'); ?></h2>
			
			<?php } ?>
			
			<br />
			
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
				<?php endwhile; endif;?>
				
			</ul>
			
			<p>
			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>	
			</p>
			
			<br />
			
	<?php else : ?>

		<h2><?php echo __('Nothing found','genericjqm'); ?></h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>