<?php
//email user to tell them pw was updated
//return user to myaccount.php?success=1
	require_once('../_includes/dbconnect.php');
	require_once('../_includes/definesession.php');
	
	//Get Post information
	$currentpw = $_POST['currentpw'];
	$newpw = $_POST['newpw'];
	$confnewpw = $_POST['confnewpw'];
	
	//Check if currentpw matches user's current password in database
	$query = "SELECT password, email FROM users WHERE id='$userID'";
	$result = mysql_query($query) or die("Fail");
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	if(strcmp(sha1($currentpw), $row['password']) != 0)
	{
		header('Location: ../myPass.php?error=1');
		exit();
	}
	
	//Check if newpw and confnewpw match
	if(strcmp($newpw, $confnewpw) != 0)
	{
		header('Location: ../myPass.php?error=2');
		exit();
	}
	
	//Update User
	$query = "UPDATE users SET password=SHA1('$newpw') WHERE id='$userID'";
	$result = mysql_query($query) or die("Query Failed");
	
	//Send user email
	$subject = "Solar Jackets Member's Web Notification";
	$body = "Dear " . $userFullName . ",\n\n"
		. "Your password for the Solar Jackets Member's Area was changed on " . date('F j, Y \a\t g:i a') . ". "
		. "If you did not change your password and feel that you received this message in error please contact the Solar Jackets "
		. "webmaster immediately.\n\n"
		. "Sincerely,\n"
		. "SJ Mailer"
		. "\n\n\n"
		. "-----\n"
		. "This is an automated message sent from the Solar Jackets' website. Do not reply to this email as you will not receive a response.";
	$headers = "From: noreply@solarjackets.gatech.edu";
	mail($row['email'], $subject, $body, $headers);
	
	header('Location: ../myAccount.php?success=1');
	exit();
?>