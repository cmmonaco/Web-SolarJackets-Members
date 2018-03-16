<?php
/*
// Create news and announcements script for Solar Jackets Members area.
// v1.0
// Copyright Chris Monaco
*/
	require_once('../_includes/dbconnect.php');
	require_once('../_includes/definesession.php');
	
	//Get Posted information. Validation checked before submission.
	$title = stripslashes(trim($_POST['title']));
	$categoryID = $_POST['category'];
	$content = stripslashes(trim($_POST['content']));
	echo $content;
	
	//Write MySQL query
	$query = "INSERT INTO articles (title, content, category_id, author_id, date) VALUES ('$title', '$content', '$categoryID', '$userID', NOW())";
	$result = mysql_query($query) or die("Error: unable to add article to database!");

	if($_POST['page'] == "main")
	{
		header('Location: ../main.php');
		exit();
	}
	else if($_POST['page'] == "create")
	{
		header('Location: ../news.php');
		exit();
	}
	
?>
	