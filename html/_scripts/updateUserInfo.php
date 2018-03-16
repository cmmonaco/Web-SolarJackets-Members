<?php
/*
// Script for updating user information.
// v1.2
// Copyright Chris Monaco
*/

//Field submission checked before reaching this point.
	require_once('../_includes/dbconnect.php');
	require_once('../_includes/definesession.php');
	
	//Get POST Information
	$firstname = stripslashes(trim($_POST['firstname']));
	$lastname = stripslashes(trim($_POST['lastname']));
	$email = stripslashes(trim($_POST['email']));
	$telephone = stripslashes(trim($_POST['telephone']));
	$major = stripslashes(trim($_POST['major']));
	$position = stripslashes(trim($_POST['position']));
	$subposition = stripslashes(trim($_POST['subposition']));
	$group = stripslashes(trim($_POST['group']));
	$subgroup = stripslashes(trim($_POST['subgroup']));
	$userName = stripslashes(trim($_POST['username']));
	
	if(isset($_POST['uid']))
	{
		$userID = $_POST['uid'];
	}
	
	if(isset($_POST['level']))
	{
		$userLevel = $_POST['level'];
	}
	
	if(isset($_POST['status']))
		$status = $_POST['status'];
	else
		$status = 1;
	
	//Format any telephone number to (xxx)-xxx-xxxx
	$ftelephone = '';
	for($i = 0; $i < strlen($telephone); $i++)
	{
		if(is_numeric(substr($telephone, $i, 1)))
			$ftelephone = $ftelephone . substr($telephone, $i, 1);
	}
	$ftelephone = '(' . substr($ftelephone, 0, 3) . ')-' . substr($ftelephone, 3, 3) . '-' . substr($ftelephone, 6, 4);
	
	//Query Database
	$query = "UPDATE users SET status='$status', firstname='$firstname', lastname='$lastname', username='$userName', email='$email', telephone='$ftelephone', major='$major', user_level_id='$userLevel', position_id='$position', sub_position_id='$subposition', group_id='$group', sub_group_id='$subgroup'"
		." WHERE id='$userID'";
	$result = mysql_query($query) or die(mysql_error());
	
	//Update session variables for this session in case of name change
	//$userFirstName = $firstname;
	//$userLastName = $lastname;
	
	if($_POST['page'] == "my")
	{
		header('Location: ../myAccount.php?success=1');
		exit();
	}
	else if($_POST['page'] == "ue")
	{
		header('Location: ../users.php?success=1');
		exit();
	}
?>