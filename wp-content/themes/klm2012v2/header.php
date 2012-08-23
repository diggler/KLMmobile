<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php
function mobile_browser(){
$mobi_check = '0';
 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobi_check++;
}
 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobi_check++;
}    
 
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobi_check++;
}
 
if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini') > 0) {
    $mobi_check++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows') > 0) {
    $mobi_check = 0;
}

return $mobi_check;
}
?>

<!-- Standard meta -->

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="description" content="<?php the_excerpt();?>" />

<meta name="keywords" content="Live Music, Kalamazoo, Events, Music News" />

<!-- END Standard Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php if (mobile_browser()>0){?>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
<link rel="stylesheet" href="css/style.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
<?php } ?>

<?php wp_head();?>



</head>
<body>

<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=125492450923259";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>

<?php // Get today's date in the right format

$todaysDate = date('m/d/Y H:i:s');

$todaysDay = date('l');

?>

<div id="wrapper" <?php if (mobile_browser()>0){ echo 'data-role="page" data-theme="b" data-content-theme="b"';}?>>

<?php if (mobile_browser()===0){
echo '<div class="container_24">';
}?>

    <header  <?php if (mobile_browser()>0){ echo 'data-role="header" data-theme="b" data-position="fixed" data-tap-toggle="false"'; }?>> 

    	<?php if (mobile_browser()>0){ 
		echo '<div data-role="navbar" data-iconpos="top">';
		}else{
        echo '<nav class="grid_18">';
		}?>

        <?php if (mobile_browser()>0){ 
			wp_nav_menu( array('menu' => 'Mobile Menu','container' => false ));
		}else{
        	wp_nav_menu( array('menu' => 'Primary Menu' ));
		}?>
        
        <?php if (mobile_browser()>0){ 
		echo '</div>';
		}else{
        echo '</nav>';
		}?>

		<?php if (mobile_browser()===0){?>

		<div class="grid_6 search">

			<?php //get_search_form( true ); ?>

		</div>

        <?php }?>

    </header>