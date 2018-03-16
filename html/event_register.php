<?php require('_includes/definesession.php');
	  require_once('_includes/dbconnect.php');
	  
	  $eventID = $_POST['eventID'];
	  
	  $query = "SELECT name, start_time, end_time, location FROM events WHERE id = $eventID";
	  $result = mysql_query($query) or die("Fail");
	  $row = mysql_fetch_array($result, MYSQL_ASSOC);	  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Event Registration | GT Solar Jackets</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<link href="_css/mem_css.css" rel="stylesheet" type="text/css" media="all" />
	<link href="_css/timePicker.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<div id="wrapper">
	
	<?php include '_includes/header.inc.php'; ?>
	
	<?php include '_includes/navigation.inc.php'; ?>
	
	<div id="page" class="single">
		<div class="bgtop">
		<div class="bgbtm">
			
			<div id="signup">
				<p class="title">Event Registration</p>
				
				<div id="signup_cont_list">
					<form class="feedbackform" method="POST" action="_scripts/register.php">
					<input type="hidden" name="submit" value="TRUE">
					<input type="hidden" name="eventID" value="<?php echo $eventID; ?>">
						<div class="fieldwrapper">
							<label for="name" class="styled">Event Name</label>
							<div class="thefield">
								<input type="text" name="name" size="30" maxlength="50" value="<?php echo $row['name']; ?>" READONLY />
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="time" class="styled">Start Time</label>
							<div class="thefield">
								<input id="stime" type="text" name="starttime" size="6" maxlength="6" value="<?php echo date('h:i A', strtotime($row['start_time'])); ?>" READONLY />
								<input type="text" name="startdate" size="19" maxlength="30" value="<?php echo date('l d, Y', strtotime($row['start_time'])); ?>" READONLY />
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="time" class="styled">End Time</label>
							<div class="thefield">
								<input id="etime" type="text" name="endtime" size="6" maxlength="6" value="<?php echo date('h:i A', strtotime($row['end_time'])); ?>" READONLY />
								<input type="text" name="enddate" size="19" maxlength="30" value="<?php echo date('l d, Y', strtotime($row['end_time'])); ?>" READONLY />
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="location" class="styled">Location</label>
							<div class="thefield">
								<input type="text" name="location" size="30" maxlength="50" value="<?php echo $row['location']; ?>" READONLY />
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="candrive" class="styled">Can you Drive?</label>
							<div class="thefield" style="font-size:13px;">
								Yes<input type="radio" name="candrive" value="1" />
								No<input type="radio" name="candrive" value="0" checked />
								<br />
								If yes, how many passengers?&nbsp;&nbsp;<input type="text" name="passengernum" size="3" maxlength="3" />
							</div>
						</div>
						
						
						<div class="fieldwrapper">
							<label for="comments" class="styled">Comments</label>
							<div class="thefield">
								<textarea name="comments" style="height:70px;"></textarea>
							</div>
						</div>						
						
				</div>
					<input style="float: right; margin: 5px 5px 5px 5px;" type="button" value="Cancel" onClick="parent.location='signup.php'" />
					<input style="float: right; margin: 5px 0px 5px 10px;" type="submit" value="Confirm" />
					</form>
				
			</div>
			
		</div>
		</div>
	</div>
	
	<?php include '_includes/footer.inc.php'; ?>
	
	</div>
</body>
</html>