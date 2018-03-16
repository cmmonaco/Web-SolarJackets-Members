<?php
/*
// Script to regiter users for event.
// v1.0
// Copyright Chris Monaco
*/

	require_once('../_includes/dbconnect.php');
	require_once('../_includes/definesession.php');
	
	//Get Posted information. Information Validated before submission.
	$candrive = $_POST['candrive'];
	$pass_cap = stripslashes(trim($_POST['passengernum']));
	$comments = stripslashes(trim($_POST['comments']));
	$eventID = $_POST['eventID'];
	
	$query = "SELECT id FROM participants WHERE event_id = $eventID AND user_id = $userID";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) == 0)
	{
		//Write to database
		$query = "INSERT INTO participants (user_id, event_id, can_drive, passenger_cap, comments) VALUES ('$userID', '$eventID', '$candrive', '$pass_cap', '$comments')";
		$result = mysql_query($query) or die("Query fail");
	}
	else
	{
		$query = "UPDATE participants SET can_drive = \"$candrive\", passenger_cap = \"$pass_cap\", comments = \"$comments\" WHERE user_id = '$userID' AND event_id = '$eventID'";
		$result = mysql_query($query) or die(mysql_error());
	}
	
	header('Location: ../signup.php');
	exit();
?>