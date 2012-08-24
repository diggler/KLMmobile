<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<h1><?php the_title(); ?></h1>
			
			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">
				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
			</div>
			
			<div class="entry-utility">
				<?php mytheme_posted_in(); ?>
			</div><!-- .entry-utility -->
			
			
		</div>

	<?php comments_template(); ?>
	
	<?php endwhile; endif; ?>
	
<div data-role="listview" data-theme="<?php jqtheme_mainlist(); ?>" class="nav-next-previous">
<?php 

$previous_post = get_adjacent_post(false, '', true);

if ($previous_post) {
	?><li data-icon="arrow-l" data-iconpos="left" class="prev">
		<a href="<?php echo (get_permalink($previous_post->ID)); ?>">
		<?php echo get_the_post_thumbnail( $previous_post->ID,'thumbnail' ); ?>
		<p><?php echo mysql2date('Y-m-d', $previous_post->post_date); ?></p>
		<h3><?php echo get_the_title($previous_post->ID); ?></h3>
		</a>
		</li>
		<?php 
	}
	
$next_post = get_adjacent_post(false, '', false);
	
if ($next_post) {
	?><li class="next">
		<a href="<?php echo (get_permalink($next_post->ID)); ?>">
		<?php echo get_the_post_thumbnail( $next_post->ID,'thumbnail' ); ?>
		<p><?php echo mysql2date('Y-m-d', $next_post->post_date); ?></p>
		<h3><?php echo get_the_title($next_post->ID); ?></h3>
		</a>
		</li>
	<?php
	}


?>
</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>