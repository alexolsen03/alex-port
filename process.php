<?php

if (isset($_POST['postme'])){
	if (empty($_POST['poster-name']) || empty($_POST['poster-post'])) {
		die("You have forgotten to fill in one of the required fields! Please make sure you submit a name, e-mail address and comment.");
	}
	
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

	$commenttimestamp = strtotime("now");
	

	$name = htmlspecialchars(mysql_real_escape_string($_POST['poster-name']));
	$comment = htmlspecialchars(mysql_real_escape_string($_POST['poster-post']));
	
	if($query = mysql_query("INSERT INTO php_blog_comments (id, name, comment, timestamp) VALUES ('', '$name', '$comment', '$commenttimestamp');")){
		header('Location: codes.html');
	}else{
		echo "Error: \n";
		echo mysql_error();
	}
}


?>