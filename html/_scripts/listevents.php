<?php
/*
// Scripts for displaying events in a list.
// v1.0
// Copyright Chris Monaco
*/

	//Query for events
	$query = "SELECT events.id, events.name, events.start_time, users.firstname, users.lastname "
	. "FROM events, users WHERE events.creator_id = users.id AND events.end_time >= NOW() "
	. "ORDER BY events.start_time DESC";
	$result = mysql_query($query) or die("Query Failed");
	
	if(mysql_num_rows($result) == 0)
	{
		echo "<div style=\"margin: 10px\">No Current or Future Events Planned</div>";
	}
	else
	{
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			echo "<div id=\"list_box\">";
			echo "<div id=\"list_title\"><a href=\"event_view.php?id={$row['id']}\">{$row['name']}</a></div>";
			echo "<div id=\"list_info\">" . date('l, F j, Y \a\t g:i A', strtotime($row['start_time'])) . "<br />" . getParticipants($row['id']) . " Participants<br />Created by {$row['firstname']} {$row['lastname']}</div>";
			echo "<div id=\"list_button\"><form method=\"POST\" action=\"event_register.php\"><input type=\"hidden\" name=\"eventID\" value=\"{$row['id']}\" /><input type=\"submit\" value=\"Register\" /></form></div>";
			echo "</div>";
		}
	}
	
	//Funtion of calculate number of participants per event.
	function getParticipants($eventId)
	{
		$N = 0;
		$nquery = "SELECT id FROM participants WHERE event_id = $eventId";
		$nresult = mysql_query($nquery) or die("Failure");
		$N = mysql_num_rows($nresult);
		return $N;
	}

?>