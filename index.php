<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 

<title></title>


<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
<link rel="stylesheet" href="css/style.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
</head>

<body>
<?php include_once("connection.php"); ?>
<div data-role="page" data-theme="b" data-content-theme="b">

    <header data-role="header" data-theme="b">
    	<img src="http://kalamazoolocalmusic.com/wp-content/themes/klm2012/images/logo.png" title="Kalamazoo Local Music" alt="KalamazooLocalMusic.com" width="25%">
        
        <div data-role="navbar" data-iconpos="top">
            <ul>
                <li><a href="http://m.kalamazoolocalmusic.com" class="ui-btn-active">Events</a></li>
                <li><a href="">News</a></li>
                <li><a href="">Genre</a></li>
                <li><a href="">Venue</a></li>
            </ul>
        </div><!-- /navbar -->
    </header>
    
    

    
    <div class="content_wrap" data-role="content">
    <?php //database select
		$post = "SELECT * FROM wp_posts 
		INNER JOIN wp_postmeta ON wp_posts.ID=wp_postmeta.post_id 
		WHERE post_type='event' AND post_status='publish' AND meta_key = 'date' AND STR_TO_DATE(meta_value,'%m/%d/%Y') >= STR_TO_DATE('".date('Y-m-d 00:00:00')."', '%Y-%m-%d %H:%i:%s') ORDER BY STR_TO_DATE(meta_value,'%m/%d/%Y') ASC"; 
		$posts = mysql_query($post, $connect);
		echo date('Y-m-d H:i:s')."<br>";
		echo  mysql_num_rows ($posts)."<br>";
		while ($events = mysql_fetch_array($posts, MYSQL_ASSOC)) {
			
			$start_query = "SELECT meta_value FROM wp_postmeta WHERE post_id='".$events['ID']."' AND meta_key='start_time'";
			$start_time = mysql_query($start_query, $connect);
			$genre_query = "
			SELECT * FROM wp_terms  
			INNER JOIN wp_term_taxonomy ON wp_term_taxonomy.term_id=wp_terms.term_id
			INNER JOIN wp_term_relationships ON wp_term_relationships.term_taxonomy_id=wp_term_taxonomy.term_taxonomy_id
			WHERE object_id='".$events['ID']."' 
			AND taxonomy='genres'";
			$genres = mysql_query($genre_query, $connect) or die("No Results");
			//$venue_query = ;
			//$band_query = ;
			echo $events['ID'];
			print_r($events['post_title']); echo "<br>";
			print_r($events['meta_value']); echo "<br>";
			//start time query loop
			while ($start = mysql_fetch_array($start_time, MYSQL_ASSOC)){
				print_r($start['meta_value']); echo "<br>";
			}
			//genre query loop
			while ($genre = mysql_fetch_array($genres, MYSQL_ASSOC)){
				print_r($genre['name']); echo "<br>";
			}
			echo "<br>";
		}
		//$results = mysql_fetch_assoc($posts);
		//print_r($results);


//
		

	?>
    
    </div> 
    
    <footer data-role="footer" data-theme="b">
     <p>&copy; <?php echo Date('Y'); ?> KalamazooLocalMusic.com</p>
    </footer>

</div>
</body>
</html>