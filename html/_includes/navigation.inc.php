<!-- Include file for all navigation elements -->
<?php

	$currentPage = $_SERVER['REQUEST_URI'];
	
	echo '<div id="navigation"><ul>';
	
	if($currentPage == "/members/main.php")
	{
		echo '<li><a class="selected" href="main.php">Main</a></li>
				<li><a href="calendar.php">Calendar</a></li>
				<li><a href="news.php">Announcements</a></li>
				<li><a href="signup.php">Sign-Up Lists</a></li>
				<li><a href="resources.php">Resources</a></li>
				<li><a href="roster.php">Members Roster</a></li>
				<li><a class="home" href="http://www.solarjackets.gatech.edu">SJ Home</a></li>
				<li><a class="logout" href="_scripts/logout.php">Log Out</a></li>';
	}
	else if($currentPage == "/members/calendar.php")
	{
		echo '<li><a href="main.php">Main</a></li>
				<li><a class="selected" href="calendar.php">Calendar</a></li>
				<li><a href="news.php">Announcements</a></li>
				<li><a href="signup.php">Sign-Up Lists</a></li>
				<li><a href="resources.php">Resources</a></li>
				<li><a href="roster.php">Members Roster</a></li>
				<li><a class="home" href="http://www.solarjackets.gatech.edu">SJ Home</a></li>
				<li><a class="logout" href="_scripts/logout.php">Log Out</a></li>';
	}
	else if($currentPage == "/members/news.php" || $currentPage == "/members/writeAnnouncement.php")
	{
		echo '<li><a href="main.php">Main</a></li>
				<li><a href="calendar.php">Calendar</a></li>
				<li><a class="selected" href="news.php">Announcements</a></li>
				<li><a href="signup.php">Sign-Up Lists</a></li>
				<li><a href="resources.php">Resources</a></li>
				<li><a href="roster.php">Members Roster</a></li>
				<li><a class="home" href="http://www.solarjackets.gatech.edu">SJ Home</a></li>
				<li><a class="logout" href="_scripts/logout.php">Log Out</a></li>';
	}
	else if($currentPage == "/members/signup.php" || $currentPage == "/members/event_view.php" || $currentPage == "/members/event_register.php" || $currentPage == "/members/event_create.php")
	{
		echo '<li><a href="main.php">Main</a></li>
				<li><a href="calendar.php">Calendar</a></li>
				<li><a href="news.php">Announcements</a></li>
				<li><a class="selected" href="signup.php">Sign-Up Lists</a></li>
				<li><a href="resources.php">Resources</a></li>
				<li><a href="roster.php">Members Roster</a></li>
				<li><a class="home" href="http://www.solarjackets.gatech.edu">SJ Home</a></li>
				<li><a class="logout" href="_scripts/logout.php">Log Out</a></li>';
	}
	else if($currentPage == "/members/resources.php")
	{
		echo '<li><a href="main.php">Main</a></li>
				<li><a href="calendar.php">Calendar</a></li>
				<li><a href="news.php">Announcements</a></li>
				<li><a href="signup.php">Sign-Up Lists</a></li>
				<li><a class="selected" href="resources.php">Resources</a></li>
				<li><a href="roster.php">Members Roster</a></li>
				<li><a class="home" href="http://www.solarjackets.gatech.edu">SJ Home</a></li>
				<li><a class="logout" href="_scripts/logout.php">Log Out</a></li>';
	}
	else if($currentPage == "/members/roster.php")
	{
		echo '<li><a href="main.php">Main</a></li>
				<li><a href="calendar.php">Calendar</a></li>
				<li><a href="news.php">Announcements</a></li>
				<li><a href="signup.php">Sign-Up Lists</a></li>
				<li><a href="resources.php">Resources</a></li>
				<li><a class="selected" href="roster.php">Members Roster</a></li>
				<li><a class="home" href="http://www.solarjackets.gatech.edu">SJ Home</a></li>
				<li><a class="logout" href="_scripts/logout.php">Log Out</a></li>';
	}
	else
	{
		echo '<li><a href="main.php">Main</a></li>
				<li><a href="calendar.php">Calendar</a></li>
				<li><a href="news.php">Announcements</a></li>
				<li><a href="signup.php">Sign-Up Lists</a></li>
				<li><a href="resources.php">Resources</a></li>
				<li><a href="roster.php">Members Roster</a></li>
				<li><a class="home" href="http://www.solarjackets.gatech.edu">SJ Home</a></li>
				<li><a class="logout" href="_scripts/logout.php">Log Out</a></li>';
	}
	
	echo '</ul></div>';
?>