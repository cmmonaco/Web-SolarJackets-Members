<?php require('_includes/definesession.php');
	  require_once('_includes/dbconnect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Create New Event | GT Solar Jackets</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<link href="_css/mem_css.css" rel="stylesheet" type="text/css" media="all" />
	<link href="_css/timePicker.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="_scripts/formCheck.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
	<script type="text/javascript" src="_scripts/jquery.timePicker.js"></script>
	<script type="text/javascript" src="_scripts/calendarDateInput.js"></script>
	<script type="text/javascript">
		jQuery(function() {
			$("#stime, #etime").timePicker({show24Hours: false});
		});
	</script>
</head>

<body>
	<div id="wrapper">
	
	<?php include '_includes/header.inc.php'; ?>
	
	<?php include '_includes/navigation.inc.php'; ?>
	
	<div id="page" class="single">
		<div class="bgtop">
		<div class="bgbtm">
			
			<div id="signup">
				<p class="title">Create New Event</p>
				
				<div id="signup_cont_list">
					<form class="feedbackform" method="POST" action="_scripts/generate_event.php" onsubmit="return formCheck(this, ['name', 'startdate', 'location'], ['Event Name', 'Start Date', 'Location']);">
					<input type="hidden" name="submit" value="TRUE">
						<div class="fieldwrapper">
							<label for="name" class="styled">Event Name</label>
							<div class="thefield">
								<input type="text" name="name" size="30" maxlength="50" />
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="time" class="styled">Start Time</label>
							<div class="thefield">
								<input id="stime" type="text" name="starttime" size="6" maxlength="6" />
								<script>DateInput('startdate', true, 'YYYY-MM-DD');</script>
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="time" class="styled">End Time</label>
							<div class="thefield">
								<input id="etime" type="text" name="endtime" size="6" maxlength="6" />
								<script>DateInput('enddate', true, 'YYYY-MM-DD');</script>
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="location" class="styled">Location</label>
							<div class="thefield">
								<input type="text" name="location" size="30" maxlength="50" />
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="type" class="styled">Type</label>
							<div class="thefield">
								<select name="type">
								<?php
									$query = "SELECT id, name FROM event_types";
									$result = mysql_query($query) or die("eh...");
									
									while($row = mysql_fetch_array($result, MYSQL_ASSOC))
									{
										echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
									}
								?>
								</select>
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="description" class="styled">Description</label>
							<div class="thefield">
								<textarea name="description"></textarea>
							</div>
						</div>						
						
				</div>
					<input style="float: right; margin: 5px 5px 5px 5px;" type="button" value="Cancel" onClick="parent.location='signup.php'" />
					<input style="float: right; margin: 5px 0px 5px 10px;" type="submit" value="Create" />
					</form>
					
					<!-- Add option to register creator, goes straight to registration page. -->
				
			</div>
			
		</div>
		</div>
	</div>
	
	<?php include '_includes/footer.inc.php'; ?>
	
	</div>
</body>
</html>