<?php require('_includes/definesession.php');
	  require_once('_includes/dbconnect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Member's Main Page | GT Solar Jackets</title>
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
		
		
			<!-- Quick Update Box -->
			<div id = "splash_box1">
				<a href="news.php" class="box_title">Quick Update</a>
				
				<div id = "box1_main_cont">
					<form action="_scripts/createAnnouncement.php" method="POST" onsubmit="return formCheck(this, ['title', 'category', 'content'], ['Title', 'Category', 'Content']);">
					<input type="hidden" name="submit" value="TRUE" />
					<input type="hidden" name="page" value="main" />
					
					<label for="title">Title:</label>
					<div class="field">
						<input type="text" name="title" maxlength="50" size="30" />
					</div>
					
					<label for="category">Category:</label>
					<div class="field">
						<select name="category">
							<option selected>Select category...</option>
							<!-- Options populated by database. -->
							<?php
								$query = "SELECT id, name FROM article_categories";
								$result = mysql_query($query) or die("Error: Query Failed!");
								
								while($row = mysql_fetch_array($result, MYSQL_ASSOC))
								{
									echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
								}
							?>
						</select>
					</div>
					
					<label for="content">Content:</label>
					<div class="field">
						<textarea name="content" wrap="physical"></textarea>
					</div>

					<div class="button">
						<input type="submit" value="Publish" />
						<input type="reset" value="Reset" />
					</div>
					
					</form>					
				</div>
			</div>
			<!-- End Quick Update Box -->
			
			<!-- Calendar Box -->
			<div id="splash_box2">
				<a href="calendar.php" class="box_title">Calendar</a>
					
				<div id="box2_main_cont">
					<iframe src="https://www.google.com/calendar/embed?mode=AGENDA&amp;showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;height=275&amp;wkst=1&amp;bgcolor=%236EB37D&amp;src=solarjackets%40gmail.com&amp;color=%23182C57&amp;ctz=America%2FNew_York" style=" border-width:0 " width="100%" height="275" frameborder="0" scrolling="no"></iframe>
				</div>
					
			</div>
			<!-- End Calendar Box -->
			
			<!-- Announcement Box -->
			<div id="splash_box3">
				<a href="news.php" class="box_title">News/Announcements</a>
				
				<div id="box3_main_cont">
					<?php include '_scripts/displayAnn.php'; ?>
						
					<a href="news.php">See More Articles &gt;&gt;</a>
				</div>
			</div>
			<!-- End Announcement Box -->
			
		</div>
		</div>
	</div>
	
	<?php include '_includes/footer.inc.php'; ?>
	
	</div>
</body>
</html>
