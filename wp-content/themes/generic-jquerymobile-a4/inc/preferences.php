<?php

//	Theme Settings
//	Valid default theme letters are a, b, c, d and e.
$jqtheme = "a";						//	Global theme, affects all parts of the template. 
$jqtheme_mainlist = "a";			//	Theme of the main list of articles, also used in archive page and search results.
$jqtheme_sidebar = "a";				//	Theme of the widgets sidebar (positionned below in this case!).  
$jqtheme_sidebar_divider = "a";	//	Divider theme of the widgets sidebar.

//	The content of the sidebar	
//	Add the item name in the array to see it appear in the sidebar. 
//	The order in which you list them is the same as the order in which they will appear.
//	Current valid widget names are 'archives','pages','links','categories'.
$jqtheme_sidebar_items = array('categories','archives');// = array('archives','pages','links','categories');

//	If you wish to deregister some plugin script loading, put the script names in the following array.
//	The goal is to make the loading time as short as possible by cutting off unnecessary file loading.
//	Example: array('shutter','thickbox','jquery-cycle','ngg-slideshow','ngg-script');
$deregister_scripts = array();	//	If you wish to deregister scripts for mobile display

//	If you wish to deregister some css file loading, put the names in the following array.
//	Example: array('NextGEN','thickbox','thickbox');
$deregister_styles = array();		//	If you wish to deregister css file loading

//	If you wish to add additional information to the footer, put it in the following variable.
//	The class assigned to it is 'footer-extra'.
$jqtheme_footer_extra = "Some additional information. <a href='tel:1234567890'>T 123-456-7890</a>";

?>