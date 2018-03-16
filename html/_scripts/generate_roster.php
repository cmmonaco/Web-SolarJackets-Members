<?php
/*
// Displays Members on the roster page.
// v1.0
// Copyright Chris Monaco
// Add chain selects for sorting later.
*/

	$base_query = "SELECT CONCAT(lastname, ', ', firstname) AS fullname, email, telephone, major, group_id, sub_group_id FROM users WHERE status=1 ";

	if(isset($_GET['sortby']))
	{
		switch($_GET['sortby'])
		{
			case 2: $query = $base_query . "ORDER BY group_id";
			break;
			case 3: $query = $base_query . "ORDER BY major";
			break;
		}
	}
	else
	{
		$query = $base_query . "ORDER BY lastname";
	}
	
	//Display sort option links
	echo "<div id=\"roster_search_terms\">Sort by: "
		."<a href=\"" . $_SERVER['PHP_SELF'] . "\">Lastname</a>&nbsp;"
		."<a href=\"" . $_SERVER['PHP_SELF'] . "?sortby=2\">Group</a>&nbsp;"
		."<a href=\"" . $_SERVER['PHP_SELF'] . "?sortby=3\">Major</a>"
		."</div>";
		
	//Query groups table
	$group = array();
	$group[0] = "";
	$gq = "SELECT id, name FROM groups";
	$gr = mysql_query($gq) or die("group query failed");
	
	while($row = mysql_fetch_array($gr))
	{
		$group[$row['id']] = $row['name'];
	}
	
	//Echo table headings and static tags
	echo "<div id=\"roster_table\">"
		."<table>"
		."<tr><th></th>"
		."<th style=\"border-bottom:1px solid white\">Name</th>"
		."<th style=\"border-bottom:1px solid white\">Email</th>"
		."<th style=\"border-bottom:1px solid white\">Telephone</th>"
		."<th style=\"border-bottom:1px solid white\">Major</th>"
		."<th style=\"border-bottom:1px solid white\">Group(s)</th></tr>";
	
	
	//Query user table and print out information
	$result = mysql_query($query) or die("user query failed");
	
	$letter = "";
	
	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		
		//Print out letter for last name stuff
		if(($letter != substr($row['fullname'], 0, 1)) && !isset($_GET['sortby']))
		{
			$letter = substr($row['fullname'], 0, 1);
			echo "<td class=\"letter\">" . $letter . "</td>";
		}
		else
			echo "<td></td>";
		
		echo "<td>{$row['fullname']}</td>"
			."<td><a href=\"mailto:{$row['email']}\">{$row['email']}</td>"
			."<td>{$row['telephone']}</td>"
			."<td>{$row['major']}</td>";
			
		echo "<td>" . $group[$row['group_id']];
		if($row['sub_group_id'] != 0)
			echo "<br /><td>" . $group[$row['sub_group_id']] . "</td>";
		else
			echo "</td>";
			
		echo "</tr>";
	}
	
	echo "</table></div>";
	
?>
	
	
	
		
	