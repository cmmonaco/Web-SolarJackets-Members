<?php

 //database connection: MAKE INCLUDE
 $dbhost = 'web-db1.gatech.edu:3306';
 $dbuser = 'solarjackets';
 $dbpassword = 'sj@gt==T';
 $dbname = 'sj_members';
 
 mysql_connect($dbhost, $dbuser, $dbpassword) or die('Error connecting to database!');
 mysql_select_db($dbname);
 //End database connection
 
?>