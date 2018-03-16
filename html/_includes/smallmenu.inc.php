<div class="optionsheader">Options</div>
<ul>
	<li><a href="myAccount.php">Manage My Information</a></li>
	<li><a href="myPass.php">Change My Password</a></li>
	<?php if($userLevel != 11) echo "<li><a href=\"users.php\">Manage Users</a></li><li><a href=\"adduser.php\">Add User</a></li>"; ?>
</ul>