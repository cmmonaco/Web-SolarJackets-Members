<?php require('_includes/definesession.php');
	  require_once('_includes/dbconnect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Add News/Announcement | GT Solar Jackets</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<link href="_css/mem_css.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="_scripts/formCheck.js"></script>
	
	<!-- For Rich Text Editor -->
	<script type="text/javascript" src="_scripts/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme: "advanced",
			plugins: "advlink, advimage, advlist, inlinepopups, table",
			
			//Theme settings
			theme_advanced_buttons1: "fontselect, fontsizeselect, |, bold, italic, underline, |, bullist, numlist, |, outdent, indent, |, undo, redo, |, link, unlink, image, |, table",
			theme_advanced_buttons2: "",
			theme_advanced_buttons3: "",
			theme_advanced_toolbar_location: "top",
			theme_advanced_toolbar_align: "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : false,
			
			convert_urls : false,

			content_css : "_css/rte.css"
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
		
			<div id="ann">
				<p class="title">Add News/Announcements</p>
				
				<div id="ann_cont">
					<div style="padding-right: 10px;">	
						<form action="_scripts/createAnnouncement.php" method="POST" onsubmit="return formCheck(this, ['title', 'category'], ['Title', 'Category']);">
						<input type="hidden" name="submit" value="TRUE" />
						<input type="hidden" name="page" value="create" />
						
							<div id="movefield">
								<label for="title">Title:</label>
								<div class="field">
									<input type="text" name="title" maxlength="50" size="30" />
								</div>
							</div>
							
							<div id="movefield">
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
							</div>
							
							<div id="movefield">
								<label for="content">Content:</label>
								<div class="field">
									<textarea name="content" id="content" style="width: 100%; height: 300px;"></textarea>
								</div>
							</div>
					</div>
				</div>
				<!-- Buttons Here -->
				<input style="float: right; margin: 5px 5px 5px 5px;" type="button" value="Cancel" onClick="parent.location='news.php'" />
				<input style="float: right; margin: 5px 0px 5px 10px;" type="submit" value="Publish" />
				</form>
			</div>
		</div>
		</div>
	</div>
	
	<?php include '_includes/footer.inc.php'; ?>
	
	</div>
</body>
</html>