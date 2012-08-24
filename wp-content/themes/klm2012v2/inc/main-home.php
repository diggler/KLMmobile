<div id="primary" class="home magazine">
	<div id="content" role="main">
        <section class="grid_8 suffix_1 featured">
        
        
            <h3>Features <span class="red">&gt;&gt;</span></h3>

<?php //headline articles
query_posts('showposts=2&post_type=post&featured=featured'); ?>             

            <?php if ( have_posts() ) : while (have_posts()) : the_post() ?>
            <article>
            
                <div class="image">
                <?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail(array(290,290));
} else{
echo "<img src=\"http://klm.apt2labs.com/wp-content/uploads/2012/02/no-image.png\" alt=\"\" title=\"\" height=\"290px\" width=\"290px\" />";
}
?>
                </div>
                
                <div class="content">
                    <header>
                    <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                    </header>
                    
                    
                    <?php the_excerpt(); ?>
                    
              	</div>    
                  
                <div class="readmore">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More</a>
                            <a href="http://www.addthis.com/bookmark.php" 
            style="text-decoration:none;" 
            class="addthis_button" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">Share</a>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=dproczko"></script>
            <!-- AddThis Button END -->
                </div>
            	
            </article>

        <?php endwhile; else : ?>
        
            <article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title">Oh know! The needle skipped!</h1>
                </header><!-- .entry-header -->
        
                <div class="entry-content">
                    <p>Home Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
                    <?php get_search_form(); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-0 -->
        
        <?php endif; ?>
        <?php wp_reset_query(); ?> 
        
        
		</section>
            
        <section class="grid_8 suffix_1 mag_headlines">
            <div class="content">
        
        	<h3>Headlines <span class="red">&gt;&gt;</span></h3>
            
<?php //headline articles
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 12,
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

           <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <article>
            
                <header>
                    <h4><?php the_title(); ?></h4>
                    <span>Written by: <?php the_author();?></span>            
                </header>
            </article>
			</a>
            
        	<?php endwhile; else : ?>
        
            <article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title">Oh know! The needle skipped!</h1>
                </header><!-- .entry-header -->
        
                <div class="entry-content">
                    <p>Home Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
                    <?php get_search_form(); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-0 -->
        
        	<?php endif; ?>
        
        	</div>
        </section>
        
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>