<?php

	if(isset($_GET['success']))
		$success = $_GET['success']; //value to tell user the change to thier info was successful
		
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
	<title>Manage Users | GT Solar Jackets</title>
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
			<h2>Manage Users</h2>
			
			<div id="smallmenu">
				<?php include '_includes/smallmenu.inc.php'; ?>
			</div>
			
			<?php
				if($success == 1)
				{
					echo "<div id=\"successbox\" style=\"float: right; margin-top: 5px; width: 500px;\">Update Successful!</div>";
				}
			?>

			<?php
				//Query Users Names
				$query = "SELECT id, CONCAT(lastname, ', ', firstname) AS fullname FROM users ORDER BY lastname";
				$result = mysql_query($query) or die("Query Failed");
				
				$letter = "";
				
				echo "<table style=\"float: left; margin: 10px; color: black;\">";
				
				while($row = mysql_fetch_array($result))
				{
					echo "<tr>";
					
					if(($letter != substr($row['fullname'], 0, 1)))
					{
						$letter = substr($row['fullname'], 0, 1);
						echo "<td style=\"font-size: 20px; width: 50px; text-align: center;\">" . $letter . "</td>";
					}
					else
						echo "<td style=\"font-size: 20px; width: 50px; text-align: center;\"></td>";
						
					echo "<td><a style=\"color: blue;\" href=\"userinfo.php?uid={$row['id']}\">{$row['fullname']}</a></td>";
					echo "</tr>";
				}
				
				echo "</table>";
			?>
		</div>
		</div>
	</div>
	
	<?php include '_includes/footer.inc.php'; ?>
	
	</div>
</body>
</html>