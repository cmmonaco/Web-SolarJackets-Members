<?php require('_includes/definesession.php');
	  require_once('_includes/dbconnect.php');
	  
	  $eventID = $_GET['id'];
	  
	  //Query Database for information to fill forms
	  $query = "SELECT name, start_time, end_time, location, description FROM events WHERE id = $eventID";
	  $result = mysql_query($query) or die("FAIL");
	  $row = mysql_fetch_array($result);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $row['name']; ?> | GT Solar Jackets</title>
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
				<p class="title">Event Details</p>
				
				<div id="signup_cont">
					<!-- Populate form with database info -->
					<form class="feedbackform" method="POST" action="event_register.php">
					<input type="hidden" name="eventID" value="<?php echo $eventID;?>">
						<div class="fieldwrapper">
							<label for="name" class="styled">Event Name</label>
							<div class="thefield">
								<input type="text" name="name" size="30" maxlength="50" value="<?php echo $row['name']; ?>" READONLY />
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="time" class="styled">Start Time</label>
							<div class="thefield">
								<input type="text" name="starttime" size="6" maxlength="6" value="<?php echo date('h:i A', strtotime($row['start_time'])); ?>" READONLY />
								<input type="text" name="startdate" size="19" maxlength="30" value="<?php echo date('l d, Y', strtotime($row['start_time'])); ?>" READONLY />
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="time" class="styled">End Time</label>
							<div class="thefield">
								<input type="text" name="endtime" size="6" maxlength="6" value="<?php echo date('h:i A', strtotime($row['end_time'])); ?>" READONLY />
								<input type="text" name="enddate" size="19" maxlength="30" value="<?php echo date('l d, Y', strtotime($row['end_time'])); ?>" READONLY />
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="name" class="styled">Location</label>
							<div class="thefield">
								<input type="text" name="location" size="30" maxlength="50" value="<?php echo $row['location']; ?>" READONLY />
							</div>
						</div>
						
						<div class="fieldwrapper">
							<label for="description" class="styled">Description</label>
							<div class="thefield">
								<textarea READONLY><?php echo $row['description']; ?></textarea>
							</div>
						</div>
						
						<div>
							<input type="submit" value="Register" /><input type="button" value="Back to List" onClick="parent.location='signup.php'" />
						</div>
					</form>
					
					<div id="participant_table">
					<u><i>Participants</i></u>
					<table>
						<tr><th>Name</th><th>Can Drive?</th><th>Passenger Capacity</th><th>Comments</th></tr>
						<?php
							$query = "SELECT participants.can_drive, participants.passenger_cap, participants.comments, users.firstname, users.lastname FROM participants, users WHERE participants.event_id = $eventID AND participants.user_id = users.id";
							$result = mysql_query($query) or die("fail");
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								echo "<tr><td>{$row['firstname']} {$row['lastname']}</td>";
								if($row['can_drive'] == 0)
									echo "<td>No</td>";
								else
									echo "<td>Yes</td>";
								
								if($row['passenger_cap'] == null || $row['passenger_cap'] == 0)
									echo "<td></td>";
								else
									echo "<td>{$row['passenger_cap']}</td>";
									
								echo "<td>{$row['comments']}</td>";
							}
						?>
					</table>
					</div>
				</div>
			</div>
			
		</div>
		</div>
	</div>
	
	<?php include '_includes/footer.inc.php'; ?>
	
	</div>
</body>
</html>