$('body > div').live('pagebeforecreate',function(event){
	
	/*$('a').attr('rel','external');	//	To get rid of transitions and ajax loading, uncomment this line	*/
	
	/*	Some native gallery styling	*/
	$('div.attachment').parent().removeClass('ui-overlay-shadow');
	$('div.gallery br').remove();
	$('div.gallery').append('<br style="clear:both;">');
	$('div.attachmentpopup div').css('margin','0').css('padding','0');
	$('form').attr('data-transition','fade');
	
	/*	Resizes iFramed YouTube to 290 width 	*/
	$('iframe[src*="youtube"]').each(function() {
			$(this).attr('width','290');
			$(this).attr('height','240');			
		});
	
	/*	Remove sub-pages in main menu so it doesn't break the displaying	*/
	$('#header_navbar ul.children').remove(); 
	
});

$('body > div').live('pageshow',function(event){

	/*		To prevent normal images (in articles) to be clickable	*/
	$('.entry a img:not(.attachment-thumbnail)').parent().attr('href','#');
	
	/*		Next and previous buttons styling for articles	*/
	if ($('.ui-page-active .nav-next-previous').length > 0) {
	$('.ui-page-active .nav-next-previous li.ui-btn').css('min-height','80px');
	$('.ui-page-active .nav-next-previous li:first .ui-btn-inner').css('text-align','right').css('padding','0px').css('min-height','80px');;
	$('.ui-page-active .nav-next-previous li:first span.ui-icon').css('left','10px');
	$('.ui-page-active .nav-next-previous li:first div.ui-btn-text').css('text-align','right').css('padding-right','5px;');
	$('.ui-page-active .nav-next-previous li:first h3.ui-li-heading').css('overflow-x','hidden').css('width','60%').css('position','absolute').css('right','95px').css('padding-top','31px').css('padding-bottom','10px');	
	$('.ui-page-active .nav-next-previous li:first div.ui-btn-text img').css('position','relative').css('float','right').css('right','1px').css('margin','0px 0px 0px 10px');
	$('.ui-page-active .nav-next-previous li:first .ui-li-desc').css('padding-top','10px').css('width','60%').css('position','absolute').css('right','95px');	
	if ($('.ui-page-active .nav-next-previous li:first img').length == 0) {
				$('.ui-page-active .nav-next-previous li:first h3.ui-li-heading').css('right','15px');
				$('.ui-page-active .nav-next-previous li:first .ui-li-desc').css('right','15px');
		}
	}
	
	adjust_image_width();
});

/*	Adjust image width to fit the screen on loading	*/
function adjust_image_width() {
	if ($('html.landscape .ui-page-active .entry a img:not(.attachment-thumbnail)').attr('width') > 500) {
		$('html.landscape .ui-page-active .entry a img:not(.attachment-thumbnail)').attr('width','500').removeAttr('height');
	}
	if ($('html.portrait .ui-page-active .entry a img:not(.attachment-thumbnail)').attr('width') > 290) {
		$('html.portrait .ui-page-active .entry a img:not(.attachment-thumbnail)').attr('width','290').removeAttr('height');
	}
}
	
  
 