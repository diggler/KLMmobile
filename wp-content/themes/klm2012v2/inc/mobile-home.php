<div data-role="content" data-theme="b" >


	<?php 
    //featured events query
    $todaysDate = date('m/d/y');
    query_posts('showposts=2&post_type=post&featured=featured');?>
    <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b" data-corners="false">
    <li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-btn ui-bar-b ui-btn-up-undefined">Featured</span></li>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
        <?php endwhile;endif ?>
    </ul>

<?php wp_reset_query(); ?>

<?php //headline articles
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 10,
	'tax_query'=> array(
		'relation' => 'OR',
		array(
			'taxonomy' => 'featured',
			'field' => 'slug',
			'terms' => array( 'featured' ),
			'operator' => 'NOT IN'
		)
	)
);
$query = new WP_Query( $args ); ?>             
	<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
    <li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-btn ui-bar-b ui-btn-up-undefined">Headlines</span></li>
		<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
        <?php endwhile;endif ?>
    </ul>
</div>