<?php
/*
// Script for displaying news and announcements.
// v1.0
// Copyright Chris Monaco
*/
	
	if($_SERVER['REQUEST_URI'] == "/members/main.php")
	{
		$query = "SELECT articles.title, articles.content, articles.date, users.firstname, users.lastname"
		." FROM articles, users WHERE articles.author_id = users.id ORDER BY date DESC LIMIT 3";
		$result = mysql_query($query) or die('Error: Query Failed!');
		
		
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			echo "<div id=\"ann_block\">";
			echo "<div id=\"ann_date_block\"></div>";
			echo "<div id=\"ann_title\"><u>{$row['title']}</u><br /><span class=\"ann_date\">by {$row['firstname']} {$row['lastname']} "
				. date('M j, Y', strtotime($row['date']))
				."</span></div>"
				. "<div id=\"ann_body\">{$row['content']}</div>";
			echo "</div>";
		}
	}
	else
	{
		if(isset($_GET['num']))
		{
			$rowmax = (int)$_GET['num'];
		}
		else
		{
			$rowmax = 5;
		}
		
		$rowmax = $rowmax + 5; //number of articles to get
		
		$query = "SELECT articles.title, articles.content, articles.date, users.firstname, users.lastname"
		." FROM articles, users WHERE articles.author_id = users.id ORDER BY date DESC LIMIT 0, $rowmax"; //CHANGE TO LIMIT $startrow, 10 to make pages
		$result = mysql_query($query) or die('Error: Query Failed!');
		
		//TODO: add option to get more articles if they exist!
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			echo "<div id=\"ann_block\">";
			echo "<div id=\"ann_date_block\"></div>";
			echo "<div id=\"ann_title\"><u>{$row['title']}</u><br /><span class=\"ann_date\">by {$row['firstname']} {$row['lastname']} " . date('M j, Y', strtotime($row['date'])) . "</span></div>"
				."<div id=\"ann_body\">{$row['content']}</div>";
			echo "</div>";
		}
		
		echo '<a class="more" href="'.$_SERVER['PHP_SELF'].'?num='.($rowmax).'">See More &gt;</a>';
	}
?>
	