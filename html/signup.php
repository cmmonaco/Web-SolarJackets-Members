<?php require('_includes/definesession.php');
	  require_once('_includes/dbconnect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Event Sign-Ups | GT Solar Jackets</title>
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
			
			<div id="signup">
				<p class="title">Event Sign-Ups</p>
				
				<div id="signup_cont_list">
					<?php include '_scripts/listevents.php'; ?>
				</div>
				
				<form method="link" action="event_create.php">
					<input style="float: right; margin: 5px 10px 5px 0;" type="submit" value="Create Event" />
				</form>
			</div>
			
		</div>
		</div>
	</div>
	
	<?php include '_includes/footer.inc.php'; ?>
	
	</div>
</body>
</html>