<?php
/*
// Login Script for Solar Jackets Members area. 
// v1.0
// Copyright Chris Monaco
*/
 require('../_includes/definesession.php');
 if(isset($_SESSION['username']))
 {
  session_destroy();
  $_SESSION = array();
  header("Location: ../");
 }
?>