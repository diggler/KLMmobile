
<div data-role="content" data-theme="b">
	<?php 
    //featured events query
    $todaysDate = date('m/d/y');
    query_posts('posts_per_page=-1&post_type=event&meta_key=date&meta_compare=>=&meta_value=' . $todaysDate. '&orderby=meta_value&order=ASC');?>
    <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
    <li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-btn ui-bar-b ui-btn-up-undefined">Upcoming Events</span></li>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
        <?php endwhile;endif ?>
    </ul>
</div>