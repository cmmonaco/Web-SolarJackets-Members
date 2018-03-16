<?php
	session_start();
	if (!isset($_SESSION['username'])) { //address must be changed when server is switched
		exit ('You must be logged in to access this page! <a href="http://solarjackets.gatech.edu/members/">Go to login page...</a>');
	}
	
	// Define user variables
	$userName = $_SESSION['username'];
	$userFirstName = $_SESSION['firstname'];
	$userLastName = $_SESSION['lastname'];
	$userLevel = $_SESSION['userlevel'];
	$userID = $_SESSION['id'];
	$userFullName = $userFirstName . " " . $userLastName;

?>