<?php require('_includes/definesession.php');
	  require_once('_includes/dbconnect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Member's News/Announcements | GT Solar Jackets</title>
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
		
			<div id="ann">
				<p class="title">News/Announcements</p>
				
				<div id="ann_cont">
					<div id="ann_block">
						<div id="ann_title">This is an announcement<br /><span class="ann_date">by Chris Monaco date</span></div>
						<div id="ann_body">This will be the body of the announcements. No formatting except for that done by the user. I don't know where the text is going when it's longer than one line. This could be a problem. I hope I can figure it our soon.</div>
					</div>
				</div>
				
				<form method="link" action="writeAnnouncement.php">
					<input style="float: right; margin: 5px 10px 5px 0;" type="submit" value="Add Announcement" />
				</form>
			</div>
		</div>
		</div>
	</div>
	
	<?php include '_includes/footer.inc.php'; ?>
	
	</div>
</body>
</html>