<?php
/*
// Login Script for Solar Jackets Members area. 
// v1.0
// Copyright Chris Monaco
*/
	require_once('../_includes/dbconnect.php'); //Connect to database
	
	$errors = 0; //Holds any errors that occur during login
	// 1 - Missing Username
	// 2 - Missing Password
	// 3 - Missing Username and Password
	// 4 - Invalid login
	
	//Check to see if username and Password were subbmitted
	if(empty($_POST['username']))
	{
		$errors = 1;
	}
	else
	{
		$UN = stripslashes(trim(strtoupper($_POST['username'])));
	}
	
	if(empty($_POST['password']))
	{
		if($errors == 1)
			$errors = 3;
		else
			$errors = 2;
	}
	else
	{
		$PW = stripslashes(trim($_POST['password']));
	}
	
	//Proceed to process user login
	if($errors == 0)
	{
		//Query Database for user
		$query = "SELECT id, firstname, lastname, user_level_id FROM users WHERE UPPER(username) = '$UN' AND password = SHA1('$PW') AND status = 1";
		$result = mysql_query($query) or die('ERROR: Query Failed!');
		$row = mysql_fetch_array($result, MYSQL_BOTH);
		
		if($row)
		{
			//Define session data
			session_start();
			$_SESSION['username'] = $UN;
			$_SESSION['id'] = $row[0];
			$_SESSION['firstname'] = $row[1];
			$_SESSION['lastname'] = $row[2];
			$_SESSION['userlevel'] = $row[3];
			
			//write timestamp
			$tquery = "UPDATE users SET last_login=Now() WHERE UPPER(username)='$UN'";
			$tresult = mysql_query($tquery);
			
			//Send to main page
			header('Location: ../main.php');
			exit();
		}
		else
		{
			$errors = 4;
		}
	}
	
	header('Location: ../index.php?errorCode=' . $errors);
	exit();

?>
	
