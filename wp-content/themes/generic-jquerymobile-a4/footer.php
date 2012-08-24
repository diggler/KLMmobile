
		    </div><!-- data role content-->

			
        <div data-role="footer" class="ui-bar ui-footer" data-theme="<?php jqtheme(); ?>">

			<div data-role="controlgroup" data-type="horizontal" data-iconpos="right" id="footer_btn">
				<a href="#" data-role="button" data-icon="arrow-l" data-iconpos="notext" data-rel="back" data-direction="reverse">Back</a>
				<a href="<?php echo bloginfo('url'); ?>" data-role="button" data-icon="home" data-iconpos="notext" data-direction="reverse">Home</a>			
			</div>	
			<div style="clear:both;"></div>
		   <div class="footer-title">
		   <?php echo bloginfo('title'); ?><br />
		   <span class="footer_description"><?php echo bloginfo('description'); ?></span>
		   </div>      
		   
        	<?php 
			jqtheme_display_footer_extra();        	
        	wp_footer(); ?>
     
		</div><!-- data role footer-->
		
</body>

</html>
