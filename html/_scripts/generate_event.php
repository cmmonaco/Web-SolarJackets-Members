<?php
/*
// Writes new event information to database.
// v1.0
// Copyright Chris Monaco
*/

	require_once('../_includes/dbconnect.php');
	require_once('../_includes/definesession.php');

	//Get User submitted information. Validation is done before submission.
	$eventName = stripslashes(trim($_POST['name']));
	$startTime = stripslashes(trim($_POST['starttime']));
	$startDate = $_POST['startdate'];
	$endTime = stripslashes(trim($_POST['endtime']));
	$endDate = $_POST['enddate'];
	$location = stripslashes(trim($_POST['location']));
	$type = $_POST['type'];
	$desc = stripslashes(trim($_POST['description']));
	
	//Format Start and End time for use as DATETIME data
	$startStamp = $startDate . " " . formatTimeSQL($startTime);
	$endStamp = $endDate . " " . formatTimeSQL($endTime);
	
	//Write to database
	$query = "INSERT INTO events (name, description, start_time, end_time, location, type_id, creator_id) VALUES ('$eventName', '$desc', '$startStamp', '$endStamp', '$location', '$type', '$userID')";
	$result = mysql_query($query) or die("Die");
	
	header('Location: ../signup.php');
	exit();
	
	//Converts time to SQL format
	function formatTimeSQL($time)
	{
		if($time == null)
		{
			return '00:00:00';
		}
		else
		{
			$parts = explode(':', $time);
			$hours = $parts[0];
			$parts = explode(' ', $parts[1]);
			$minutes = $parts[0];
		
			if($parts[1] == "PM")
			{
				$hours = $hours + 12;
			}
		
			if(strlen($hours) < 2)
			{
				$hours = '0' . $hours;
			}
		
			return $hours . ':' . $minutes . ':00';
		}
	}