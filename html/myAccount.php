<?php 
	if(isset($_GET['success']))
		$success = $_GET['success']; //value to tell user the change to thier info was successful
		
	require('_includes/definesession.php');
	require_once('_includes/dbconnect.php');
	  
	//query to select email, phone number, position info, and group info
	$query = "SELECT email, telephone, major, position_id, sub_position_id, group_id, sub_group_id FROM users WHERE id = $userID";
	$result = mysql_query($query) or die("Query Failed");
	$row = mysql_fetch_array($result);
	$email = $row['email'];
	$phone = $row['telephone'];
	$major = $row['major'];
	$position = $row['position_id'];
	$subpos = $row['sub_position_id'];
	$group = $row['group_id'];
	$subgroup = $row['sub_group_id'];
?>
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
			<h2>Manage My Information</h2>
			
			<div id="smallmenu">
				<?php include '_includes/smallmenu.inc.php'; ?>
			</div>
			
			<form class="feedbackform" action="_scripts/updateUserInfo.php" method="POST" onsubmit="return formCheck(this, ['firstname', 'lastname', 'email', 'telephone', 'major'], ['First Name', 'Last Name', 'Email', 'Telephone', 'Major']);">
			<input type="hidden" name="submit" value="TRUE">
			<input type="hidden" name="page" value="my">
			
			<?php
				if($success == 1)
				{
					echo "<div id=\"successbox\">Update Successful!</div>";
				}
			?>			
	
			<div class="fieldwrapper">
				<label for="firstname" class="styled">First Name</label>
				<div class="thefield">
					<input type="text" name="firstname" size="30" maxlength="50" value="<?php echo $userFirstName; ?>" />
				</div>
			</div>
	
			<div class="fieldwrapper">
				<label for="lastname" class="styled">Last Name</label>
				<div class="thefield">
					<input type="text" name="lastname" size="30" maxlength="50" value="<?php echo $userLastName; ?>" />
				</div>
			</div>
	
			<div class="fieldwrapper">
				<label for="username" class="styled">User Name</label>
				<div class="thefield">
					<input type="text" name="username" size="30" maxlength="50" value="<?php echo $userName; ?>" DISABLED />
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="email" class="styled">Email</label>
				<div class="thefield">
					<input type="text" name="email" size="30" maxlength="50" value="<?php echo $email; ?>" />
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="telephone" class="styled">Telephone</label>
				<div class="thefield">
					<input type="text" name="telephone" size="30" maxlength="50" value="<?php echo $phone; ?>" />
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="major" class="styled">Major</label>
				<div class="thefield">
					<input type="text" name="major" size="10" maxlength="4" value="<?php echo $major; ?>" />
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="position" class="styled">Position</label>
				<div class="thefield">
					<select name="position" <?php if($userLevel == 11) echo "DISABLED"; ?>>
						<?php
							$query = "SELECT id, name FROM positions ORDER BY name";
							$result = mysql_query($query) or die("Query Failed");
							
							if($position == 0)
								echo "<option selected value=\"0\">None</option>";
							else
								echo "<option value=\"0\">None</option>";
									
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								if($position == $row['id'])
									echo "<option selected value=\"{$row['id']}\">{$row['name']}</option>";
								else
									echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
							}
						?>
					</select>
				</div>
			</div>
			
			<div class="fieldwrapper">
				<label for="subposition" class="styled">Secondary Position</label>
				<div class="thefield">
					<select name="subposition" <?php if($userLevel == 11) echo "DISABLED"; ?>>
						<?php
							$query = "SELECT id, name FROM positions ORDER BY name";
							$result = mysql_query($query) or die("Query Failed");
							
							if($subpos == 0)
								echo "<option selected value=\"0\">None</option>";
							else
								echo "<option value=\"0\">None</option>";
									
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								if($subpos == $row['id'])
									echo "<option selected value=\"{$row['id']}\">{$row['name']}</option>";
								else
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
							
							if($group == 0)
								echo "<option selected value=\"0\">None</option>";
							else
								echo "<option value=\"0\">None</option>";
									
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								if($group == $row['id'])
									echo "<option selected value=\"{$row['id']}\">{$row['name']}</option>";
								else
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
							
							if($subgroup == 0)
								echo "<option selected value=\"0\">None</option>";
							else
								echo "<option value=\"0\">None</option>";
									
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								if($subgroup == $row['id'])
									echo "<option selected value=\"{$row['id']}\">{$row['name']}</option>";
								else
									echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
							}
						?>
					</select>
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