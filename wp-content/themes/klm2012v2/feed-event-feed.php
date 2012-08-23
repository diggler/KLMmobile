<?php
/**
 * RSS2 Feed Template for displaying RSS2 Posts feed.
 *
 * @package WordPress
 */
header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>

<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	<?php do_action('rss2_ns'); ?>
>

<channel>
	<title>KLM | <?php bloginfo_rss('name'); wp_title_rss(); ?></title>
	<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
	<link><?php bloginfo_rss('url') ?></link>
	<description><?php bloginfo_rss("description") ?></description>
	<lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
	<language><?php bloginfo_rss( 'language' ); ?></language>
	<sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
	<sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>
	<?php do_action('rss2_head'); ?>
    <?php
		// Customize the query for this feed, below example
		// pulls post from the "test" tag.
		$todaysDate = date('m/d/y');
		query_posts('showposts=5&post_type=event&order=ASC&meta_key=date&meta_compare=>=&meta_value='.$todaysDate.'&orderby=meta_value');
	?>
	<?php while( have_posts()) : the_post(); ?>
	<item>
		<title><?php the_title_rss(); echo " @ ";
		$terms = get_the_terms( $post->ID, 'venue' );
		foreach ( $terms as $term ) {
		echo $term->name;
		}
		?></title>
        <pubDate><?php echo mysql2date('D, d M Y', strtotime(get_post_meta($post->ID, 'date', true))); ?></pubDate>
		<link><?php the_permalink_rss(); ?></link>
		<comments><?php comments_link_feed(); ?></comments>
		<dc:creator><?php the_author() ?></dc:creator>
		<?php the_category_rss('rss2') ?>
		<guid isPermaLink="false"><?php the_permalink_rss(); ?></guid>
		<description><![CDATA[
        <?php echo "Date: ".date('l - M d, Y',strtotime(get_post_meta($post->ID, 'date', true)));
		if ( get_post_meta($post->ID, 'start_time', true) ){
		echo "<br>Time: ".date('h:ia',strtotime(get_post_meta($post->ID, 'start_time', true)));
		}
		?>
        ]]> 
	</description>
		<wfw:commentRss><?php echo esc_url( get_post_comments_feed_link(null, 'rss2') ); ?></wfw:commentRss>
		<slash:comments><?php echo get_comments_number(); ?></slash:comments>
<?php rss_enclosure(); ?>
	<?php do_action('rss2_item'); ?>
	</item>
	<?php endwhile; ?>
</channel>
</rss>
