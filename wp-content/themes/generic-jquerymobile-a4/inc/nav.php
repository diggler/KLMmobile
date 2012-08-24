<?php if (get_next_posts_link() || get_previous_posts_link()) {	?>
	
	<div class="older-entries-link"><?php next_posts_link(__('&laquo; Older Entries','genericjqm')); ?></div>
	<div class="newer-entries-link"><?php previous_posts_link(__('Newer Entries &raquo;','genericjqm')); ?></div>
	<div class="clear"></div>
	
<?php } ?>
