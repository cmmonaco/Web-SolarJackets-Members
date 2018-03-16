<?php
	if(isset($_GET['error']))
		$error = $_GET['error'];
		
	require('_includes/definesession.php');
	require_once('_includes/dbconnect.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Manage Account | GT Solar Jackets</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<link href="_css/mem_css.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="_scripts/formCheck.js"></script>
</head>

<body>
	<div id="wrapper">
	
	<?php include '_includes/header.inc.php'; ?>
	
	<?php include '_includes/navigation.inc.php'; ?>
	
	<div id="page" class="single">
		<div class="bgtop">
		<div class="bgbtm">
			<h2>Change My Password</h2>
			
			<div id="smallmenu">
				<?php include '_includes/smallmenu.inc.php'; ?>
			</div>
			
			<form class="feedbackform" action="_scripts/updateUserPass.php" method="POST" onsubmit="return formCheck(this, ['currentpw', 'newpw', 'confnewpw'], ['Current Password', 'New Password', 'Confirm New Password']);">
			<input type="hidden" name="submit" value="TRUE">
			
			<?php
				if($error == 1)
					echo "<div id=\"failbox\">The password you entered does not match your current password!</div>";
				else if($error == 2)
					echo "<div id=\"failbox\">The new passwords you entered do not match!</div>";
			?>
			
			<div class="fieldwrapper">
				<label for="currentpw" class="styled">Current Password</label>
				<div class="thefield">
					<input type="password" name="currentpw" size="30" maxlength="50" />
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="newpw" class="styled">New Password</label>
				<div class="thefield">
					<input type="password" name="newpw" size="30" maxlength="50" />
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="confnewpw" class="styled">Confirm New Password</label>
				<div class="thefield">
					<input type="password" name="confnewpw" size="30" maxlength="50" />
				</div>
			</div>
			
			<div class="">
				<input type="submit" value="Submit" /><input type="button" value="Cancel" onClick="parent.location='main.php'" />
			</div>
	
			</form>			
		</div>
		</div>
	</div>
	
	<?php include '_includes/footer.inc.php'; ?>
	
	</div>
</body>
</html>