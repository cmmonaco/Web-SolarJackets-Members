<?php	
	require('_includes/definesession.php');
	require_once('_includes/dbconnect.php'); 
	
	if($userLevel == 11)
	{
		echo "You are not authorized to access this page.";
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Add A User | GT Solar Jackets</title>
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
			<h2>Add A User</h2>
			
			<div id="smallmenu">
				<?php include '_includes/smallmenu.inc.php'; ?>
			</div>

			<form class="feedbackform" action="_scripts/addnewuser.php" method="POST" onsubmit="return formCheck(this, ['firstname', 'lastname', 'username', 'email', 'telephone', 'major'], ['First Name', 'Last Name', 'Username', 'Email', 'Telephone', 'Major']);">
			<input type="hidden" name="submit" value="TRUE">

			<div class="fieldwrapper">
				<label for="status" class="styled">Status</label>
				<div class="thefield">
					<select name="status">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				</div>
			</div>
	
			<div class="fieldwrapper">
				<label for="firstname" class="styled">First Name</label>
				<div class="thefield">
					<input type="text" name="firstname" size="30" maxlength="50" />
				</div>
			</div>
	
			<div class="fieldwrapper">
				<label for="lastname" class="styled">Last Name</label>
				<div class="thefield">
					<input type="text" name="lastname" size="30" maxlength="50" />
				</div>
			</div>
	
			<div class="fieldwrapper">
				<label for="username" class="styled">User Name</label>
				<div class="thefield">
					<input type="text" name="username" size="30" maxlength="50" />
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="email" class="styled">Email</label>
				<div class="thefield">
					<input type="text" name="email" size="30" maxlength="50" />
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="telephone" class="styled">Telephone</label>
				<div class="thefield">
					<input type="text" name="telephone" size="30" maxlength="50" />
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="major" class="styled">Major</label>
				<div class="thefield">
					<input type="text" name="major" size="10" maxlength="4" />
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="level" class="styled">User Level</label>
				<div class="thefield">
					<select name="level">
						<?php
							$query = "SELECT id, name FROM user_levels ORDER BY name DESC";
							$result = mysql_query($query) or die("Query Failed");
							
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
							}
						?>
					</select>
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="position" class="styled">Position</label>
				<div class="thefield">
					<select name="position">
						<?php
							$query = "SELECT id, name FROM positions ORDER BY name";
							$result = mysql_query($query) or die("Query Failed");
							
							echo "<option value=\"0\">None</option>";
							
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
							}
						?>
					</select>
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="subposition" class="styled">Secondary Position</label>
				<div class="thefield">
					<select name="subposition">
						<?php
							$query = "SELECT id, name FROM positions ORDER BY name";
							$result = mysql_query($query) or die("Query Failed");
							
							echo "<option value=\"0\">None</option>";
							
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
							}
						?>
					</select>
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="group" class="styled">Group</label>
				<div class="thefield">
					<select name="group">
						<?php
							$query = "SELECT id, name FROM groups ORDER BY name";
							$result = mysql_query($query) or die("Query Failed");
							
							echo "<option value=\"0\">None</option>";
							
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
							}
						?>
					</select>
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="subgroup" class="styled">Secondary Group</label>
				<div class="thefield">
					<select name="subgroup">
						<?php
							$query = "SELECT id, name FROM groups ORDER BY name";
							$result = mysql_query($query) or die("Query Failed");
							
							echo "<option value=\"0\">None</option>";
							
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
							}
						?>
					</select>
				</div>
			</div>
	
			<div class="">
				<input type="submit" value="Submit" /><input type="button" value="Cancel" onClick="parent.location='users.php'" />
			</div>
	
			</form>
		</div>
		</div>
	</div>
	
	<?php include '_includes/footer.inc.php'; ?>
	
	</div>
</body>
</html>