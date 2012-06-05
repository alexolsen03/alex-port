<?php
	$mysql_host='localhost';
	$mysql_username='root';
	$mysql_password='code*03';
	$mysql_db='alexblog';

	/*
	$mysql_host='localhost';
	$mysql_username='rtowro_root';
	$mysql_password='code*03';
	$mysql_db='rtowro_alexblog';
	*/

	if (!mysql_connect($mysql_host, $mysql_username, $mysql_password) || !mysql_select_db($mysql_db)){
		die('Could not connect');
	}
	
	if($query = mysql_query("SELECT * FROM php_blog_comments ORDER BY timestamp DESC")){
		$postarr = array();
		$count=0;
		
		date_default_timezone_set('US/Central');
		
		while($rows = mysql_fetch_assoc($query)){
			array_push($postarr, array());
			
			$name = $rows['name'];
			$post = $rows['comment'];
			$date = date("m/d/y H:i a", $rows['timestamp']);
			
			
			$postarr[$count][0] = $name;
			$postarr[$count][1] = $post;
			$postarr[$count][2] = $date;
			
			$count++;
		}
		
		$str = json_encode($postarr);
	
		echo $str;
	}else{
		echo mysql_error();
	}
?>