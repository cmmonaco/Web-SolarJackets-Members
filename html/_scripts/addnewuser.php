<?php
/*
// Script to add a new user to database.
// v1.0
// Copright Chris Monaco
*/

	//Field submission checked before reaching this point.
	require_once('../_includes/dbconnect.php');
	
	//Get POST Information
	$status = $_POST['status'];
	$firstname = stripslashes(trim($_POST['firstname']));
	$lastname = stripslashes(trim($_POST['lastname']));
	$username = stripslashes(trim($_POST['username']));
	$email = stripslashes(trim($_POST['email']));
	$telephone = stripslashes(trim($_POST['telephone']));
	$major = stripslashes(trim($_POST['major']));
	$level = $_POST['level'];
	$position = stripslashes(trim($_POST['position']));
	$subposition = stripslashes(trim($_POST['subposition']));
	$group = stripslashes(trim($_POST['group']));
	$subgroup = stripslashes(trim($_POST['subgroup']));
	
	
	//Format any telephone number to (xxx)-xxx-xxxx
	$ftelephone = '';
	for($i = 0; $i < strlen($telephone); $i++)
	{
		if(is_numeric(substr($telephone, $i, 1)))
			$ftelephone = $ftelephone . substr($telephone, $i, 1);
	}
	$ftelephone = '(' . substr($ftelephone, 0, 3) . ')-' . substr($ftelephone, 3, 3) . '-' . substr($ftelephone, 6, 4);
	
	//Write to database
	$query = "INSERT INTO users (status, firstname, lastname, username, email, telephone, major, user_level_id, last_login, position_id, sub_position_id, group_id, sub_group_id) "
			."VALUES ('$status', '$firstname', '$lastname', '$username', '$email', '$telephone', '$major', '$level', NOW(), '$position', '$subposition', '$group', '$subgroup')";
	$result = mysql_query($query) or die("Could not add new user");


	header('Location: ../users.php?success=1');
	exit();
?>