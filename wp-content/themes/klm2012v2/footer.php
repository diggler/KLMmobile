	
    <?php 
if (mobile_browser()>0){?>	
    <footer data-role="footer" data-theme="b" data-position="fixed" data-tap-toggle="false">
  	  <p> &copy; <?php echo date('Y'); ?> KalamazooLocalMusic.com</p>
    </footer>
<?php }else{ ?>
    <footer class="grid_24">
    
    	<nav class="">
        	
			<?php wp_nav_menu(array(
								'menu' => 'Footer Menu'	
									)
							  ); ?>
    		
        </nav>
    	<aside>
        
        	&copy; <?php echo date('Y'); ?> KalamazooLocalMusic.com
        
        </aside>
    </footer>
    </div><!-- END CONTAINER -->
    <?php if (mobile_browser()===0){wp_footer(); }?>
<?php }?>
</div><!-- END WRAPPER -->
</body>
</html>