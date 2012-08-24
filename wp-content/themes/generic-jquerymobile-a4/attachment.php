<?php get_header(); ?>
    
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			
						<?php if ( wp_attachment_is_image() ) :
							$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
							foreach ( $attachments as $k => $attachment ) {
								if ( $attachment->ID == $post->ID )
									break;
							}
							$k++;
							// If there is more than 1 image attachment in a gallery
							if ( count( $attachments ) > 1 ) {
								if ( isset( $attachments[ $k ] ) )
									// get the URL of the next image attachment
									$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
								else
									// or get the URL of the first image attachment
									$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
							} else {
								// or, if there's only 1 image attachment, get the URL of the image
								$next_attachment_url = wp_get_attachment_url();
							}

								$attachment_size = 290;
								echo '<h2>';
								the_title();
								echo '</h2><div class="attachment-wrapper"><div class="attachment-picture">';
								echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
								echo '</div></div><a class="next_picture_link" href="'.$next_attachment_url.'">'.__('Next Picture','genericjqm').'</a>';
								echo '<div class="clear">&nbsp;</div>';											

						 else : ?>
												<?php echo basename( get_permalink() ); ?>
						<?php endif; ?>
	
						<?php comments_template(); ?>
					
				

	<?php endwhile; endif; ?>
	
	
<?php //get_sidebar(); ?>
	
<?php get_footer(); ?>