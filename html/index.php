<?php
	$errorCode = $_GET['errorCode'];
	$error = NULL;
	
	switch($errorCode)
	{
		case 1: 
			$error = "You must supply a Username.";
			break;
		case 2:
			$error = "You must supply a Password.";
			break;
		case 3:
			$error = "You must supply a Username and Password.";
			break;
		case 4:
			$error = "The password you entered was incorrect.";
			break;
	}
			
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Member's Login | GT Solar Jackets</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<link href="_css/mem_css.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body onLoad="document.forms.login.username.focus()" style="background-color: lightgrey">
	<div id="login_box">
		<div id="login_title">Member Login</div>
		<div id="login_form">
		
		<form name="login" action="_scripts/login.php" method="POST">
		<input type="hidden" name="submit" value="TRUE">
		
			<label for="username" class="login_label">User Name:</label>
			<div class="login_field">
				<input type="text" id="username" name="username" size="30" maxlength="50" />
			</div>
		
			<label for="password" class="login_label">Password:</label>
			<div class="login_field">
				<input type="password" id="password" name="password" size="30" maxlength="50" />
			</div>

			<div class="login_button">
				<input type="submit" value="Log-in >" />
			</div>
			
		</form>
	</div>
		<?php
			if($error != NULL)
			{
				echo('<div id="error_box"><u>Login Error</u><ul><li>'.$error.'</li></ul>Please try again.</div>');
			}
		?>
	</div>
	
</body>
</html>