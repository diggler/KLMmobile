<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<?php echo __('This post is password protected. Enter the password to view comments.','genericjqm'); ?>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	
	<div data-role="collapsible" data-state="collapsed" data-collapsed="true">
		<h2 id="comments"><?php comments_number( __('No Responses','genericjqm') , __('One Response','genericjqm') , __('% Responses','genericjqm')  );?></h2>

		<div class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</div>

		<ol class="commentlist">
			<?php 
			wp_list_comments('type=comment&callback=mytheme_comment');			
			?>
		</ol>

		<div class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</div>
	</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p><?php echo __('Comments are closed.','genericjqm'); ?></p>

	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">

	<h3><?php comment_form_title( __('Leave a Reply','genericjqm') , __('Leave a Reply to %s','genericjqm') ); ?></h3>

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php echo __('You must be ','genericjqm'); ?>
		 <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php echo __('logged in','genericjqm'); ?></a>
		 <?php echo __(' to post a comment.','genericjqm'); ?>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform<?php echo $post->ID; ?>">

		<?php if ( is_user_logged_in() ) : ?>

			<p><?php echo __('Logged in as ','genericjqm'); ?><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php echo __('Log out','genericjqm'); ?> &raquo;</a></p>

		<?php else : ?>

			<div data-role="fieldcontain">
				<label for="author"><?php echo __('Name','genericjqm'); ?> <?php if ($req) echo __('(required)','genericjqm'); ?></label>			
				<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>

			<div data-role="fieldcontain">
				<label for="email"><?php echo __('Mail (will not be published)','genericjqm'); ?> <?php if ($req) echo __('(required)','genericjqm'); ?></label>
				<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>

			<div data-role="fieldcontain">
				<label for="url"><?php echo __('Website','genericjqm'); ?></label>
				<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			</div>

		<?php endif; ?>

		<div data-role="fieldcontain">
			<label for="comment"><?php echo __('Comment','genericjqm'); ?></label>
			<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
		</div>

		<div>
			<input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo __('Submit Comment','genericjqm'); ?>" />
			<?php comment_id_fields(); ?>
		</div>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; ?>
	
</div>

<?php endif; ?>
